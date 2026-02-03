class RiwayatService {
    ajaxRequest(url, method, data = null) {
        return new Promise((resolve, reject) => {
            $.ajax({
                url,
                method,
                data,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'Accept': 'application/json'
                },
                processData: data instanceof FormData ? false : true,
                contentType: data instanceof FormData ? false : 'application/x-www-form-urlencoded',
                success: (response) => resolve(response),
                error: (error) => reject(error),
            });
        });
    }

    async getRiwayat(status = '') {
        try {
            const response = await this.ajaxRequest(`${appUrl}/thrif-id/transaksi?status=${status}`, 'GET');
            return response;
        } catch (error) {
            console.error("Gagal mengambil data riwayat:", error);
            throw error;
        }
    }

    async getDetailRiwayat(id) {
        try {
            const response = await this.ajaxRequest(`${appUrl}/thrif-id/transaksi/get/${id}`, 'GET');
            console.log("Detail Transaksi:", response);
            return response;
        } catch (error) {
            console.error(`Gagal mengambil detail transaksi ID: ${id}`, error);
            throw error;
        }
    }
}

export default RiwayatService;
