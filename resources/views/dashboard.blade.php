@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<header class="main-header d-flex align-items-center justify-content-between">
    <h1 id="page-title" class="fs-4 fw-bold text-dark mb-0">Dashboard</h1>
</header>
<div class="row mt-4">
    <!-- DB Ringkasan Data Rumah Sakit
    <div class="col-md-6 mb-4">
        <div class="card shadow-sm border-0 rounded-lg">
            <div class="card-body p-4">
                <div class="d-flex align-items-center">
                    <div class="rounded-circle bg-primary bg-opacity-10 text-primary d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                        <i class="fas fa-hospital-alt fa-2x"></i>
                    </div>
                    <div>
                        <h5 class="card-title text-muted mb-0">Rumah Sakit</h5>
                        <h2 class="card-text fw-bold mb-0">150</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    Card Ringkasan Data Pasien
    <div class="col-md-6 mb-4">
        <div class="card shadow-sm border-0 rounded-lg">
            <div class="card-body p-4">
                <div class="d-flex align-items-center">
                    <div class="rounded-circle bg-success bg-opacity-10 text-success d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                        <i class="fas fa-procedures fa-2x"></i>
                    </div>
                    <div>
                        <h5 class="card-title text-muted mb-0">Total Pasien</h5>
                        <h2 class="card-text fw-bold mb-0">4.200</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->

<!-- DB Ringkasan RS-->
<div class="col-md-6 mb-4">
    <div class="card shadow-sm border-0 rounded-lg">
        <div class="card-body p-4">
            <div class="d-flex align-items-center">
                <div class="rounded-circle bg-primary bg-opacity-10 text-primary d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                    <i class="fas fa-hospital-alt fa-2x"></i>
                </div>
                <div>
                    <h5 class="card-title text-muted mb-0">Rumah Sakit</h5>
                    <h2 class="card-text fw-bold mb-0">{{ $totalRumahSakit }}</h2>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- DB Ringkasan Pasien -->
<div class="col-md-6 mb-4">
    <div class="card shadow-sm border-0 rounded-lg">
        <div class="card-body p-4">
            <div class="d-flex align-items-center">
                <div class="rounded-circle bg-success bg-opacity-10 text-success d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                    <i class="fas fa-procedures fa-2x"></i>
                </div>
                <div>
                    <h5 class="card-title text-muted mb-0">Total Pasien</h5>
                    <h2 class="card-text fw-bold mb-0">{{ $totalPasien }}</h2>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <!-- Pasien Terbaru
    <div class="col-12">
        <div class="card shadow-sm border-0 rounded-lg">
            <div class="card-header bg-white fw-semibold">
                Pasien Terbaru
            </div>
            <div class="card-body p-0">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Budi Santoso <span class="badge bg-secondary ms-2">RS Bunda</span></li>
                    <li class="list-group-item">Ani Wijaya <span class="badge bg-secondary ms-2">RS Sehat</span></li>
                    <li class="list-group-item">Cahya Purnama <span class="badge bg-secondary ms-2">RS Bunda</span></li>
                    <li class="list-group-item">Dedy Irawan <span class="badge bg-secondary ms-2">Klinik Medika</span></li>
                </ul>
            </div>
        </div>
    </div> -->
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
       
        $('#confirm-logout').on('click', function() {
            console.log("Pengguna berhasil logout (simulasi).");
            $('#logout-modal').modal('hide');
            alert("Anda telah berhasil logout.");
            window.location.reload();
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
