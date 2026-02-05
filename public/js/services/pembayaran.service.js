class pembayaranService {
    ajaxRequest(url, method, data = null) {
        return new Promise((resolve, reject) => {
            $.ajax({
                url,
                method,
                data,
                // Tambahkan header CSRF jika diperlukan oleh Laravel
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                processData: data instanceof FormData ? false : true,
                contentType: data instanceof FormData ? false : 'application/json', // Gunakan JSON jika mengirim object
                data: data instanceof FormData ? data : JSON.stringify(data), // Stringify jika bukan FormData
                success: (response) => resolve(response),
                error: (error) => reject(error),
            });
        });
    }

    // URL API tetap di dalam service
    async getKeranjang() {
        const response = await this.ajaxRequest(`${appUrl}/thrif-id/keranjang`, 'GET');
        return response.data;
    }

    async getProdukDetail(id) {
        const response = await this.ajaxRequest(`${appUrl}/thrif-id/produk-admin/get/${id}`, 'GET');
        return response.data;
    }

    // Fungsi baru untuk submit transaksi
    async buatTransaksi(payload) {
        const response = await this.ajaxRequest(`${appUrl}/thrif-id/transaksi/create`, 'POST', payload);
        console.log(response);

        return response;
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
    <div class="bg-white rounded-[2.5rem] overflow-hidden shadow-sm border border-stone-100 mb-6 animate-fadeIn">
        <div class="bg-stone-50/50 px-8 py-4 border-b border-stone-100 flex justify-between items-center">
            <span class="text-[11px] font-black text-gray-900 uppercase tracking-wider italic">
                <i class="fa-solid fa-shop mr-2 text-green-700"></i>${group.nama_toko}
            </span>
        </div>
        <div class="p-6 md:p-8 space-y-6">`;

            group.items.forEach(item => {
                const produk = item.produk;

                const rawGambar = produk.deskrisp && produk.deskrisp.length > 0 ? produk.deskrisp[0].gambar : '';

                const isInvalid = !rawGambar || rawGambar.includes('default') || rawGambar.trim() === '';

                const imageUrl = isInvalid
                    ? 'https://placehold.co/400x400/f5f5f4/a8a29e?text=No+Image'
                    : `${appUrl}/uploads/gambar/${rawGambar}`;

                const ukuran = produk.deskrisp && produk.deskrisp.length > 0 ? produk.deskrisp[0].ukuran : '-';

                html += `
            <div class="flex items-center gap-4 md:gap-6 group">
                <div class="w-16 h-16 md:w-20 md:h-20 bg-stone-100 rounded-2xl overflow-hidden flex-shrink-0 border border-stone-50">
                    <img src="${imageUrl}"
                         alt="${produk.nama_produk}"
                         class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
                         onerror="this.src='https://placehold.co/400x400/f5f5f4/a8a29e?text=No+Image'">
                </div>

                <div class="flex-1">
                    <div class="flex justify-between items-start">
                        <h4 class="font-bold text-gray-900 text-xs md:text-sm italic uppercase tracking-tight">
                            ${produk.nama_produk}
                        </h4>
                    </div>

                    <p class="text-[9px] md:text-[10px] font-bold text-gray-400 uppercase tracking-widest mt-1 italic">
                        ${produk.kategori?.nama_kategori || 'Fashion'} • Size ${ukuran}
                    </p>

                    <div class="flex justify-between items-center mt-3">
                        <div class="text-[10px] font-bold text-stone-500">
                            <span class="bg-stone-100 px-2 py-0.5 rounded-md text-gray-600">${item.qty}x</span>
                            <span class="ml-1">Rp ${new Intl.NumberFormat('id-ID').format(produk.harga)}</span>
                        </div>
                        <p class="text-sm font-black text-gray-900 tracking-tighter">
                            Rp ${new Intl.NumberFormat('id-ID').format(produk.harga * item.qty)}
                        </p>
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
