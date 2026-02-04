import RiwayatService from "../services/riwayat.service.js";

$(document).ready(function () {
    const service = new RiwayatService();
    const $container = $('#riwayat-list-container');
    const appUrl = window.location.origin;
    let selectedRating = 0;

    async function loadData() {
        const path = window.location.pathname.split('/');
        let statusFilter = path[path.length - 1];
        if (statusFilter === 'riwayat-pesanan') statusFilter = '';

        try {
            $container.html(`
                <div class="bg-white rounded-[2rem] p-20 text-center border border-gray-100 shadow-sm">
                    <div class="inline-block animate-spin rounded-full h-12 w-12 border-[6px] border-stone-100 border-t-green-700"></div>
                </div>
            `);

            const response = await service.getRiwayat(statusFilter);
            renderRiwayat(response.data, statusFilter);
        } catch (error) {
            console.error("Load Data Error:", error);
            showErrorState();
        }
    }

    function renderRiwayat(data, statusFilter) {
        if (!data || data.length === 0) {
            showEmptyState();
            return;
        }

        let html = '';
        data.forEach(trx => {
            const groupedByToko = trx.items.reduce((acc, item) => {
                const tokoId = item.produk.toko.id;
                if (!acc[tokoId]) {
                    acc[tokoId] = {
                        toko: item.produk.toko,
                        items: [],
                        status_grup: item.status_item
                    };
                }
                acc[tokoId].items.push(item);
                return acc;
            }, {});

            Object.values(groupedByToko).forEach(group => {
                if (!statusFilter || group.status_grup === statusFilter) {
                    html += generateTokoCard(trx, group);
                }
            });
        });

        if (html === '') showEmptyState();
        else $container.html(html);
    }

    function generateTokoCard(trx, group) {
        const firstItem = group.items[0];
        const status = group.status_grup;
        const totalHargaToko = group.items.reduce((sum, item) => sum + item.subtotal, 0);
        const isCancelled = status === 'dibatalkan';

        const alreadyRated = firstItem.produk.is_rated === true || firstItem.produk.review?.length > 0;

        const badgeColors = {
            'menunggu': 'bg-orange-50 text-orange-600 border-orange-100',
            'dikirim': 'bg-blue-50 text-blue-600 border-blue-100',
            'selesai': 'bg-green-50 text-green-700 border-green-100',
            'dibatalkan': 'bg-red-50 text-red-600 border-red-100',
        };

        let actionButtons = '';
        if (status === 'menunggu') {
            actionButtons = `
            <button class="btn-update-status flex-1 py-4 bg-red-50 text-red-600 rounded-2xl text-[10px] font-black uppercase tracking-[0.2em] hover:bg-red-600 hover:text-white transition-all shadow-sm border border-red-100"
                data-id="${firstItem.id}" data-status="dibatalkan">
                Batalkan Pesanan
            </button>`;
        } else if (status === 'dikirim') {
            actionButtons = `
            <button class="btn-update-status flex-1 py-4 bg-green-700 text-white rounded-2xl text-[10px] font-black uppercase tracking-[0.2em] hover:bg-stone-900 transition-all shadow-lg"
                data-id="${firstItem.id}" data-status="selesai">
                Terima Pesanan
            </button>`;
        } else if (status === 'selesai') {
            if (alreadyRated) {
                actionButtons = `
                <button disabled class="flex-1 py-4 bg-stone-100 text-stone-400 rounded-2xl text-[10px] font-black uppercase tracking-[0.2em] cursor-not-allowed border border-stone-200">
                    <i class="fa-solid fa-check-circle mr-2"></i> Ulasan Terkirim
                </button>`;
            } else {
                actionButtons = `
                <button class="btn-open-ulasan flex-1 py-4 bg-orange-500 text-white rounded-2xl text-[10px] font-black uppercase tracking-[0.2em] hover:bg-orange-600 transition-all shadow-lg"
                    data-produk-id="${firstItem.id_produk}" data-nama="${firstItem.nama_produk}">
                    Beri Ulasan
                </button>`;
            }
        }

        const imagePath = firstItem.produk.deskrisp?.[0]?.gambar
            ? `/uploads/gambar/${firstItem.produk.deskrisp[0].gambar}`
            : 'https://via.placeholder.com/150';

        return `
        <div class="bg-white rounded-[2.5rem] border border-gray-100 shadow-sm overflow-hidden mb-6 transition-all ${isCancelled ? 'bg-stone-50/50' : 'hover:scale-[1.01]'}">
            <div class="p-6 md:p-8 ${isCancelled ? 'grayscale opacity-70' : ''}">
                <div class="flex flex-col md:flex-row md:items-center justify-between mb-6 gap-4 border-b border-stone-50 pb-6">
                    <div class="flex items-center space-x-4">
                        <div class="w-12 h-12 bg-stone-50 rounded-2xl flex items-center justify-center text-green-700 border border-stone-100 shadow-inner">
                            <i class="fa-solid fa-store text-xl"></i>
                        </div>
                        <div>
                            <h3 class="font-black text-gray-900 text-sm italic">${group.toko.nama_toko}</h3>
                            <p class="text-[10px] text-gray-400 font-bold uppercase tracking-[0.15em] mt-0.5">${trx.nomor_transaksi}</p>
                        </div>
                    </div>
                    <span class="px-4 py-2 ${badgeColors[status] || 'bg-gray-50'} text-[10px] font-black rounded-xl uppercase tracking-wider border shadow-sm">
                        ${status}
                    </span>
                </div>

                <div class="flex items-center gap-6 mb-8">
                    <div class="w-20 h-20 bg-stone-100 rounded-[1.5rem] overflow-hidden border border-stone-200 flex-shrink-0">
                        <img src="${imagePath}" class="w-full h-full object-cover">
                    </div>
                    <div class="flex-1 min-w-0">
                        <h4 class="font-bold text-gray-800 text-base truncate italic">${firstItem.nama_produk}</h4>
                        <p class="text-[11px] text-gray-400 mt-1 italic font-medium">
                            Dipesan pada ${new Date(trx.created_at).toLocaleDateString('id-ID', { day: '2-digit', month: 'long', year: 'numeric' })}
                        </p>
                    </div>
                    <div class="text-right hidden sm:block border-l border-stone-50 pl-8">
                        <p class="text-[10px] font-black text-stone-300 uppercase tracking-widest italic mb-1">Total Belanja</p>
                        <p class="font-black text-green-700 text-2xl tracking-tighter leading-none">
                            Rp ${new Intl.NumberFormat('id-ID').format(totalHargaToko)}
                        </p>
                    </div>
                </div>

                <div class="flex flex-col sm:flex-row gap-3">
                    ${actionButtons}
                    ${!isCancelled ? `
                    <button class="btn-detail flex-1 py-4 bg-stone-900 text-white rounded-2xl text-[10px] font-black uppercase tracking-[0.2em] hover:bg-stone-700 transition-all shadow-lg"
                        data-id="${trx.id}" data-toko="${group.toko.id}">
                        Detail Invoice
                    </button>` : `<div class="flex-1 py-4 text-center text-stone-400 text-[10px] font-bold uppercase tracking-widest italic">Pesanan ini telah dibatalkan</div>`}
                </div>
            </div>
        </div>`;
    }

    // --- LOGIKA UPDATE STATUS (Terima/Batal) ---
    $container.on('click', '.btn-update-status', function () {
        const idItem = $(this).data('id');
        const statusBaru = $(this).data('status');
        const isBatal = statusBaru === 'dibatalkan';
        const msg = isBatal ? 'Apakah Anda yakin ingin membatalkan pesanan ini?' : 'Apakah Anda sudah menerima pesanan dengan baik?';

        confirmAlert(msg, async () => {
            try {
                loadingAllert('Memproses...', 'Mohon menunggu...');

                const response = await $.ajax({
                    url: `${appUrl}/thrif-id/transaksi/update/${idItem}`,
                    method: 'POST',
                    data: { status: statusBaru },
                    dataType: 'json'
                });

                await successAlert();
                loadData();
            } catch (error) {
                console.error("Update Status Error:", error);
                errorAlert();
            }
        });
    });

    // --- MODAL ULASAN ---
    $(document).on('click', '.btn-open-ulasan', function () {
        const produkId = $(this).data('produk-id');
        const namaProduk = $(this).data('nama');
        selectedRating = 0;

        Swal.fire({
            title: `<span class="font-playfair text-xl">Berikan Rating</span>`,
            html: `
                <div class="text-left">
                    <p class="text-[10px] font-bold text-stone-400 uppercase mb-4 italic text-center">${namaProduk}</p>
                    <div class="flex justify-center gap-3 mb-6 text-3xl text-stone-200" id="star-container">
                        <i class="fa-solid fa-star cursor-pointer hover:text-orange-400 star-select" data-val="1"></i>
                        <i class="fa-solid fa-star cursor-pointer hover:text-orange-400 star-select" data-val="2"></i>
                        <i class="fa-solid fa-star cursor-pointer hover:text-orange-400 star-select" data-val="3"></i>
                        <i class="fa-solid fa-star cursor-pointer hover:text-orange-400 star-select" data-val="4"></i>
                        <i class="fa-solid fa-star cursor-pointer hover:text-orange-400 star-select" data-val="5"></i>
                    </div>
                    <textarea id="ulasan-text" class="w-full p-4 border border-stone-100 rounded-2xl text-xs focus:ring-0 focus:border-green-700 bg-stone-50 shadow-inner" placeholder="Tuliskan ulasan Anda (opsional)..." rows="4"></textarea>
                </div>
            `,
            showCancelButton: true,
            confirmButtonText: 'Kirim Ulasan',
            confirmButtonColor: '#15803d',
            cancelButtonText: 'Batal',
            customClass: { popup: 'rounded-2xl' },
            preConfirm: () => {
                const ulasan = $('#ulasan-text').val();
                if (selectedRating === 0) {
                    return Swal.showValidationMessage('Silahkan pilih rating bintang minimal 1');
                }
                return {
                    produk_id: produkId,
                    rating: selectedRating,
                    ulasan: ulasan
                };
            }
        }).then(async (result) => {
            if (result.isConfirmed) {
                try {
                    loadingAllert('Mengirim...', 'Sedang menyimpan ulasan Anda');

                    const response = await $.ajax({
                        url: `${appUrl}/thrif-id/transaksi/riview`,
                        method: 'POST',
                        data: {
                            produk_id: result.value.produk_id,
                            rating: result.value.rating,
                            ulasan: result.value.ulasan
                        },
                        dataType: 'json'
                    });

                    await successAlert('Terima kasih! Ulasan Anda telah dikirim.');

                    if (typeof realoadBrowser === "function") {
                        realoadBrowser();
                    } else {
                        location.reload();
                    }

                } catch (error) {
                    console.error("Submit Review Error:", error);
                    errorAlert(error.responseJSON?.message || 'Gagal mengirim ulasan.');
                }
            }
        });
    });

    $(document).on('click', '.star-select', function () {
        selectedRating = $(this).data('val');
        $('.star-select').each(function () {
            const starVal = $(this).data('val');
            $(this).toggleClass('text-orange-400', starVal <= selectedRating);
            $(this).toggleClass('text-stone-200', starVal > selectedRating);
        });
    });

    // --- MODAL INVOICE ---
    $container.on('click', '.btn-detail', async function (e) {
        e.preventDefault();
        const id = $(this).data('id');
        const targetTokoId = $(this).data('toko');
        try {
            loadingAllert('Memuat...', 'Sedang mengambil detail invoice');
            const response = await service.getDetailRiwayat(id);
            Swal.close();
            renderModalInvoice(response.data, targetTokoId);
        } catch (error) {
            Swal.close();
            errorAlert('Gagal memuat detail invoice.');
        }
    });

    function renderModalInvoice(trx, targetTokoId) {
        const itemsToko = trx.items.filter(item => item.produk.toko.id == targetTokoId);
        const toko = itemsToko[0].produk.toko;
        const totalToko = itemsToko.reduce((sum, item) => sum + item.subtotal, 0);

        $('#invoice-trx-id').text(`ID: #${trx.nomor_transaksi}`);
        $('#invoice-nama-pembeli').text(trx.pembeli?.nama || 'Customer');
        $('#invoice-alamat-pembeli').text(trx.pembeli?.alamat || 'Alamat tidak tersedia');
        $('#invoice-total-tagihan').text(`Rp ${new Intl.NumberFormat('id-ID').format(totalToko)}`);
        $('#invoice-tgl').text(new Date(trx.created_at).toLocaleDateString('id-ID', { day: '2-digit', month: 'short', year: 'numeric' }));

        let itemsHtml = '';
        itemsToko.forEach(item => {
            const img = item.produk.deskrisp?.[0]?.gambar ? `/uploads/gambar/${item.produk.deskrisp[0].gambar}` : 'https://via.placeholder.com/150';
            itemsHtml += `
            <div class="p-4 rounded-2xl bg-stone-50 border border-stone-100 mb-3 flex items-center gap-4">
                <img src="${img}" class="w-12 h-12 rounded-xl object-cover">
                <div class="flex-1 min-w-0">
                    <h4 class="text-xs font-black text-gray-800 uppercase italic truncate">${item.nama_produk}</h4>
                    <p class="text-[10px] text-gray-400 font-bold">${item.qty} x Rp ${new Intl.NumberFormat('id-ID').format(item.harga_satuan)}</p>
                </div>
                <p class="text-xs font-black text-gray-900 italic font-playfair">Rp ${new Intl.NumberFormat('id-ID').format(item.subtotal)}</p>
            </div>`;
        });
        $('#invoice-items-list').html(itemsHtml);

        // WA Logic
        let rawNumber = toko.no_hp_toko ? toko.no_hp_toko.replace(/\D/g, '') : '';
        if (rawNumber.startsWith('0')) rawNumber = '62' + rawNumber.substring(1);
        else if (rawNumber.startsWith('8')) rawNumber = '62' + rawNumber;

        const pesan = encodeURIComponent(`Halo ${toko.nama_toko}, saya ingin konfirmasi pesanan #${trx.nomor_transaksi}.`);
        $('#invoice-wa-buttons').html(rawNumber ? `
            <a href="https://wa.me/${rawNumber}?text=${pesan}" target="_blank" class="flex items-center justify-between w-full p-4 bg-green-50 border border-green-100 rounded-2xl">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-green-600 rounded-full flex items-center justify-center text-white shadow-lg"><i class="fa-brands fa-whatsapp text-lg"></i></div>
                    <div class="text-left"><p class="text-[10px] font-black text-green-700 uppercase italic">${toko.nama_toko}</p></div>
                </div>
                <i class="fa-solid fa-chevron-right text-green-300"></i>
            </a>` : '');

        $('#modalInvoice').removeClass('hidden').addClass('flex');
        $('body').addClass('overflow-hidden');
    }

    $(document).on('click', '#btnCloseModal, .bg-stone-900\\/60', function () {
        $('#modalInvoice').addClass('hidden').removeClass('flex');
        $('body').removeClass('overflow-hidden');
    });

    function showEmptyState() {
        $container.html(`
            <div class="bg-white rounded-[3rem] p-20 text-center border-2 border-dashed border-stone-100 flex flex-col items-center">
                <i class="fa-solid fa-box-open text-5xl text-stone-200 mb-6"></i>
                <h3 class="text-xl font-black text-stone-800 italic uppercase">Belum ada pesanan</h3>
                <a href="/" class="mt-8 px-8 py-4 bg-green-700 text-white rounded-2xl text-[10px] font-black uppercase tracking-widest">Mulai Belanja</a>
            </div>
        `);
    }

    function showErrorState() {
        errorAlert('Gagal memuat data riwayat pesanan.');
        $container.html(`<div class="bg-red-50 rounded-[3rem] p-16 text-center border border-red-100"><i class="fa-solid fa-triangle-exclamation text-4xl text-red-500 mb-4"></i><p class="text-xs text-red-600 font-black uppercase">Gagal memuat data</p></div>`);
    }

    loadData();
});
