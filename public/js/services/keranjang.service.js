class keranjangService {
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
        try {
            const response = await this.ajaxRequest(`${appUrl}/thrif-id/keranjang`, 'GET');

            return response.data;
        } catch (error) {
            console.error("Gagal mengambil data keranjang:", error);
            throw error;
        }
    }

    renderKeranjangHTML(items) {
        if (!items || items.length === 0) {
            return `
        <div class="flex flex-col items-center justify-center py-24 px-6 bg-white rounded-[3rem] border border-stone-100 shadow-sm transition-all duration-500">
            <div class="relative mb-8">
                <div class="w-24 h-24 bg-stone-50 rounded-full flex items-center justify-center animate-pulse">
                    <i class="fa-solid fa-basket-shopping text-4xl text-stone-200"></i>
                </div>
                <div class="absolute -top-2 -right-2 w-8 h-8 bg-green-50 rounded-full flex items-center justify-center shadow-sm">
                    <i class="fa-solid fa-plus text-[10px] text-green-600"></i>
                </div>
            </div>

            <div class="text-center max-w-sm">
                <h2 class="text-xl font-bold text-gray-900 mb-2">Keranjang Anda Masih Sepi</h2>
                <p class="text-gray-400 text-xs leading-relaxed mb-8">
                    Sepertinya Anda belum menemukan harta karun thrift yang cocok hari ini.
                    Jelajahi koleksi unik kami sebelum kehabisan!
                </p>
            </div>

            <a href="${appUrl}/produk"
               class="inline-flex items-center gap-3 bg-gray-900 hover:bg-green-800 text-white px-8 py-3.5 rounded-2xl font-bold text-xs uppercase tracking-widest transition-all duration-300 hover:shadow-lg active:scale-95">
                <i class="fa-solid fa-magnifying-glass text-[10px]"></i>
                Mulai Belanja
            </a>
        </div>
    `;
        }

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

        let html = '<div class="space-y-6">';

        for (const tokoId in groupedItems) {
            const group = groupedItems[tokoId];

            html += `
            <div class="bg-white rounded-[2rem] shadow-sm border border-stone-100 overflow-hidden">
                <div class="bg-stone-50/50 px-6 py-4 border-b border-stone-100 flex items-center gap-3">
                    <div class="w-8 h-8 rounded-full bg-white shadow-sm flex items-center justify-center">
                        <i class="fa-solid fa-shop text-[10px] text-green-700"></i>
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-900 text-xs uppercase tracking-widest">${group.nama_toko}</h3>
                        <p class="text-[9px] text-gray-400 font-medium">Produk dari toko ini</p>
                    </div>
                </div>

                <div class="divide-y divide-stone-50">
        `;

            group.items.forEach(item => {
                const produk = item.produk || {};
                const kategori = produk.kategori;

                const deskrisp = (produk.deskrisp && produk.deskrisp.length > 0) ? produk.deskrisp[0] : null;
                const rawGambar = deskrisp ? deskrisp.gambar : '';

                const isInvalidImg = !rawGambar || rawGambar.includes('default') || rawGambar.trim() === '';
                const imageUrl = isInvalidImg
                    ? 'https://placehold.co/600x600/f5f5f4/a8a29e?text=No+Image'
                    : `${appUrl}/uploads/gambar/${rawGambar}`;

                const isMinusDisabled = (item.qty <= 1) ? 'disabled opacity-20 cursor-not-allowed' : '';

                html += `
    <div class="p-6 transition-all hover:bg-stone-50/30 animate-fadeIn">
        <div class="flex flex-col sm:flex-row gap-6">
            <div class="w-full sm:w-28 h-28 flex-shrink-0 bg-stone-100 rounded-2xl overflow-hidden shadow-sm border border-stone-50">
                <img src="${imageUrl}"
                     class="w-full h-full object-cover"
                     alt="${produk.nama_produk || 'Produk'}"
                     onerror="this.src='https://placehold.co/600x600/f5f5f4/a8a29e?text=No+Image'">
            </div>

            <div class="flex-1 flex flex-col justify-between">
                <div class="flex justify-between items-start">
                    <div>
                        <span class="text-[9px] font-black text-green-700 uppercase tracking-widest bg-green-50 px-2 py-0.5 rounded-md">
                            ${kategori ? kategori.nama_kategori : 'Fashion'}
                        </span>
                        <h3 class="font-bold text-gray-900 text-base mt-1 uppercase tracking-tight">
                            ${produk.nama_produk || 'Produk Tidak Diketahui'}
                        </h3>
                        <div class="flex items-center gap-2 mt-0.5">
                             <p class="text-[10px] text-gray-400 italic">Size: ${deskrisp?.ukuran || '-'}</p>
                             <span class="text-gray-200 text-[10px]">|</span>
                             <p class="text-[10px] text-gray-400 italic">Kondisi: ${deskrisp?.kondisi || '-'}</p>
                        </div>
                    </div>
                    <button class="text-stone-300 hover:text-red-500 transition-colors btn-hapus p-2" data-id="${item.id}">
                        <i class="fa-solid fa-trash-can text-sm"></i>
                    </button>
                </div>

                <div class="flex items-center justify-between mt-4">
                    <span class="text-lg font-black text-gray-900 tracking-tighter">
                        Rp ${new Intl.NumberFormat('id-ID').format(produk.harga || 0)}
                    </span>

                    <div class="flex items-center gap-1 bg-stone-50 p-1 rounded-xl border border-stone-100">
                        <button class="btn-kurang w-7 h-7 flex items-center justify-center text-stone-500 hover:text-green-700 transition-all ${isMinusDisabled}"
                                data-id-produk="${produk.id}" data-qty="${item.qty}">
                            <i class="fa-solid fa-minus text-[10px]"></i>
                        </button>
                        <span class="w-8 text-center font-bold text-sm text-stone-700">${item.qty}</span>
                        <button class="btn-tambah w-7 h-7 flex items-center justify-center text-stone-500 hover:text-green-700 transition-all"
                                data-id-produk="${produk.id}" data-qty="${item.qty}">
                            <i class="fa-solid fa-plus text-[10px]"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    `;
            });

            html += `</div></div>`;
        }

        html += '</div>';
        return html;
    }
    renderRekomendasiHTML(items) {
        if (!items || items.length === 0) {
            return `
            <div class="col-span-full flex flex-col items-center justify-center py-12 px-4 bg-stone-50/50 rounded-[2rem] border border-dashed border-stone-200">
                <div class="w-16 h-16 bg-white rounded-full flex items-center justify-center shadow-sm mb-4">
                    <i class="fa-solid fa-wand-magic-sparkles text-stone-300 text-2xl"></i>
                </div>
                <h3 class="text-stone-900 font-bold text-sm mb-1">Belum Ada Rekomendasi</h3>
                <p class="text-stone-400 text-[11px] text-center max-w-[250px] italic">
                    Terus jelajahi produk kami agar kami bisa memberikan rekomendasi yang sesuai dengan gaya Anda.
                </p>
            </div>
        `;
        }
        let html = '';
        items.forEach(item => {
            const produk = item.produk ? item.produk : item;
            const deskripsi = produk.deskrisp && produk.deskrisp.length > 0 ? produk.deskrisp[0] : null;
            const gambarName = deskripsi ? deskripsi.gambar : 'default.jpg';
            const imageUrl = `${appUrl}/uploads/gambar/${gambarName}`;

            html += `
            <div class="bg-white rounded-[2rem] overflow-hidden border border-stone-100 shadow-sm hover:shadow-xl transition-all duration-500 group">
                <div class="relative h-48 overflow-hidden bg-stone-100">
                    <img src="${imageUrl}"
                         class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700"
                         onerror="this.src='https://placehold.co/400x400?text=No+Image'">

                    <button class="btn-add-cart absolute bottom-3 right-3 bg-white/90 backdrop-blur-md w-9 h-9 rounded-full flex items-center justify-center text-stone-400 hover:text-green-700 transition-all shadow-sm hover:scale-110"
                            data-id="${produk.id}">
                        <i class="fa-solid fa-cart-plus text-xs"></i>
                    </button>
                </div>
                <div class="p-5">
                    <span class="text-[8px] font-black text-green-700 uppercase tracking-widest bg-green-50 px-2 py-1 rounded-md">
                        ${produk.kategori?.nama_kategori || 'Thrift'}
                    </span>
                    <h3 class="font-bold text-gray-900 text-sm truncate mt-2 mb-1">${produk.nama_produk}</h3>

                    <div class="flex items-center justify-between mt-3 pt-3 border-t border-stone-50">
                        <p class="text-sm font-black text-gray-900">Rp ${new Intl.NumberFormat('id-ID').format(produk.harga)}</p>
                        <a href="${appUrl}/detail-produk/${produk.id}" class="text-[10px] font-bold text-stone-400 hover:text-green-700 transition-colors">
                            <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        `;
        });
        return html;
    }

    calculateTotal(items) {
        return items.reduce((total, item) => total + (item.produk.harga * item.qty), 0);
    }
    // Di dalam class keranjangService
    async updateCartBadge() {
        try {
            const response = await this.ajaxRequest(`${appUrl}/thrif-id/keranjang`, 'GET');
            const totalUniqueItems = response.data.data.length;

            const badge = $('#cart-badge');
            if (totalUniqueItems > 0) {
                badge.text(totalUniqueItems).show();
            } else {
                badge.hide();
            }
        } catch (error) {
            console.error("Gagal update badge keranjang:", error);
        }
    }

    async deleteKeranjang(id) {
        try {
            const response = await this.ajaxRequest(`${appUrl}/thrif-id/keranjang/delete/${id}`, 'DELETE');
            return response;
        } catch (error) {
            console.error("Gagal menghapus produk:", error);
            throw error;
        }
    }

    async updateQty(idProduk, qty) {
        try {
            const response = await this.ajaxRequest(`${appUrl}/thrif-id/keranjang/create`, 'POST', {
                id_produk: idProduk,
                qty: qty,
                update_mode: true
            });
            return response;
        } catch (error) {
            console.error("Gagal update quantity:", error);
            throw error;
        }
    }
    async addKeranjang(idProduk) {
        try {
            const response = await this.ajaxRequest(`${appUrl}/thrif-id/keranjang/create`, 'POST', {
                id_produk: idProduk,
                qty: 1
            });
            return response;
        } catch (error) {
            console.error("Gagal menambah ke keranjang:", error);
            throw error;
        }
    }
}

export default keranjangService;
