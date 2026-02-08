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
                <div class="table-responsive">
                    {{-- Tambahkan ID unik pada tabel agar mudah direferensikan --}}
                    <table class="table table-bordered table-striped" id="tableTransaksi">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Pembeli</th>
                                <th>Kode Transaksi</th>
                                <th>Nama Produk</th>
                                <th>Tanggal Pembelian</th>
                                <th>Harga</th>
                                <th>Jumlah</th>
                                <th>Total Harga</th>
                                <th>Alamat Pembeli</th>
                                <th>Email Pembeli</th>
                                <th>Status Item</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        {{-- Data akan dimuat di sini via AJAX --}}
                        <tbody id="tBody">

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
@endsection
@section('scripts')

<script>
$(document).ready(function () {

    let table;

    function initDataTable() {
        if ($.fn.DataTable.isDataTable('#tableTransaksi')) {
            table.clear().destroy();
        }

        table = $('#tableTransaksi').DataTable({
            paging: true,
            searching: true,
            ordering: true,
            info: true,
            order: [],
            language: {
                emptyTable: "Tidak ada data transaksi"
            }
        });
    }

    function getData() {
        if ($.fn.DataTable.isDataTable('#tableTransaksi')) {
            table.clear().destroy();
        }

        $("#tBody").empty();

        $.ajax({
            url: "/thrif-id/transaksi/admin",
            method: "GET",
            dataType: "json",
            success: function (response) {
                let tableBody = "";

                if (response.data && response.data.length > 0) {
                    $.each(response.data, function (index, item) {

                        let actionButton = '';
                        if (item.status_item === 'menunggu') {
                            actionButton = `
                                <button type="button"
                                    class="btn btn-success btn-sm kirim-btn"
                                    data-id="${item.id}">
                                    Kirim
                                </button>`;
                        }

                        tableBody += `
                        <tr>
                            <td>${index + 1}</td>
                            <td>${item.nama_pembeli}</td>
                            <td>${item.kode_transaksi}</td>
                            <td>${item.nama_produk}</td>
                            <td>${item.tanggal_pembelian}</td>
                            <td>Rp ${Number(item.harga).toLocaleString('id-ID')}</td>
                            <td>${item.jumlah}</td>
                            <td>Rp ${Number(item.total_harga).toLocaleString('id-ID')}</td>
                            <td>${item.alamat_pembeli}</td>
                            <td>${item.email_pembeli}</td>
                            <td>
                                <span class="badge badge-info">
                                    ${item.status_item}
                                </span>
                            </td>
                            <td>${actionButton}</td>
                        </tr>`;
                    });
                }

                $("#tBody").html(tableBody);
                initDataTable();
            },
            error: function () {
                $("#tBody").html("");
                initDataTable();
            }
        });
    }

    getData();

    $(document).on('click', '.kirim-btn', function () {
        const itemId = $(this).data('id');

        Swal.fire({
            title: 'Konfirmasi',
            text: 'Ubah status item menjadi dikirim?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, kirim',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: `/thrif-id/transaksi/update-status/${itemId}`,
                    method: "POST",
                    data: {
                        status: 'dikirim',
                        _token: '{{ csrf_token() }}'
                    },
                    success: function () {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            timer: 1200,
                            showConfirmButton: false
                        });

                        setTimeout(() => {
                            getData();
                        }, 1200);
                    }
                });
            }
        });
    });

});
</script>

@endsection

