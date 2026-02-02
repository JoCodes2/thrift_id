import keranjangService from "../services/keranjang.service.js";

$(document).ready(function () {
    const service = new keranjangService();
    async function initKeranjangPage() {
        const container = $('#container-keranjang');
        const containerRekomendasi = $('#container-rekomendasi');
        const sectionRekomendasi = $('#section-rekomendasi');

        if (container.length === 0) return;

        try {
            const res = await service.getKeranjang();

            container.html(service.renderKeranjangHTML(res.data));

            const htmlRekomendasi = service.renderRekomendasiHTML(res.rekomendasi);
            containerRekomendasi.html(htmlRekomendasi);

            sectionRekomendasi.show();

            const total = service.calculateTotal(res.data);
            const totalFormatted = new Intl.NumberFormat('id-ID').format(total);
            $('#text-total-produk, #text-total-akhir').text(`Rp ${totalFormatted}`);
            $('#btn-checkout').prop('disabled', res.data.length === 0);
            service.updateCartBadge();
        } catch (error) {
            console.error("Error Detail:", error);
            errorAlert('Gagal memuat data.');
        }
    }

    $(document).on('click', '.btn-add-cart', async function (e) {
        e.preventDefault();
        const productId = $(this).data('id');

        loadingAllert('Menambahkan', 'Sedang memasukkan produk ke keranjang...');

        try {
            const response = await service.addKeranjang(productId);
            if (response.code === 200) {
                successAlert('Produk berhasil ditambahkan!').then(() => {
                    if (window.location.pathname.includes('keranjang')) {
                        initKeranjangPage();
                    }
                });
            }
        } catch (error) {
            if (error.status === 401) {
                warningAlert('Silahkan login terlebih dahulu untuk mulai belanja.');
            } else {
                errorAlert('Gagal menambahkan produk ke keranjang.');
            }
        }
        await service.updateCartBadge();
    });

    $(document).on('click', '.btn-hapus', function () {
        const id = $(this).data('id');

        confirmAlert('Produk ini akan dihapus dari daftar belanja Anda.', async () => {
            loadingAllert('Menghapus...', 'Sedang memperbarui keranjang.');
            try {
                await service.deleteKeranjang(id);
                successAlert('Terhapus!').then(() => initKeranjangPage());
            } catch (error) {
                errorAlert('Gagal menghapus produk.');
            }
            await service.updateCartBadge();
        });
    });

    $(document).on('click', '.btn-tambah, .btn-kurang', async function () {
        const $btn = $(this);
        const idProduk = $btn.data('id-produk');
        const currentQty = parseInt($btn.data('qty'));

        let newQty = $btn.hasClass('btn-tambah') ? currentQty + 1 : currentQty - 1;

        if (newQty < 1) return;

        try {
            await service.updateQty(idProduk, newQty);

            initKeranjangPage();
        } catch (error) {
            errorAlert('Gagal memperbarui jumlah produk.');
        }
        await service.updateCartBadge();
    });

    initKeranjangPage();
    $(document).on('click', '#btn-checkout', function (e) {
        e.preventDefault();
        const btn = $(this);
        const originalContent = btn.html();
        btn.prop('disabled', true).html('<i class="fa-solid fa-spinner animate-spin"></i> Menyiapkan Pesanan...');

        window.location.href = `${appUrl}/pembayaran`;
    });
});
