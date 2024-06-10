<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GASLogin - Create Tournament</title>
    <link rel="shortcut icon" href="./assets/images/fav.png" type="image/svg+xml">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style_createTournament.css') }}">
    <script src="{{ asset('assets/js/script_createTournament.js') }}" defer></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500;600;700&family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
    <!-- Page-Revealer -->
    <link rel="stylesheet" href="{{ asset('assetsmigrate/css/main.css') }}">
    <script src="{{ asset('assetsmigrate/js/tg-page-head.js') }}"></script>
    <style>
        .containerz {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 20px;
            margin-top: 30vh;
        }
        form {
            width: 60%;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #0c0f11;
        }
        .form-group {
            margin-bottom: 15px;
            position: relative;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #fff;
        }
        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 10px;
            border: none;
            border-bottom: 2px solid #ccc;
            border-radius: 0;
            outline: none;
            transition: border-color 0.3s;
            color: #fff;
            background-color: #0c0f11;
        }
        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            border-bottom-color: #007bff;
        }
        .form-group textarea {
            resize: vertical;
        }
        .btn-primary,
        .btn-secondary {
            display: inline-block;
            padding: 10px 20px;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
            margin-right: 10px;
        }
        .btn-primary:hover,
        .btn-secondary:hover {
            background-color: #0056b3;
        }
        .btn-secondary {
            background-color: #6c757d;
        }
        .btn-tour-index {
            width: 55%;
            margin-bottom: 25px;
        }
        .step {
            display: none;
        }
        .step-active {
            display: block;
        }
    </style>
</head>
<body>
    @include('spatial.navbar')
    <main class="containerz">
        @php
        $games = App\Models\Game::all();
        @endphp
        <a 
            class="btn btn-primary btn-tour-index" 
            href="{{ route('pengguna_biasa.tour.index') }}"
        >Manage Tournaments</a>
        <form action="{{ route('storetourfe') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        {{-- <div class="card-header">
                            <h3 class="card-title">Form Tambah Turnamen</h3>
                        </div> --}}
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

                            <div class="form-group">
                                {{-- <label for="jenis_pendaftaran">Jenis Pendaftaran</label> --}}
                                {{-- <select class="form-select" id="jenis_pendaftaran" name="jenis_pendaftaran">
                                    <option value="Individu" {{ old('jenis_pendaftaran') == 'Individu' ? 'selected' : '' }}>Individu</option>
                                    <option value="Tim" {{ old('jenis_pendaftaran') == 'Tim' ? 'selected' : '' }}>Tim</option>
                                </select> --}}
                                <input type="hidden" class="form-control" id="jenis_pendaftaran" name="jenis_pendaftaran" value="Tim" readonly>
                            </div>

                            {{-- <div class="form-group" id="jumlah_peserta_container">
                                <label for="jumlah_peserta">Jumlah Peserta</label>
                                <input type="number" class="form-control" id="jumlah_peserta" name="jumlah_peserta" value="{{ old('jumlah_peserta', 1) }}">
                            </div> --}}
                        
                            <div class="form-group" id="jumlah_anggota_tim_container" style="{{ old('jenis_pendaftaran')}}">
                                <label for="jumlah_anggota_tim">Jumlah Tim</label>
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
    </main>
    @include('spatial.footer')
    <a href="#top" class="btn btn-primary go-top" data-go-top>
        <ion-icon name="chevron-up-outline"></ion-icon>
    </a>
    <script>
        function nextStep(step) {
            var currentStep = document.querySelector('.step-active');
            currentStep.classList.remove('step-active');
            currentStep.classList.add('step');
            
            var nextStep = document.getElementById('step-' + step);
            if (nextStep) {
                nextStep.classList.add('step-active');
                nextStep.classList.remove('step');
            }
        }
    
        function prevStep(step) {
            var currentStep = document.querySelector('.step-active');
            currentStep.classList.remove('step-active');
            currentStep.classList.add('step');
            
            var previousStep = document.getElementById('step-' + step);
            if (previousStep) {
                previousStep.classList.add('step-active');
                previousStep.classList.remove('step');
            }
        }
    </script>
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

    // // js for tipe peserta
    // const jenisPendaftaranSelect = document.getElementById('jenis_pendaftaran');
    // const jumlahPesertaContainer = document.getElementById('jumlah_peserta_container');
    // const jumlahAnggotaTimContainer = document.getElementById('jumlah_anggota_tim_container');

    // jenisPendaftaranSelect.addEventListener('change', function() {
    //     if (this.value === 'Individu') {
    //         jumlahPesertaContainer.style.display = 'block';
    //         jumlahAnggotaTimContainer.style.display = 'none';
    //     } else {
    //         jumlahPesertaContainer.style.display = 'block';
    //         jumlahAnggotaTimContainer.style.display = 'block';
    //     }
    // });

    // js for form deskripsi
    $(document).ready(function() {
        $('.summernote').summernote();
    });
</script>
</body>
</html>
