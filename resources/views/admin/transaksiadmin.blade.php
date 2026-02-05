@extends('Layouts.Base')
@section('content')
    <div class="card">
        <div class="card-header py-3">
            <h3 class="m-0 font-weight-bold">
                <i class="fa-solid fa-award pr-2"></i> Transaksi Admin
            </h3>
        </div>

        <div class="card-body py-2">
            <div class="py-3">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Toko</th>
                            <th>Kode Transaksi</th>
                            <th>Foto Produk</th>
                            <th>Nama Produk</th>
                            <th>Tanggal Pembelian</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Alamat Pembeli</th>
                            <th>Email Pembeli</th>
                            <th>Status Item</th>
                        </tr>
                    </thead>
                    <tbody id="tBody">
                        <tr>
                            <td colspan="11" class="text-center">Memuat data...</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {

            // Ambil data transaksi admin
            function getData() {
                $.ajax({
                    url: "/thrif-id/transaksi/admin",
                    method: "GET",
                    dataType: "json",
                    success: function(response) {
                        console.log(response);
                        let tableBody = "";
                        if (response.data && response.data.length > 0) {
                            $.each(response.data, function(index, item) {
                                tableBody += `<tr>
                                    <td>${index + 1}</td>
                                    <td>${item.nama_toko}</td>
                                    <td>${item.kode_transaksi}</td>
                                    <td>
                                        ${item.foto_produk ? `<img src="/storage/uploads/foto/${item.foto_produk}" alt="Foto Produk" style="width: 50px; height: 50px; object-fit: cover;">` : '-'}
                                    </td>
                                    <td>${item.nama_produk}</td>
                                    <td>${item.tanggal_pembelian}</td>
                                    <td>Rp ${item.harga.toLocaleString()}</td>
                                    <td>${item.jumlah}</td>
                                    <td>${item.alamat_pembeli}</td>
                                    <td>${item.email_pembeli}</td>
                                    <td>${item.status_item}</td>
                                </tr>`;
                            });
                        } else {
                            tableBody = `<tr><td colspan="11" class="text-center">Tidak ada data transaksi</td></tr>`;
                        }

                        $("#tBody").html(tableBody);

                        $('#tBody').closest('table').DataTable({
                            destroy: true,
                            paging: true,
                            searching: true,
                            ordering: true,
                            info: true,
                            order: []
                        });
                    },
                    error: function(xhr, status, error) {
                        console.log("Gagal mengambil data dari server:", error);
                        $("#tBody").html(`<tr><td colspan="11" class="text-center">Gagal memuat data</td></tr>`);
                    }
                });
            }

            getData();

        });
    </script>
@endsection
