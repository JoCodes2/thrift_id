@extends('Layouts.Base')
@section('content')
    <div class="card">
        <div class="card-header py-3 d-flex align-items-center justify-content-between">
            <h3 class="m-0 font-weight-bold">
                <i class="fa-solid fa-award pr-2"></i> Toko
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
                            <th>Pengguna</th>
                            <th>Nama Toko</th>
                            <th>Email Toko</th>
                            <th>No Hp Toko</th>
                            <th>Alamat Toko</th>
                            <th>Foto</th>
                            <th>Tahun Terdaftar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="tBody">
                        <tr>
                            <td colspan="9" class="text-center">Memuat data...</td>
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
                    <form id="tokoForm" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" id="id" name="id">

                        {{-- Nama Toko --}}
                        <div class="form-group mb-3">
                            <label for="nama_toko">Nama Toko</label>
                            <input type="text" class="form-control" name="nama_toko" id="nama_toko"
                                placeholder="Masukkan nama toko">
                            <div class="invalid-feedback" id="nama_toko-error"></div>
                        </div>

                        {{-- Email Toko --}}
                        <div class="form-group mb-3">
                            <label for="email_toko">Email Toko</label>
                            <input type="email" class="form-control" name="email_toko" id="email_toko"
                                placeholder="Masukkan email toko">
                            <div class="invalid-feedback" id="email_toko-error"></div>
                        </div>

                        {{-- No HP Toko --}}
                        <div class="form-group mb-3">
                            <label for="no_hp_toko">No. HP Toko</label>
                            <input type="text" class="form-control" name="no_hp_toko" id="no_hp_toko"
                                placeholder="Masukkan nomor HP">
                            <div class="invalid-feedback" id="no_hp_toko-error"></div>
                        </div>

                        {{-- Alamat Toko --}}
                        <div class="form-group mb-3">
                            <label for="alamat_toko">Alamat Toko</label>
                            <textarea class="form-control" name="alamat_toko" id="alamat_toko" placeholder="Masukkan alamat toko"></textarea>
                            <div class="invalid-feedback" id="alamat_toko-error"></div>
                        </div>

                        {{-- Foto Toko --}}
                        <div class="form-group mb-3">
                            <label for="foto">Foto Toko</label>
                            <input type="file" class="form-control" name="foto" id="foto">
                            <div class="invalid-feedback" id="foto-error"></div>

                            {{-- preview --}}
                            <img id="preview-foto" src="" class="img-fluid mt-2 d-none" style="max-height: 150px;">
                        </div>

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

            // Ambil data user
            function getData() {
                $.ajax({
                    url: "/thrif-id/toko",
                    method: "GET",
                    dataType: "json",
                    success: function(response) {
                        console.log(response);
                        let tableBody = "";
                        $.each(response.data, function(index, item) {
                            tableBody += `<tr>
                                <td>${index + 1}</td>
                                <td>${item.user ? item.user.nama : '-'}</td>
                                <td>${item.nama_toko}</td>
                                <td>${item.email_toko}</td>
                                <td>${item.no_hp_toko}</td>
                                <td>${item.alamat_toko}</td>
                                <td><img src="/uploads/foto/${item.foto}" alt="Foto Toko" style="max-height: 100px;"></td>
                                 <td>${item.tahun_terdaftar}</td>

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

            function clearErrors() {
                $('.is-invalid').removeClass('is-invalid');
                $('.invalid-feedback').text('');
            }

            $(document).on('input change', '#tokoForm input, #tokoForm textarea', function() {
                $(this).removeClass('is-invalid');
                $('#' + this.id + '-error').text('');
            });

            // Tampilkan modal tambah
            $(document).on('click', '#btnTambah', function() {
                $('#tokoForm')[0].reset(); // reset form
                $('#id').val('');
                clearErrors();
                $('#preview-foto').addClass('d-none').attr('src', '');
                $('#DataModalLabel').text('Tambah Toko');
                $('#DataModal').modal('show');
            });

            // Reset saat modal ditutup
            $('#DataModal').on('hidden.bs.modal', function() {
                $('#tokoForm')[0].reset();
                $('#id').val('');
                clearErrors();
                $('#preview-foto').addClass('d-none').attr('src', '');
            });

            // Preview foto
            $(document).on('change', '#foto', function() {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        $('#preview-foto').attr('src', e.target.result).removeClass('d-none');
                    };
                    reader.readAsDataURL(file);
                } else {
                    $('#preview-foto').addClass('d-none').attr('src', '');
                }
            });

            // Simpan data
            $(document).on('click', '#simpanData', function() {
                const formData = new FormData($('#tokoForm')[0]);
                const id = $('#id').val();
                const url = id ? `/thrif-id/toko/update/${id}` : '/thrif-id/toko/create';
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

            // Edit data
            $(document).on('click', '.edit-btn', function() {
                const id = $(this).data('id');
                $.ajax({
                    url: `/thrif-id/toko/get/${id}`,
                    method: 'GET',
                    success: function(response) {
                        if (response.code === 200) {
                            const data = response.data;
                            $('#id').val(data.id);
                            $('#nama_toko').val(data.nama_toko);
                            $('#email_toko').val(data.email_toko);
                            $('#no_hp_toko').val(data.no_hp_toko);
                            $('#alamat_toko').val(data.alamat_toko);
                            if (data.foto) {
                                $('#preview-foto').attr('src', `/uploads/foto/${data.foto}`)
                                    .removeClass('d-none');
                            }
                            $('#DataModalLabel').text('Edit Toko');
                            $('#DataModal').modal('show');
                        }
                    },
                    error: function() {
                        toastr.error('Gagal mengambil data untuk edit.');
                    }
                });
            });

            // Hapus data
            // Delete data button click handler
            $(document).on('click', '.delete-confirm', function() {
                let id = $(this).data('id');

                function deleteData() {
                    $.ajax({
                        type: 'DELETE',
                        url: `/thrif-id/toko/delete/${id}`,
                        dataType: 'json',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            console.log(response);

                            if (response.code === 200 || response.status === "success") {
                                successAlert('Data berhasil dihapus!');

                                // 🔥 AUTO RELOAD BROWSER
                                setTimeout(() => {
                                    location.reload();
                                }, 1000);

                            } else {
                                errorAlert();
                            }
                        },
                        error: function(xhr) {
                            console.error('Error:', xhr.responseText);
                            errorAlert();
                        }
                    });
                }

                confirmAlert('Apakah Anda yakin ingin menghapus data?', deleteData);
            });

            // Fungsi enter untuk submit form
            $('#tokoForm').on('keypress', function(e) {
                if (e.which === 13) { // Enter key
                    e.preventDefault();
                    $('#simpanData').click();
                }
            });

        });
    </script>
@endsection
