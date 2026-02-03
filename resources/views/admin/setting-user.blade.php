@extends('Layouts.Base')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Ubah Biodata Diri</h5>
                <div class="card-body">
                    <div class="d-flex align-items-start align-items-sm-center gap-4">
                        <!-- Optional: Add Profile Picture Here if needed later -->
                    </div>
                    <form id="formAccountSettings" method="POST" onsubmit="return false">
                        <input type="hidden" name="id" id="userId" value="{{ Auth::user()->id }}">
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="nama" class="form-label">Nama Lengkap</label>
                                <input class="form-control" type="text" id="nama" name="nama"
                                    value="{{ Auth::user()->nama }}" autofocus />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="email" class="form-label">Alamat Email</label>
                                <input class="form-control" type="text" id="email" name="email"
                                    value="{{ Auth::user()->email }}" placeholder="john.doe@example.com" />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="no_hp">Nomor WhatsApp</label>
                                <div class="input-group input-group-merge">
                                    <input type="text" id="no_hp" name="no_hp" class="form-control"
                                        value="{{ Auth::user()->no_hp }}" placeholder="081234567890" />
                                </div>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="role" class="form-label">Status Akun</label>
                                <input type="text" class="form-control" id="role" name="role"
                                    value="{{ Auth::user()->role }}" readonly />
                                <small class="text-muted">Status akun tidak dapat diubah secara langsung.</small>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="password" class="form-label">Password Baru</label>
                                <input class="form-control" type="password" id="password" name="password"
                                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                                <small class="text-muted">Kosongkan jika tidak ingin mengubah password.</small>
                            </div>
                            <div class="mb-3 col-md-12">
                                <label for="alamat" class="form-label">Alamat Pengiriman</label>
                                <textarea class="form-control" id="alamat" name="alamat" rows="3">{{ Auth::user()->alamat }}</textarea>
                            </div>
                        </div>
                        <div class="mt-2">
                            <button type="submit" class="btn btn-primary me-2">Simpan Perubahan</button>
                            <button type="reset" class="btn btn-outline-secondary">Batal</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            const userId = $('#userId').val();
            const updateUrl = `${appUrl}/thrif-id/user/update/${userId}`;

            // Capture initial state
            const initialData = {
                nama: $('#nama').val(),
                email: $('#email').val(),
                no_hp: $('#no_hp').val(),
                alamat: $('#alamat').val()
            };

            $('#formAccountSettings').submit(function(e) {
                e.preventDefault();

                // Check for changes
                const currentData = {
                    nama: $('#nama').val(),
                    email: $('#email').val(),
                    no_hp: $('#no_hp').val(),
                    alamat: $('#alamat').val()
                };

                const password = $('#password').val();

                const isChanged = (
                    currentData.nama !== initialData.nama ||
                    currentData.email !== initialData.email ||
                    currentData.no_hp !== initialData.no_hp ||
                    currentData.alamat !== initialData.alamat ||
                    password !== ''
                );

                if (!isChanged) {
                    Swal.fire({
                        icon: 'info',
                        title: 'Tidak Ada Perubahan',
                        text: 'Anda tidak melakukan perubahan data apapun.',
                        confirmButtonText: 'Oke'
                    });
                    return;
                }
                
                // Basic client-side feedback (optional, relying on backend validation mostly)
                const submitBtn = $(this).find('button[type="submit"]');
                const originalText = submitBtn.text();
                submitBtn.prop('disabled', true).text('Menyimpan...');

                // Collect form data
                let formData = new FormData(this);

                $.ajax({
                    url: updateUrl,
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        submitBtn.prop('disabled', false).text(originalText);
                        
                        if (response.code === 200) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil!',
                                text: 'Data profil berhasil diperbarui. Silakan login kembali.',
                                timer: 2000,
                                showConfirmButton: false
                            }).then(() => {
                                // Logout process
                                $.ajax({
                                    url: `${appUrl}/thrif-id/logout`,
                                    method: 'POST',
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    },
                                    success: function() {
                                        window.location.href = '/login';
                                    },
                                    error: function() {
                                        // Fallback if logout fails, just redirect or reload
                                        window.location.href = '/login';
                                    }
                                });
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal',
                                text: response.message || 'Terjadi kesalahan saat memperbarui data.'
                            });
                        }
                    },
                    error: function(xhr) {
                        submitBtn.prop('disabled', false).text(originalText);
                        
                        let errorMessage = 'Terjadi kesalahan pada server.';
                        if (xhr.status === 422) {
                            // Validation errors
                            const res = xhr.responseJSON;
                            if (res.data) {
                                let errorsHtml = '<ul style="text-align: left;">';
                                $.each(res.data, function(key, value) {
                                    errorsHtml += `<li>${value[0]}</li>`;
                                });
                                errorsHtml += '</ul>';
                                errorMessage = errorsHtml;
                            } else {
                                errorMessage = res.message;
                            }
                        } else if (xhr.responseJSON && xhr.responseJSON.message) {
                            errorMessage = xhr.responseJSON.message;
                        }

                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal Memproses',
                            html: errorMessage
                        });
                    }
                });
            });
        });
    </script>
@endsection
