class pembayaranService {
    ajaxRequest(url, method, data = null) {
        return new Promise((resolve, reject) => {
            $.ajax({
                url,
                method,
                data,
                processData: data instanceof FormData ? false : true,
                contentType: data instanceof FormData ? false : 'application/x-www-form-urlencoded',
                success: (response) => resolve(response),
                error: (error) => reject(error),
            });
        });
    }

    async getKeranjang() {
        const response = await this.ajaxRequest(`${appUrl}/thrif-id/keranjang`, 'GET');
        return response.data;
    }

    async getProdukDetail(id) {
        const response = await this.ajaxRequest(`${appUrl}/thrif-id/produk-admin/get/${id}`, 'GET');
        return response.data;

    }

    renderPembayaranHTML(items) {
        if (!items || items.length === 0) return '';

        const groupedItems = items.reduce((acc, item) => {
            const tokoId = item.produk.id_toko;
            if (!acc[tokoId]) {
                acc[tokoId] = {
                    nama_toko: item.produk.toko.nama_toko,
                    items: []
                };
            }
            acc[tokoId].items.push(item);
            return acc;
        }, {});

        let html = '';
        for (const tokoId in groupedItems) {
            const group = groupedItems[tokoId];
            html += `
            <div class="bg-white rounded-[2.5rem] overflow-hidden shadow-sm border border-stone-100 mb-6">
                <div class="bg-stone-50/50 px-8 py-4 border-b border-stone-100">
                    <span class="text-[11px] font-black text-gray-900 uppercase tracking-wider italic">${group.nama_toko}</span>
                </div>
                <div class="p-6 md:p-8 space-y-6">`;

            group.items.forEach(item => {
                const produk = item.produk;
                const gambar = produk.deskrisp[0]?.gambar || 'default.jpg';
                html += `
                    <div class="flex items-center gap-4 md:gap-6">
                        <div class="w-16 h-16 md:w-20 md:h-20 bg-stone-100 rounded-2xl overflow-hidden flex-shrink-0">
                            <img src="${appUrl}/uploads/gambar/${gambar}" class="w-full h-full object-cover">
                        </div>
                        <div class="flex-1">
                            <h4 class="font-bold text-gray-900 text-xs md:text-sm italic">${produk.nama_produk}</h4>
                            <p class="text-[9px] md:text-[10px] font-bold text-gray-400 uppercase tracking-widest mt-1 italic">
                                ${produk.kategori?.nama_kategori} • Size ${produk.deskrisp[0]?.ukuran || '-'}
                            </p>
                            <div class="flex justify-between items-center mt-2">
                                <p class="text-[10px] font-bold text-stone-500">${item.qty} x Rp ${new Intl.NumberFormat('id-ID').format(produk.harga)}</p>
                                <p class="text-sm font-black text-gray-900">Rp ${new Intl.NumberFormat('id-ID').format(produk.harga * item.qty)}</p>
                            </div>
                        </div>
                    </div>`;
            });
            html += `</div></div>`;
        }
        return html;
    }
}
export default pembayaranService;
