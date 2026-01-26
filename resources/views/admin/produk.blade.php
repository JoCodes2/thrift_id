@extends('Layouts.Base')
@section('content')
    <div class="card">
        <div class="card-header py-3 d-flex align-items-center justify-content-between">
            <h3 class="m-0 font-weight-bold">
                <i class="fa-solid fa-box-open pr-2"></i> Data Produk
            </h3>

            <button type="button" class="btn btn-primary btn-sm" id="btnTambah">
                <i class="fa fa-plus"></i> Tambah
            </button>
        </div>

        <div class="card-body py-2">
            <div class="py-3">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kategori</th>
                            <th>Toko</th>
                            <th>Nama Produk</th>
                            <th>Harga</th>
                            <th>Status Stok</th>
                            <th>Jumlah Terjual</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="tBody">
                        <tr>
                            <td colspan="8" class="text-center">Memuat data...</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Modal --}}
    <div class="modal fade" id="DataModal" tabindex="-1" aria-labelledby="DataModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="DataModalLabel">Data Toko</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form id="produkForm" method="POST">
                        @csrf
                        <input type="hidden" id="id" name="id">

                        {{-- Kategori --}}
                        <div class="form-group mb-3">
                            <label for="id_kategori">Kategori</label>
                            <select class="form-control" name="id_kategori" id="id_kategori">
                                <option value="">-- Pilih Kategori --</option>
                                {{-- looping kategori --}}
                            </select>
                            <div class="invalid-feedback" id="id_kategori-error"></div>
                        </div>

                        {{-- Toko --}}
                        <div class="form-group mb-3">
                            <label for="id_toko">Toko</label>
                            <select class="form-control" name="id_toko" id="id_toko">
                                <option value="">-- Pilih Toko --</option>
                                {{-- looping toko --}}
                            </select>
                            <div class="invalid-feedback" id="id_toko-error"></div>
                        </div>

                        {{-- Nama Produk --}}
                        <div class="form-group mb-3">
                            <label for="nama_produk">Nama Produk</label>
                            <input type="text" class="form-control" name="nama_produk" id="nama_produk"
                                placeholder="Masukkan nama produk">
                            <div class="invalid-feedback" id="nama_produk-error"></div>
                        </div>

                        {{-- Harga --}}
                        <div class="form-group mb-3">
                            <label for="harga">Harga</label>
                            <input type="number" class="form-control" name="harga" id="harga"
                                placeholder="Masukkan harga">
                            <div class="invalid-feedback" id="harga-error"></div>
                        </div>

                        {{-- Status Stok --}}
                        <div class="form-group mb-3">
                            <label for="status_stok">Status Stok</label>
                            <select class="form-control" name="status_stok" id="status_stok">
                                <option value="">-- Pilih Status --</option>
                                <option value="tersedia">Tersedia</option>
                                <option value="kosong">Kosong</option>
                            </select>
                            <div class="invalid-feedback" id="status_stok-error"></div>
                        </div>

                        {{-- jumlah_terjual (hidden, default 0) --}}
                        <input type="hidden" name="jumlah_terjual" id="jumlah_terjual" value="0">
                    </form>
                </div>



                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary" id="simpanData">Simpan</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {

            // Fungsi untuk memuat opsi kategori
            function loadKategori() {
                $.ajax({
                    url: "/thrif-id/kategori",
                    method: "GET",
                    dataType: "json",
                    success: function(response) {
                        let options = '<option value="">-- Pilih Kategori --</option>';
                        $.each(response.data, function(index, item) {
                            options +=
                                `<option value="${item.id}">${item.nama_kategori}</option>`;
                        });
                        $("#id_kategori").html(options);
                    },
                    error: function() {
                        console.log("Gagal mengambil data kategori");
                    }
                });
            }

            function loadToko() {
                $.ajax({
                    url: "/thrif-id/toko",
                    method: "GET",
                    dataType: "json",
                    success: function(response) {
                        let options = '<option value="">-- Pilih Toko --</option>';
                        $.each(response.data, function(index, item) {
                            options +=
                                `<option value="${item.id}">${item.nama_toko}</option>`;
                        });
                        $("#id_toko").html(options);
                    },
                    error: function() {
                        console.log("Gagal mengambil data toko");
                    }
                });
            }

            // Ambil data
            function getData() {
                $.ajax({
                    url: "/thrif-id/produk",
                    method: "GET",
                    dataType: "json",
                    success: function(response) {
                        console.log(response);
                        let tableBody = "";
                        $.each(response.data, function(index, item) {
                            tableBody += `<tr>
                                <td>${index + 1}</td>
                                <td>${item.kategori.nama_kategori}</td>
                                <td>${item.toko.nama_toko}</td>
                                <td>${item.nama_produk}</td>
                                <td>${item.harga}</td>
                                <td>${item.status_stok}</td>
                                <td>${item.jumlah_terjual}</td>


                                <td>
                                    <button type="button"
                                        class="btn btn-outline-primary btn-sm edit-btn"
                                        data-id="${item.id}">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button type="button"
                                        class="btn btn-outline-danger btn-sm delete-confirm"
                                        data-id="${item.id}">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>`;
                        });

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
                    error: function() {
                        console.log("Gagal mengambil data dari server");
                    }
                });
            }

            getData();

            // create & update
            $(document).on('click', '#simpanData', function(e) {
                e.preventDefault();
                clearErrors();

                let id = $('#id').val();
                let formData = new FormData($('#produkForm')[0]);
                let url = id ? `/sitasi/produk/update/${id}` : '/sitasi/produk/create';

                loadingAllert();

                $.ajax({
                    type: 'POST',
                    url: url,
                    data: formData,
                    contentType: false,
                    processData: false,

                    success: function(response) {
                        Swal.close();

                        // ✅ SUCCESS SAJA
                        if (response.code === 200 || response.status === 'success') {
                            successAlert(response.message ?? 'Data berhasil disimpan!');
                            $('#DataModal').modal('hide');

                            setTimeout(() => {
                                location.reload();
                            }, 1000);
                        }
                    },

                    error: function(xhr) {
                        Swal.close();

                        if (xhr.status === 422) {
                            let errors = xhr.responseJSON.errors; // ✅ FIX

                            $.each(errors, function(key, value) {
                                let input = $('#' + key);
                                let errorEl = $('#' + key + '-error');

                                input.addClass('is-invalid');
                                errorEl.text(value[0]);
                            });

                            return;
                        }

                        console.error(xhr.responseText);
                        errorAlert();
                    }

                });
            });


            function clearErrors() {
                $('.is-invalid').removeClass('is-invalid');
                $('.invalid-feedback').text('');
            }

            $(document).on('input change', '#produkForm input, #produkForm textarea', function() {
                $(this).removeClass('is-invalid');
                $('#' + this.id + '-error').text('');
            });

            // Tampilkan modal tambah
            $(document).on('click', '#btnTambah', function() {
                $('#produkForm')[0].reset(); // reset form
                $('#id').val('');
                clearErrors();
                $('#preview-foto').addClass('d-none').attr('src', '');
                $('#DataModalLabel').text('Tambah produk');
                $('#DataModal').modal('show');
            });

            // Reset saat modal ditutup
            $('#DataModal').on('hidden.bs.modal', function() {
                $('#produkForm')[0].reset();
                $('#id').val('');
                clearErrors();
            });


            // Fungsi enter untuk submit form
            $('#produkForm').on('keypress', function(e) {
                if (e.which === 13) { // Enter key
                    e.preventDefault();
                    $('#simpanData').click();
                }
            });

        });
    </script>
@endsection
