import pembayaranService from "../services/pembayaran.service.js";

$(document).ready(async function () {
    const service = new pembayaranService();
    const urlParams = new URLSearchParams(window.location.search);
    const productId = urlParams.get('produk_id');
    const directQty = urlParams.get('qty') || 1;

    let currentItems = [];
    let currentTotal = 0;
    let currentUser = null;

    async function initPembayaran() {
        try {
            const cartRes = await service.getKeranjang();
            currentUser = cartRes.user;

            if (productId) {
                const res = await service.getProdukDetail(productId);
                currentItems = [{
                    qty: parseInt(directQty),
                    produk: res
                }];
            } else {
                currentItems = cartRes.data;
            }

            if (currentItems.length === 0) {
                $('#container-ringkasan-barang').html('<p class="text-center py-10 italic text-stone-400">Tidak ada produk untuk diproses.</p>');
                return;
            }

            renderAlamatUser(currentUser);
            $('#container-ringkasan-barang').html(service.renderPembayaranHTML(currentItems));

            currentTotal = currentItems.reduce((acc, item) => acc + (item.produk.harga * item.qty), 0);
            const totalFormatted = new Intl.NumberFormat('id-ID').format(currentTotal);

            $('#text-subtotal, #text-total-tagihan').text(`Rp ${totalFormatted}`);
            $('#text-label-subtotal').text(`Subtotal (${currentItems.length} Produk)`);
            $('#btnBuatPesanan').prop('disabled', false);

        } catch (error) {
            console.error("Init Error:", error);
            $('#container-ringkasan-barang').html('<p class="text-red-500 text-center">Gagal memuat data.</p>');
        }
    }

    $('#btnBuatPesanan').on('click', function () {
        confirmAlert("Apakah rincian pesanan Anda sudah benar?", async () => {
            const btn = $(this);
            const payload = {
                total_harga: currentTotal,
                items: currentItems.map(item => ({
                    id_produk: item.produk.id,
                    qty: item.qty
                })),
                id_keranjangs: productId ? [] : currentItems.map(item => item.id)
            };

            try {
                loadingAllert('Memproses Pesanan', 'Sistem sedang membuat invoice Anda...');
                btn.prop('disabled', true);

                const response = await service.buatTransaksi(payload);

                if (response.code === 200) {
                    await successAlert('Transaksi berhasil disimpan!');
                    // Pastikan backend sudah melakukan ->load(['items.produk.toko'])
                    renderModalInvoice(response.data);
                }
            } catch (error) {
                console.error(error);
                errorAlert(error.responseJSON?.message || 'Gagal memproses transaksi.');
                btn.prop('disabled', false).html('<span>Buat Pesanan</span> <i class="fa-solid fa-file-invoice"></i>');
            }
        });
    });

    function renderModalInvoice(transaksi) {
        if (!transaksi || !transaksi.items) return;

        const trxNo = transaksi.nomor_transaksi;
        const items = transaksi.items;

        $('#invoice-trx-id').text(`ID: #${trxNo}`);
        $('#invoice-nama-pembeli').text(currentUser?.nama || 'Pembeli');
        $('#invoice-alamat-pembeli').text(currentUser?.alamat || 'Alamat tidak tersedia');
        $('#invoice-total-tagihan').text(`Rp ${new Intl.NumberFormat('id-ID').format(transaksi.total_harga)}`);

        // Sembunyikan container status transaksi global jika ada di HTML
        $('#invoice-status-container').addClass('hidden');

        let itemsHtml = '';
        items.forEach(item => {
            itemsHtml += `
            <div class="bg-stone-50 rounded-2xl p-4 border border-stone-100 mb-3 shadow-sm">
                <div class="flex justify-between items-start mb-2">
                    <div class="flex-1 pr-4">
                        <p class="font-bold text-gray-900 text-xs md:text-sm italic leading-tight">${item.nama_produk}</p>
                        <p class="text-[9px] text-stone-400 font-bold uppercase mt-1">
                            ${item.produk?.toko?.nama_toko || 'Toko'} • ${item.qty} Unit
                        </p>
                    </div>
                    <div class="text-right">
                        <p class="font-black text-gray-900 text-xs md:text-sm italic">
                            Rp ${new Intl.NumberFormat('id-ID').format(item.subtotal)}
                        </p>
                    </div>
                </div>
                <div class="flex items-center gap-2 pt-2 border-t border-stone-200/60">
                    <span class="text-[8px] font-black px-2 py-0.5 rounded bg-orange-50 text-orange-600 border border-orange-100 uppercase tracking-tighter italic">
                        <i class="fa-solid fa-clock mr-1"></i>${item.status_item}
                    </span>
                </div>
            </div>`;
        });
        $('#invoice-items-list').html(itemsHtml);

        const groupedByToko = items.reduce((acc, item) => {
            const toko = item.produk?.toko;
            if (toko) {
                if (!acc[toko.id]) {
                    acc[toko.id] = {
                        nama: toko.nama_toko,
                        wa: toko.no_hp_toko,
                        barang: []
                    };
                }
                acc[toko.id].barang.push(item.nama_produk);
            }
            return acc;
        }, {});

        let waButtonsHtml = '';
        Object.values(groupedByToko).forEach((toko, index) => {
            let rawNumber = (toko.wa || "").replace(/\D/g, '');
            if (rawNumber.startsWith('0')) rawNumber = '62' + rawNumber.substring(1);
            else if (rawNumber.startsWith('8')) rawNumber = '62' + rawNumber;

            const pesan = encodeURIComponent(
                `Halo ${toko.nama}, saya ingin konfirmasi pesanan #${trxNo}.\n\n` +
                `Produk: ${toko.barang.join(', ')}\n\n` +
                `Mohon segera diproses ya!`
            );

            waButtonsHtml += `
            <a href="https://api.whatsapp.com/send?phone=${rawNumber}&text=${pesan}" target="_blank"
               class="flex items-center justify-between px-6 py-4 bg-white border-2 border-green-700/10 hover:border-green-700 rounded-2xl transition-all group shadow-sm mb-3">
                <div class="flex items-center gap-4">
                    <div class="w-10 h-10 bg-green-50 rounded-full flex items-center justify-center text-green-600 group-hover:bg-green-600 group-hover:text-white transition-all">
                        <i class="fa-brands fa-whatsapp text-xl"></i>
                    </div>
                    <div class="text-left leading-tight">
                        <p class="text-[9px] font-black text-green-700 uppercase tracking-tighter mb-0.5">Konfirmasi Toko ${index + 1}</p>
                        <p class="font-bold text-gray-900 text-sm italic">${toko.nama}</p>
                    </div>
                </div>
                <i class="fa-solid fa-chevron-right text-stone-300 group-hover:text-green-700 group-hover:translate-x-1 transition-all"></i>
            </a>`;
        });
        $('#invoice-wa-buttons').html(waButtonsHtml);

        $('#modalInvoice').removeClass('hidden').addClass('flex');
    }

    $(document).on('click', '#btnCloseModal', function () {
        $('#modalInvoice').addClass('hidden').removeClass('flex');
        window.location.href = `${appUrl}/riwayat-pesanan/menunggu`;
    });

    function renderAlamatUser(user) {
        if (!user) return;
        const html = `
            <div class="flex justify-between items-start mb-4">
                <p class="font-bold text-gray-900 text-sm md:text-base">${user.nama || 'Pembeli'}</p>
                <span class="text-[9px] font-black text-gray-400 uppercase tracking-widest bg-white px-3 py-1 rounded-lg border border-stone-100">Utama</span>
            </div>
            <p class="text-xs md:text-sm text-gray-600 leading-relaxed mb-4">${user.alamat || 'Alamat belum diisi'}</p>
            <p class="text-[10px] md:text-xs font-bold text-gray-500 italic">
                <i class="fa-solid fa-phone mr-2 text-[10px]"></i>${user.no_telp || '-'}
            </p>
        `;
        $('#container-alamat').html(html);
    }
    $(document).on('click', '#btnDownloadInvoice', async function () {
        const { jsPDF } = window.jspdf;
        const btn = $(this);
        const invoiceContent = document.querySelector("#modalInvoice .relative.bg-white");
        const closeBtn = document.querySelector("#btnCloseModal");

        try {
            const originalContent = btn.html();
            btn.prop('disabled', true).html('<i class="fa-solid fa-spinner animate-spin"></i> <span>Generating PDF...</span>');

            closeBtn.style.visibility = 'hidden';
            const canvas = await html2canvas(invoiceContent, {
                scale: 2,
                useCORS: true,
                logging: false,
                backgroundColor: "#ffffff",
                borderRadius: 40
            });

            const imgData = canvas.toDataURL('image/png');

            const pdf = new jsPDF({
                orientation: 'portrait',
                unit: 'mm',
                format: 'a4'
            });

            const imgProps = pdf.getImageProperties(imgData);
            const pdfWidth = pdf.internal.pageSize.getWidth();
            const pdfHeight = (imgProps.height * pdfWidth) / imgProps.width;

            pdf.addImage(imgData, 'PNG', 0, 0, pdfWidth, pdfHeight);

            const trxNo = $('#invoice-trx-id').text().replace('ID: #', '');
            pdf.save(`Invoice-${trxNo}.pdf`);

            btn.prop('disabled', false).html(originalContent);
            closeBtn.style.visibility = 'visible';

            successAlert('Invoice berhasil diunduh!');
        } catch (error) {
            console.error("PDF Error:", error);
            errorAlert('Gagal membuat PDF.');
            btn.prop('disabled', false).html('<i class="fa-solid fa-file-pdf"></i> <span>Download Detail Invoice</span>');
        }
    });

    initPembayaran();
});
