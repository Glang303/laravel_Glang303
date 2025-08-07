@extends('layouts.app')

@section('title', 'Data Pasien')
@section('content')
<header class="main-header d-flex align-items-center justify-content-between">
    <h1 id="page-title" class="fs-4 fw-bold text-dark mb-0">Data Pasien</h1>
    <div class="d-flex align-items-center">
        <button id="btn-add" class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#create-modal">
            <i class="fas fa-plus me-2"></i>Tambah Data
        </button>
    </div>
</header>
<div id="content-container" class="bg-white p-4 rounded shadow-sm mt-4">
    
    <div class="d-flex align-items-center justify-content-between mb-3">
        <h3 class="fs-5 fw-semibold mb-0">Tabel Data Pasien</h3>
        <div class="d-flex align-items-center">
            <label for="filter-rs" class="form-label mb-0 me-2">Filter RS:</label>
            <select id="filter-rs" class="form-select me-2" style="width: 200px;">
                <option value="">Semua Rumah Sakit</option>
                @foreach($rumahSakits as $rs)
                    <option value="{{ $rs->id }}">{{ $rs->nama_rumah_sakit }}</option>
                @endforeach
            </select>
            <div class="input-group" style="width: 250px;">
                <span class="input-group-text"><i class="fas fa-search text-secondary"></i></span>
                <input type="text" placeholder="Cari Pasien..." class="form-control">
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Nama Pasien</th>
                    <th>Alamat</th>
                    <th>No Telpon</th>
                    <th>Rumah Sakit</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody id="pasien-table-body">
                @foreach($pasiens as $pasien)
                    <tr data-id="{{ $pasien->id }}">
                        <td>{{ $pasien->id }}</td>
                        <td>{{ $pasien->nama }}</td>
                        <td>{{ $pasien->alamat ?? '-' }}</td>
                        <td>{{ $pasien->no_hp ?? '-' }}</td>
                        <td>{{ $pasien->rumahSakit->nama_rumah_sakit ?? '-' }}</td>
                        <td>
                            <button class="btn btn-sm btn-info text-white me-2 edit-btn" data-bs-toggle="modal" data-bs-target="#edit-modal" data-id="{{ $pasien->id }}">Edit</button>
                            <button class="btn btn-sm btn-danger delete-btn" data-table="pasien" data-bs-toggle="modal" data-bs-target="#delete-modal" data-id="{{ $pasien->id }}">Hapus</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Modal untuk Tambah Data Pasien -->
<div class="modal fade" id="create-modal" tabindex="-1" aria-labelledby="create-modal-label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="create-modal-label">Tambah Data Pasien</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="create-pasien-form">
                    @csrf
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Pasien</label>
                        <input type="text" class="form-control" id="nama" name="nama" required>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea class="form-control" id="alamat" name="alamat"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="no_hp" class="form-label">No Telpon</label>
                        <input type="text" class="form-control" id="no_hp" name="no_hp">
                    </div>
                    <div class="mb-3">
                        <label for="rumah_sakit_id" class="form-label">Rumah Sakit</label>
                        <select class="form-select" id="rumah_sakit_id" name="rumah_sakit_id" required>
                            <option value="">Pilih Rumah Sakit</option>
                            @foreach($rumahSakits as $rs)
                                <option value="{{ $rs->id }}">{{ $rs->nama_rumah_sakit }}</option>
                            @endforeach
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary" id="save-pasien-data">Simpan Data</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal untuk Edit Data Pasien -->
<div class="modal fade" id="edit-modal" tabindex="-1" aria-labelledby="edit-modal-label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="edit-modal-label">Edit Data Pasien</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="edit-pasien-form">
                    @csrf
                    @method('PUT')
                    <input type="hidden" id="edit_id" name="id">
                    <div class="mb-3">
                        <label for="edit_nama" class="form-label">Nama Pasien</label>
                        <input type="text" class="form-control" id="edit_nama" name="nama" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit_alamat" class="form-label">Alamat</label>
                        <textarea class="form-control" id="edit_alamat" name="alamat"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="edit_no_hp" class="form-label">No Telpon</label>
                        <input type="text" class="form-control" id="edit_no_hp" name="no_hp">
                    </div>
                    <div class="mb-3">
                        <label for="edit_rumah_sakit_id" class="form-label">Rumah Sakit</label>
                        <select class="form-select" id="edit_rumah_sakit_id" name="rumah_sakit_id" required>
                            <option value="">Pilih Rumah Sakit</option>
                            @foreach($rumahSakits as $rs)
                                <option value="{{ $rs->id }}">{{ $rs->nama_rumah_sakit }}</option>
                            @endforeach
                        </select>
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

<!-- Modal untuk Konfirmasi Hapus -->
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
        const pasienTableBody = $('#pasien-table-body');
        const filterRsDropdown = $('#filter-rs');
        let currentItemToDelete = null;

        const renderTable = (pasiens) => {
            pasienTableBody.empty();
            if (pasiens.length === 0) {
                const emptyRow = `<tr><td colspan="6" class="text-center">Tidak ada data pasien.</td></tr>`;
                pasienTableBody.append(emptyRow);
                return;
            }

            pasiens.forEach(pasien => {
                const row = `<tr data-id="${pasien.id}">
                                <td>${pasien.id}</td>
                                <td>${pasien.nama}</td>
                                <td>${pasien.alamat ?? '-'}</td>
                                <td>${pasien.no_hp ?? '-'}</td>
                                <td>${pasien.rumah_sakit ? pasien.rumah_sakit.nama_rumah_sakit : '-'}</td>
                                <td>
                                    <button class="btn btn-sm btn-info text-white me-2 edit-btn" data-bs-toggle="modal" data-bs-target="#edit-modal" data-id="${pasien.id}">Edit</button>
                                    <button class="btn btn-sm btn-danger delete-btn" data-table="pasien" data-bs-toggle="modal" data-bs-target="#delete-modal" data-id="${pasien.id}">Hapus</button>
                                </td>
                            </tr>`;
                pasienTableBody.append(row);
            });
        };

        const loadPasienData = (rsId = null) => {
            let url = '/pasien-filter';
            if (rsId) {
                url += `?rumah_sakit_id=${rsId}`;
            }

            $.ajax({
                url: url,
                type: 'GET',
                success: function(response) {
                    renderTable(response);
                },
                error: function(xhr) {
                    alert("Gagal memuat data pasien.");
                    console.error("Kesalahan AJAX:", xhr.responseText);
                }
            });
        };

        filterRsDropdown.on('change', function() {
            const rsId = $(this).val();
            loadPasienData(rsId);
        });

        $('#save-pasien-data').on('click', function() {
            const saveButton = $(this);
            saveButton.prop('disabled', true);
            const formData = $('#create-pasien-form').serialize();

            $.ajax({
                url: '{{ route('pasien.store') }}',
                type: 'POST',
                data: formData,
                success: function(response) {
                    $('#create-modal').modal('hide');
                    $('#create-pasien-form')[0].reset();
                    loadPasienData(filterRsDropdown.val());
                },
                error: function(xhr) {
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
                    console.error("Kesalahan AJAX:", xhr.responseText);
                },
                complete: function() {
                    saveButton.prop('disabled', false);
                }
            });
        });

        $(document).on('click', '.edit-btn', function() {
            const pasienId = $(this).data('id');
            const editButton = $(this);
            editButton.prop('disabled', true);

            $.ajax({
                url: `/pasien/${pasienId}`,
                type: 'GET',
                success: function(response) {
                    $('#edit_id').val(response.id);
                    $('#edit_nama').val(response.nama);
                    $('#edit_alamat').val(response.alamat);
                    $('#edit_no_hp').val(response.no_hp);
                    $('#edit_rumah_sakit_id').val(response.rumah_sakit_id);
                    $('#edit-modal').modal('show');
                },
                error: function(xhr) {
                    alert("Gagal mengambil data pasien untuk diedit.");
                    console.error(xhr.responseText);
                },
                complete: function() {
                    editButton.prop('disabled', false);
                }
            });
        });

        $('#save-edit-data').on('click', function() {
            const saveEditButton = $(this);
            saveEditButton.prop('disabled', true);
            const pasienId = $('#edit_id').val();
            const updatedFormData = $('#edit-pasien-form').serialize();

            $.ajax({
                url: `/pasien/${pasienId}`,
                type: 'PUT',
                data: updatedFormData,
                success: function(response) {
                    $('#edit-modal').modal('hide');
                    alert("Data pasien berhasil diubah.");
                    loadPasienData(filterRsDropdown.val());
                },
                error: function(xhr) {
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
                    console.error("Kesalahan AJAX:", xhr.responseText);
                },
                complete: function() {
                    saveEditButton.prop('disabled', false);
                }
            });
        });

        $(document).on('click', '.delete-btn', function() {
            currentItemToDelete = $(this).data('id');
            $('#delete-modal').modal('show');
        });

        $('#confirm-delete').on('click', function() {
            if (!currentItemToDelete) return;
            
            const deleteButton = $(this);
            deleteButton.prop('disabled', true);
            
            $.ajax({
                url: `/pasien/${currentItemToDelete}`,
                type: 'DELETE',
                data: { _token: '{{ csrf_token() }}' },
                success: function(response) {
                    $(`tr[data-id='${currentItemToDelete}']`).remove();
                    $('#delete-modal').modal('hide');
                    currentItemToDelete = null;
                },
                error: function(xhr) {
                    alert("Gagal menghapus data.");
                    console.error(xhr.responseText);
                },
                complete: function() {
                    deleteButton.prop('disabled', false);
                }
            });
        });
        
        loadPasienData();

        $('#confirm-logout').on('click', function() {
            $('form#logout-form').submit();
        });

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
