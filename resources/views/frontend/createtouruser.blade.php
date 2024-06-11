@extends('layout.main')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Berita</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('pengguna_biasa.tour.index')}}">Home</a></li>
                            <li class="breadcrumb-item active">Tambah Turnamen</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <section class="content">
            <div class="container-fluid">
                <div class="col-12">
                    <form action="{{ route('pengguna_biasa.tour.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <!-- left column -->
                            <div class="col-md-12">
                                <!-- general form elements -->
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">Form Tambah Turnamen</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <h2>ISI INFORMASI TURNAMEN</h2>
                                            <label for="exampleInputEmail1">Nama Turnamen</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1"
                                                name="nama" placeholder="Masukan Nama Turnamen" value="{{ old('nama') }}">
                                            @error('nama')
                                                <small>{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">URL Turnamen</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1"
                                                name="url" placeholder="Masukan URL Turnamen" value="{{ old('url') }}">
                                            @error('url')
                                                <small>{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Jadwal Mulai</label>
                                            <input type="date" class="form-control" id="exampleInputEmail1"
                                                name="jadwal_mulai" value="{{ old('jadwal_mulai') }}">
                                            @error('jadwal_mulai')
                                                <small>{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Jadwal Selesai</label>
                                            <input type="date" class="form-control" id="exampleInputEmail1"
                                                name="jadwal_selesai" value="{{ old('jadwal_selesai') }}">
                                            @error('jadwal_selesai')
                                                <small>{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="game_id">Pilih Game:</label>
                                            <select name="game_id" id="game_id" class="form-control">
                                                @foreach($games as $game)
                                                    <option value="{{ $game->id }}" {{ old('game_id') == $game->id ? 'selected' : '' }}>{{ $game->judul }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Deskripsi</label>
                                            <textarea class="summernote" name="deskripsi">{{ old('deskripsi') }}</textarea>
                                            @error('deskripsi')
                                                <small>{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Tipe Turnamen</label>
                                            <select class="form-select @error('tipe') is-invalid @enderror"
                                                id="tipe" name="tipe">
                                                <option value="Online" {{ old('tipe') == 'Online' ? 'selected' : '' }}>Online</option>
                                                <option value="Offline" {{ old('tipe') == 'Offline' ? 'selected' : '' }}>Offline</option>
                                            </select>
                                            @error('tipe')
                                                <small>{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group" id="alamat-container"
                                            style="{{ old('tipe') == 'Offline' ? '' : 'display:none;' }}">
                                            <label for="exampleInputEmail1">Alamat (jika Offline)</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1"
                                                name="alamat" placeholder="Masukan Alamat" value="{{ old('alamat') }}">
                                            @error('alamat')
                                                <small>{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Hadiah Pemenang</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1"
                                                name="hadiah" placeholder="Masukan Hadiah Pemenang" value="{{ old('hadiah') }}">
                                            @error('hadiah')
                                                <small>{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Rules</label>
                                            <textarea class="summernote" name="rules">{{ old('rules') }}</textarea>
                                            @error('rules')
                                                <small>{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Fee</label>
                                            <input type="number" class="form-control" id="exampleInputEmail1"
                                                name="fee" placeholder="Masukan Fee" value="{{ old('fee') }}">
                                            @error('fee')
                                                <small>{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">URL Live</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1"
                                                name="url_live" placeholder="Masukan URL Live" value="{{ old('url_live') }}">
                                            @error('url_live')
                                                <small>{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Format</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1"
                                                name="format" placeholder="Masukan Format" value="{{ old('format') }}">
                                            @error('format')
                                                <small>{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <h2>ISI PENGATURAN REGISTRASI PESERTA</h2>
                                        <div class="form-group">
                                            <label for="jenis_pendaftaran">Jenis Pendaftaran</label>
                                            <select class="form-select" id="jenis_pendaftaran" name="jenis_pendaftaran">
                                                <option value="Individu" {{ old('jenis_pendaftaran') == 'Individu' ? 'selected' : '' }}>Individu</option>
                                                <option value="Tim" {{ old('jenis_pendaftaran') == 'Tim' ? 'selected' : '' }}>Tim</option>
                                            </select>
                                        </div>

                                        <div class="form-group" id="jumlah_peserta_container">
                                            <label for="jumlah_peserta">Jumlah Peserta</label>
                                            <input type="number" class="form-control" id="jumlah_peserta" name="jumlah_peserta" value="{{ old('jumlah_peserta', 1) }}">
                                        </div>
                                    
                                        <div class="form-group" id="jumlah_anggota_tim_container" style="{{ old('jenis_pendaftaran') == 'Tim' ? '' : 'display:none;' }}">
                                            <label for="jumlah_anggota_tim">Jumlah Anggota Tim</label>
                                            <input type="number" class="form-control" id="jumlah_anggota_tim" name="jumlah_anggota_tim" value="{{ old('jumlah_anggota_tim') }}">
                                        </div>
                                    
                                        <div class="form-group">
                                            <label for="batas_pendaftaran">Batas Pendaftaran</label>
                                            <input type="date" class="form-control" id="batas_pendaftaran" name="batas_pendaftaran" value="{{ old('batas_pendaftaran') }}">
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
