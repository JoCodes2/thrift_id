@extends('Layouts.Base')
@section('content')
    <div class="card">
        <div class="card-header py-3 d-flex align-items-center justify-content-between">
            <h3 class="m-0 font-weight-bold">
                <i class="fa-solid fa-award pr-2"></i> Pengguna
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
                            <th>Nama</th>
                            <th>Email</th>
                            <th>No HP</th>
                            <th>Sandi</th>
                            <th>Hak Akses</th>
                            <th>Alamat</th>
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
                    <h5 class="modal-title" id="DataModalLabel">Data Pengguna</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form id="userForm" method="POST">
                        @csrf
                        <input type="hidden" id="id" name="id">

                        {{-- Nama --}}
                        <div class="form-group mb-3">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" name="nama" id="nama"
                                placeholder="Masukkan nama">
                            <div class="invalid-feedback" id="nama-error"></div>
                        </div>

                        {{-- Email --}}
                        <div class="form-group mb-3">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" id="email"
                                placeholder="Masukkan email">
                            <div class="invalid-feedback" id="email-error"></div>
                        </div>

                        <div class="form-group mb-3">
                            <label for="no_hp">No HP</label>
                            <input type="text" class="form-control" name="no_hp" id="no_hp"
                                placeholder="Masukkan no hp">
                            <div class="invalid-feedback" id="no_hp-error"></div>
                        </div>

                        {{-- Password --}}
                        <div class="form-group mb-3">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" id="password"
                                placeholder="Masukkan password">
                            <div class="invalid-feedback" id="password-error"></div>
                            <small class="text-muted">
                                Kosongkan jika tidak ingin mengubah password
                            </small>
                        </div>

                        {{-- Role --}}
                        <div class="form-group mb-3">
                            <label for="role">Role</label>
                            <select name="role" id="role" class="form-control">
                                <option value="">-- Pilih Role --</option>
                                <option value="super-admin">Super Admin</option>
                                <option value="penjual">Penjual</option>
                                <option value="pembeli">Pembeli</option>
                            </select>
                            <div class="invalid-feedback" id="role-error"></div>
                        </div>

                        <div class="form-group mb-3">
                            <label for="alamat">Alamat</label>
                            <input type="text" class="form-control" name="alamat" id="alamat"
                                placeholder="Masukkan alamat">
                            <div class="invalid-feedback" id="alamat-error"></div>
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
                    url: "/thrif-id/transaksi",
                    method: "GET",
                    dataType: "json",
                    success: function(response) {
                        console.log(response);
                        let tableBody = "";
                        $.each(response.data, function(index, item) {
                            tableBody += `<tr>
                                <td>${index + 1}</td>
                                <td>${item.nama}</td>
                                <td>${item.email}</td>
                                <td>${item.no_hp}</td>
                                <td>****</td>
                                <td>${item.role}</td>
                                <td>${item.alamat}</td>
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

            $(document).on('input change', '#userForm input, #userForm textarea', function() {
                $(this).removeClass('is-invalid');
                $('#' + this.id + '-error').text('');
            });

            // Tampilkan modal tambah
            $(document).on('click', '#btnTambah', function() {
                $('#userForm')[0].reset(); // reset form
                $('#id').val('');
                clearErrors();
                $('#DataModal').modal('show');
            });

            // Reset saat modal ditutup
            $('#DataModal').on('hidden.bs.modal', function() {
                $('#userForm')[0].reset();
                $('#id').val('');
                clearErrors();
            });

        });
    </script>
@endsection
