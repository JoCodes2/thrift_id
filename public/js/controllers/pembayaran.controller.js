// pembayaran.controller.js
import pembayaranService from "../services/pembayaran.service.js";

$(document).ready(async function () {
    const service = new pembayaranService();
    const urlParams = new URLSearchParams(window.location.search);
    const productId = urlParams.get('produk_id');
    const directQty = urlParams.get('qty') || 1;

    async function initPembayaran() {
        try {
            let items = [];
            let userData = null;

            const cartRes = await service.getKeranjang();
            userData = cartRes.user;

            if (productId) {
                const res = await service.getProdukDetail(productId);

                items = [{
                    qty: parseInt(directQty),
                    produk: res
                }];
            } else {
                items = cartRes.data;
            }

            if (items.length === 0) {
                $('#container-ringkasan-barang').html('<p class="text-center py-10">Tidak ada produk untuk diproses.</p>');
                return;
            }

            renderAlamatUser(userData);

            $('#container-ringkasan-barang').html(service.renderPembayaranHTML(items));

            const total = items.reduce((acc, item) => {
                const harga = item.produk.harga || 0;
                return acc + (harga * item.qty);
            }, 0);

            const totalFormatted = new Intl.NumberFormat('id-ID').format(total);

            $('#text-subtotal').text(`Rp ${totalFormatted}`);
            $('#text-total-tagihan').text(`Rp ${totalFormatted}`);
            $('#text-label-subtotal').text(`Subtotal (${items.length} Produk)`);

            $('#btnBuatPesanan').prop('disabled', false).removeClass('bg-gray-300');

        } catch (error) {
            console.error("Error Detail:", error);
            $('#container-ringkasan-barang').html('<p class="text-red-500 text-center">Gagal memuat data. Silakan coba lagi.</p>');
        }
    }

    function renderAlamatUser(user) {
        if (!user) return;
        const html = `
            <div class="flex justify-between items-start mb-4">
                <p class="font-bold text-gray-900 text-sm md:text-base">${user.nama || 'Pembeli'}</p>
                <span class="text-[9px] font-black text-gray-400 uppercase tracking-widest bg-white px-3 py-1 rounded-lg border border-stone-100">Utama</span>
            </div>
            <p class="text-xs md:text-sm text-gray-600 leading-relaxed mb-4">${user.alamat || 'Alamat belum diisi di profil'}</p>
            <p class="text-[10px] md:text-xs font-bold text-gray-500 italic">
                <i class="fa-solid fa-phone mr-2 text-[10px]"></i>${user.no_telp || '-'}
            </p>
        `;
        $('#container-alamat').html(html);
    }

    initPembayaran();
});
