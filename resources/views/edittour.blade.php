@extends('layout.main')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Tournament</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Edit Tournament</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <section class="content">
            <div class="container-fluid">
                <div class="col-12">
                    <form action="{{ route('admin.tour.update', ['id' => $data->id]) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <!-- left column -->
                            <div class="col-md-12">
                                <!-- general form elements -->
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">Form Edit Turnamen</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="nama">Nama Turnamen</label>
                                            <input type="text" class="form-control" id="nama" name="nama"
                                                value="{{ $data->nama }}" placeholder="Masukan Nama Turnamen">
                                            @error('nama')
                                                <small>{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="url">URL Turnamen</label>
                                            <input type="text" class="form-control" id="url" name="url"
                                                value="{{ $data->url }}" placeholder="Masukan URL Turnamen">
                                            @error('url')
                                                <small>{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="jadwal_mulai">Jadwal Mulai</label>
                                            <input type="date" class="form-control" id="jadwal_mulai"
                                                name="jadwal_mulai" value="{{ $data->jadwal_mulai }}">
                                            @error('jadwal_mulai')
                                                <small>{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="jadwal_selesai">Jadwal Selesai</label>
                                            <input type="date" class="form-control" id="jadwal_selesai"
                                                name="jadwal_selesai" value="{{ $data->jadwal_selesai }}">
                                            @error('jadwal_selesai')
                                                <small>{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="game_id">Pilih Game:</label>
                                            <select name="game_id" id="game_id" class="form-control">
                                                @foreach($games as $game)
                                                    <option value="{{ $game->id }}" {{ $data->game_id == $game->id ? 'selected' : '' }}>{{ $game->judul }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="deskripsi">Deskripsi</label>
                                            <textarea class="summernote" name="deskripsi">{{ $data->deskripsi }}</textarea>
                                            @error('deskripsi')
                                                <small>{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="tipe">Tipe Turnamen</label>
                                            <select class="form-select @error('tipe') is-invalid @enderror"
                                                id="tipe" name="tipe">
                                                <option value="Online" {{ $data->tipe == 'Online' ? 'selected' : '' }}>
                                                    Online</option>
                                                <option value="Offline" {{ $data->tipe == 'Offline' ? 'selected' : '' }}>
                                                    Offline</option>
                                            </select>
                                            @error('tipe')
                                                <small>{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group" id="alamat-container"
                                            style="{{ $data->tipe == 'Offline' ? '' : 'display:none;' }}">
                                            <label for="alamat">Alamat (jika Offline)</label>
                                            <input type="text" class="form-control" id="alamat" name="alamat"
                                                value="{{ $data->alamat }}" placeholder="Masukan Alamat">
                                            @error('alamat')
                                                <small>{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="hadiah">Hadiah Pemenang</label>
                                            <input type="text" class="form-control" id="hadiah" name="hadiah"
                                                value="{{ $data->hadiah }}" placeholder="Masukan Hadiah Turnamen">
                                            @error('hadiah')
                                                <small>{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="rules">Rules</label>
                                            <textarea class="summernote" name="rules">{{ $data->rules }}</textarea>
                                            @error('rules')
                                                <small>{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="fee">Fee</label>
                                            <input type="number" class="form-control" id="fee" name="fee" value="{{ $data->fee }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="url_live">URL Live</label>
                                            <input type="text" class="form-control" id="url_live" name="url_live" value="{{ $data->url_live }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="format">Format</label>
                                            <input type="text" class="form-control" id="format" name="format" value="{{ $data->format }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="jenis_pendaftaran">Jenis Pendaftaran</label>
                                            <select class="form-select" id="jenis_pendaftaran" name="jenis_pendaftaran">
                                                <option value="Individu" {{ $data->jenis_pendaftaran == 'Individu' ? 'selected' : '' }}>Individu</option>
                                                <option value="Tim" {{ $data->jenis_pendaftaran == 'Tim' ? 'selected' : '' }}>Tim</option>
                                            </select>
                                        </div>
                                        <div class="form-group" id="jumlah_peserta_container">
                                            <label for="jumlah_peserta">Jumlah Peserta</label>
                                            <input type="number" class="form-control" id="jumlah_peserta" name="jumlah_peserta" value="{{ $data->registrationSetting ? $data->registrationSetting->jumlah_peserta : '' }}">
                                        </div>
                                        <div class="form-group" id="jumlah_anggota_tim_container" style="{{ $data->jenis_pendaftaran == 'Tim' ? '' : 'display:none;' }}">
                                            <label for="jumlah_anggota_tim">Jumlah Anggota Tim</label>
                                            <input type="number" class="form-control" id="jumlah_anggota_tim" name="jumlah_anggota_tim" value="{{ $data->jumlah_anggota_tim }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="batas_pendaftaran">Batas Pendaftaran</label>
                                            <input type="date" class="form-control" id="batas_pendaftaran" name="batas_pendaftaran" value="{{ $data->registrationSetting->batas_pendaftaran }}">
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                                <!-- /.card -->
                            </div>
                            <!--/.col (left) -->
                        </div>
                    </form>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
        </section>
    </div>
    <script>
        // js for tipe turnamen
        const tipeSelect = document.getElementById('tipe');
        const alamatContainer = document.getElementById('alamat-container');

        tipeSelect.addEventListener('change', function() {
            if (this.value === 'Offline') {
                alamatContainer.style.display = 'block';
            } else {
                alamatContainer.style.display = 'none';
            }
        });

        // js for tipe peserta
        const jenisPendaftaranSelect = document.getElementById('jenis_pendaftaran');
        const jumlahPesertaContainer = document.getElementById('jumlah_peserta_container');
        const jumlahAnggotaTimContainer = document.getElementById('jumlah_anggota_tim_container');

        jenisPendaftaranSelect.addEventListener('change', function() {
            if (this.value === 'Individu') {
                jumlahPesertaContainer.style.display = 'block';
                jumlahAnggotaTimContainer.style.display = 'none';
            } else {
                jumlahPesertaContainer.style.display = 'block';
                jumlahAnggotaTimContainer.style.display = 'block';
            }
        });

        // js for form deskripsi
        $(document).ready(function() {
            $('.summernote').summernote();
        });
    </script>
@endsection
