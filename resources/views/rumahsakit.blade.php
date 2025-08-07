@extends('layouts.app')

@section('title', 'Data Rumah Sakit')
@section('content')
<header class="main-header d-flex align-items-center justify-content-between">
    <h1 id="page-title" class="fs-4 fw-bold text-dark mb-0">Data Rumah Sakit</h1>
    <div class="d-flex align-items-center">

        <!--mdoal tambah data -->
        <button id="btn-add" class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#create-modal">
            <i class="fas fa-plus me-2"></i>Tambah Data
        </button>
    </div>
</header>
<div id="content-container" class="bg-white p-4 rounded shadow-sm mt-4">
    
    <!-- Hal Data rs -->
    <div class="d-flex align-items-center justify-content-between mb-3">
        <h3 class="fs-5 fw-semibold mb-0">Tabel Data Rumah Sakit</h3>
        <div class="input-group" style="width: 250px;">
            <span class="input-group-text"><i class="fas fa-search text-secondary"></i></span>
            <input type="text" placeholder="Cari..." class="form-control">
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Nama Rumah Sakit</th>
                    <th>Alamat</th>
                    <th>Email</th>
                    <th>Telepon</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody id="rs-table-body">
                @foreach($rumahSakits as $rs)
                <tr data-id="{{ $rs->id }}">
                    <td>{{ $rs->id }}</td>
                    <td>{{ $rs->nama_rumah_sakit }}</td>
                    <td>{{ $rs->alamat }}</td>
                    <td>{{ $rs->email ?? '-' }}</td>
                    <td>{{ $rs->telepon }}</td>
                    <td>
                        <!-- Tmbl modal edit -->
                        <button class="btn btn-sm btn-info text-white me-2 edit-btn" data-bs-toggle="modal" data-bs-target="#edit-modal" data-id="{{ $rs->id }}">Edit</button>
                        <button class="btn btn-sm btn-danger delete-btn" data-table="rumah-sakit" data-id="{{ $rs->id }}">Hapus</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Mdll Tambah Data Rumah Sakit 5 -->
<div class="modal fade" id="create-modal" tabindex="-1" aria-labelledby="create-modal-label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="create-modal-label">Tambah Data Rumah Sakit</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="create-rs-form">
                    @csrf 
                    <div class="mb-3">
                        <label for="nama_rumah_sakit" class="form-label">Nama Rumah Sakit</label>
                        <input type="text" class="form-control" id="nama_rumah_sakit" name="nama_rumah_sakit" required>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea class="form-control" id="alamat" name="alamat" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="telepon" class="form-label">Telepon</label>
                        <input type="text" class="form-control" id="telepon" name="telepon" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary" id="save-rs-data">Simpan Data</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal deit ke 6 (pleaseee bisa) -->
<div class="modal fade" id="edit-modal" tabindex="-1" aria-labelledby="edit-modal-label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="edit-modal-label">Edit Data Rumah Sakit</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="edit-rs-form">
                    @csrf
                    @method('PUT')
                    <input type="hidden" id="edit_id" name="id">
                    <div class="mb-3">
                        <label for="edit_nama_rumah_sakit" class="form-label">Nama Rumah Sakit</label>
                        <input type="text" class="form-control" id="edit_nama_rumah_sakit" name="nama_rumah_sakit" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit_alamat" class="form-label">Alamat</label>
                        <textarea class="form-control" id="edit_alamat" name="alamat" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="edit_email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="edit_email" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="edit_telepon" class="form-label">Telepon</label>
                        <input type="text" class="form-control" id="edit_telepon" name="telepon" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary" id="save-edit-data">Simpan Perubahan</button>
            </div>
        </div>
    </div>
</div>

<!-- AJx Konfirmasi Hapus  -->
<div class="modal fade" id="delete-modal" tabindex="-1" aria-labelledby="delete-modal-label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="delete-modal-label">Konfirmasi Hapus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin menghapus data ini?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-danger" id="confirm-delete">Hapus</button>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        let currentItemToDelete = null;

        //  pas dlt di klik
        $(document).on('click', '.delete-btn', function() {
            currentItemToDelete = $(this).data('id');
            $('#delete-modal').modal('show');
        });

        //
        $('#confirm-delete').on('click', function() {
            if (!currentItemToDelete) return;

            $.ajax({
                url: `/rumahsakit/${currentItemToDelete}`,
                type: 'DELETE',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    $(`#rs-table-body tr[data-id='${currentItemToDelete}']`).remove();
                    $('#delete-modal').modal('hide');
                    currentItemToDelete = null;
                },
                error: function(xhr) {
                    alert("Gagal menghapus data.");
                    console.error(xhr.responseText);
                }
            });
        });

        // Fitur Tambah Data rs
        $('#save-rs-data').on('click', function() {
            // Menonaktifkan tombol untuk mencegah pengiriman berulang
            const saveButton = $(this);
            saveButton.prop('disabled', true);
            
            // Log untuk memeriksa apakah tombol diklik
            console.log("Tombol 'Simpan Data' diklik.");

            // Ambil semua data dari form
            const formData = $('#create-rs-form').serialize();
            
            // Log untuk melihat data yang dikirim
            console.log("Data yang dikirim:", formData);
            
            $.ajax({
                url: '{{ route('rumahsakit.store') }}', 
                type: 'POST',
                data: formData,
                success: function(response) {
                    // Log jika permintaan berhasil
                    console.log("Permintaan AJAX berhasil. Respons:", response);

                    // Tutup modal jika berhasil
                    $('#create-modal').modal('hide');
                    
                    // Reset form agar bersih
                    $('#create-rs-form')[0].reset();

                    // Tambahkan data baru ke tabel (tanpa reload halaman)
                    const newRow = `<tr data-id="${response.id}">
                                        <td>${response.id}</td>
                                        <td>${response.nama_rumah_sakit}</td>
                                        <td>${response.alamat}</td>
                                        <td>${response.email ?? '-'}</td>
                                        <td>${response.telepon}</td>
                                        <td>
                                            <button class="btn btn-sm btn-info text-white me-2 edit-btn" data-bs-toggle="modal" data-bs-target="#edit-modal" data-id="${response.id}">Edit</button>
                                            <button class="btn btn-sm btn-danger delete-btn" data-table="rumah-sakit" data-id="${response.id}">Hapus</button>
                                        </td>
                                    </tr>`;
                    $('#rs-table-body').append(newRow);
                },
                error: function(xhr) {
                    // Log jika permintaan gagal
                    console.error("Permintaan AJAX gagal. Status:", xhr.status, "Respons:", xhr.responseText);
                    
                    // Menampilkan pesan error yang lebih detail dari server
                    if (xhr.status === 422) {
                        let errors = xhr.responseJSON.errors;
                        let errorMsg = '';
                        $.each(errors, function(key, value) {
                            errorMsg += value + '\n';
                        });
                        alert('Validasi Gagal:\n' + errorMsg);
                    } else {
                        alert("Gagal menyimpan data.");
                    }
                },
                complete: function() {
                    // Mengaktifkan kembali tombol setelah permintaan selesai (baik sukses maupun gagal)
                    saveButton.prop('disabled', false);
                }
            });
        });

        // Fitur Edit Data Rumah Sakit
        let currentItemIdToEdit = null;

        // Saat tombol edit diklik
        $(document).on('click', '.edit-btn', function() {
            currentItemIdToEdit = $(this).data('id');
            const editButton = $(this);
            editButton.prop('disabled', true);

            // Ambil data dari server menggunakan rute 'show'
            $.ajax({
                url: `/rumahsakit/${currentItemIdToEdit}`,
                type: 'GET',
                success: function(response) {
                    // Isi formulir di modal edit dengan data yang diterima
                    $('#edit_id').val(response.id);
                    $('#edit_nama_rumah_sakit').val(response.nama_rumah_sakit);
                    $('#edit_alamat').val(response.alamat);
                    $('#edit_email').val(response.email);
                    $('#edit_telepon').val(response.telepon);
                    $('#edit-modal').modal('show');
                },
                error: function(xhr) {
                    alert("Gagal mengambil data untuk diedit.");
                    console.error(xhr.responseText);
                },
                complete: function() {
                    editButton.prop('disabled', false);
                }
            });
        });

        // Saat tombol "Simpan Perubahan" diklik
        $('#save-edit-data').on('click', function() {
            const saveEditButton = $(this);
            saveEditButton.prop('disabled', true);

            const updatedFormData = $('#edit-rs-form').serialize();
            const rumahSakitId = $('#edit_id').val();

            $.ajax({
                url: `/rumahsakit/${rumahSakitId}`,
                type: 'PUT', // Menggunakan PUT untuk permintaan update
                data: updatedFormData,
                success: function(response) {
                    $('#edit-modal').modal('hide');
                    alert("Data berhasil diubah.");
                    
                    // Perbarui baris tabel secara dinamis
                    const updatedRow = $(`#rs-table-body tr[data-id='${rumahSakitId}']`);
                    updatedRow.find('td:eq(1)').text($('#edit_nama_rumah_sakit').val());
                    updatedRow.find('td:eq(2)').text($('#edit_alamat').val());
                    updatedRow.find('td:eq(3)').text($('#edit_email').val());
                    updatedRow.find('td:eq(4)').text($('#edit_telepon').val());
                },
                error: function(xhr) {
                    console.error("Permintaan AJAX gagal. Status:", xhr.status, "Respons:", xhr.responseText);
                    if (xhr.status === 422) {
                        let errors = xhr.responseJSON.errors;
                        let errorMsg = '';
                        $.each(errors, function(key, value) {
                            errorMsg += value + '\n';
                        });
                        alert('Validasi Gagal:\n' + errorMsg);
                    } else {
                        alert("Gagal mengubah data.");
                    }
                },
                complete: function() {
                    saveEditButton.prop('disabled', false);
                }
            });
        });

        // Logout simulasi (bisa dikembangkan)
        $('#confirm-logout').on('click', function() {
            $('form#logout-form').submit(); 
        });

        // Dropdown profil
        $('.profile-container').on('click', function(e) {
            e.stopPropagation();
            $('#profile-dropdown').slideToggle('fast');
        });
        $(document).on('click', function() {
            $('#profile-dropdown').slideUp('fast');
        });
        $('#profile-dropdown').on('click', function(e) {
            e.stopPropagation();
        });
    });
</script>
@endsection
