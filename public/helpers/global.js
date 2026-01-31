import keranjangService from "../js/services/keranjang.service.js";


$(document).ready(function () {
    const service = new keranjangService();

    // Fungsi Global Update Badge
    window.updateGlobalCartBadge = async function () {
        try {
            const response = await service.ajaxRequest(`${appUrl}/thrif-id/keranjang`, 'GET');
            const badge = $('#cart-badge');

            const count = response.data.data ? response.data.data.length : 0;

            if (count > 0) {
                badge.text(count).removeClass('hidden').show();
                badge.addClass('scale-125');
                setTimeout(() => badge.removeClass('scale-125'), 200);
            } else {
                badge.hide();
            }
        } catch (error) {
            console.error("Gagal memuat badge:", error);
        }
    };

    if ($('#cart-badge').length > 0) {
        updateGlobalCartBadge();
    }
});
