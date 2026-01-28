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
                    <h5 class="modal-title" id="DataModalLabel">Data Produk</h5>
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
                            <input type="text" class="form-control" name="harga" id="harga" placeholder="Rp 0">
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

            loadKategori();
            loadToko();

            function formatRupiah(angka) {
                return new Intl.NumberFormat('id-ID').format(angka);
            }

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
                                <td>Rp ${formatRupiah(item.harga)}</td>
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
            $(document).on('click', '#simpanData', function() {

                const formData = new FormData($('#produkForm')[0]);

                let hargaRaw = $('#harga').val().replace(/[^0-9]/g, '');
                if (!hargaRaw) {
                    toastr.error('Harga wajib diisi');
                    return;
                }

                formData.set('harga', parseInt(hargaRaw));

                const id = $('#id').val();
                const url = id ? `/thrif-id/produk/update/${id}` : '/thrif-id/produk/create';
                const method = id ? 'POST' : 'POST';

                $.ajax({
                    url: url,
                    method: method,
                    data: formData,
                    processData: false,
                    contentType: false,
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
                        if (xhr.status === 422) {
                            const errors = xhr.responseJSON.data;
                            clearErrors();
                            $.each(errors, function(field, messages) {
                                $(`#${field}`).addClass('is-invalid');
                                $(`#${field}-error`).text(messages[0]);
                            });
                        } else {
                            toastr.error('Terjadi kesalahan saat menyimpan data.');
                        }
                    }
                });
            });


            function clearErrors() {
                $('.is-invalid').removeClass('is-invalid');
                $('.invalid-feedback').text('');
            }

            $(document).on('input change', '#produkForm input, #produkForm textarea, #produkForm select',
                function() {
                    $(this).removeClass('is-invalid');
                    $('#' + this.id + '-error').text('');
                });

            $('#harga').on('input', function() {
                let value = $(this).val().replace(/[^0-9]/g, '');
                if (value) {
                    $(this).val('Rp ' + formatRupiah(value));
                } else {
                    $(this).val('');
                }
            });



            // Tampilkan modal tambah
            $(document).on('click', '#btnTambah', function() {
                $('#produkForm')[0].reset(); // reset form
                $('#id').val('');
                clearErrors();
                $('#DataModalLabel').text('Tambah Produk');
                $('#DataModal').modal('show');
            });

            // Edit data
            $(document).on('click', '.edit-btn', function() {
                let id = $(this).data('id');
                $.ajax({
                    url: `/thrif-id/produk/get/${id}`,
                    method: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        if (response.code === 200) {
                            let data = response.data;
                            $('#id').val(data.id);
                            $('#id_kategori').val(data.id_kategori);
                            $('#id_toko').val(data.id_toko);
                            $('#nama_produk').val(data.nama_produk);
                            $('#harga').val('Rp ' + formatRupiah(data.harga));
                            $('#status_stok').val(data.status_stok);
                            $('#jumlah_terjual').val(data.jumlah_terjual);
                            $('#DataModalLabel').text('Edit Produk');
                            $('#DataModal').modal('show');
                        }
                    },
                    error: function() {
                        errorAlert('Gagal mengambil data untuk edit');
                    }
                });
            });

            // Delete data
            $(document).on('click', '.delete-confirm', function() {
                let id = $(this).data('id');
                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: "Data yang dihapus tidak dapat dikembalikan!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Ya, Hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: `/thrif-id/produk/delete/${id}`,
                            method: 'DELETE',
                            dataType: 'json',
                            success: function(response) {
                                if (response.code === 200) {
                                    successAlert('Data berhasil dihapus!');
                                    getData();
                                }
                            },
                            error: function() {
                                errorAlert('Gagal menghapus data');
                            }
                        });
                    }
                });
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
