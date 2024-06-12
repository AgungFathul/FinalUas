<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('assets/css/style_detailTournament.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500;600;700&family=Poppins:wght@400;500;700&display=swap"
        rel="stylesheet" />
    <link rel="shortcut icon" href="{{ asset('assets/images/fav.png') }}" type="image/svg+xml" />
    <title>GASLogin - Detail Tournament</title>
    <link rel="shortcut icon" href="./assets/images/fav.png" type="image/svg+xml" />
    <!-- Page-Revealer -->
    <link rel="stylesheet" href="{{ asset('assetsmigrate/css/main.css') }}" />
    <script src="{{ asset('assetsmigrate/js/tg-page-head.js') }}"></script>
    <style>
        .reg-button:disabled {
            background-color: #cccccc;
            /* Gray background for disabled button */
            cursor: not-allowed;
            /* Change cursor to indicate button is not clickable */
        }
    </style>
</head>

<body>
    @extends('spatial.navbar')

    <!--
    - MAIN  SECTION
   -->
    <main>

        <div class="modal" id="regist-tour">
            <div class="modal-content">
                <span class="close-button">&times;</span>
                <h2>JOIN TOURNAMENT</h2>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('tournamentregister') }}" method="POST">
                    @csrf
                    <input type="hidden" name="tournament_id" value="{{ $tournament->id }}">
                    <!-- Form fields for registration -->
                    <label for="team-name">Name of team</label>
                    <input type="text" id="team-name" name="team_name" required />

                    <div class="captain-info">
                        <p>Captain</p>
                        <small>Note: Username and ID should match with your account</small>
                        <div class="capt-card">
                            <div class="capt-uname">
                                <label for="captain-name">Username</label>
                                <input type="text" id="captain-name" name="captain_name" required />
                            </div>
                            <div class="capt-id">
                                <label for="game-id">Game ID - Server</label>
                                <input type="text" id="game-id" name="captain_game_id" required />
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="submit-button">Register</button>
                </form>
            </div>
        </div>


        <div class="tour-card">
            <div class="tour-bg" data-tournament-id="1"
                style="background: url('{{ asset('assets/images/ml.jpg') }}') no-repeat center center; background-size: cover;">
            </div>
            <div class="tour-info-container">
                <div class="tour-information">
                    @php
                        use App\Models\Tournament;
                        use App\Models\Game;
                        use App\Models\registrationSetting;
                        use App\Models\Team;
                        $game = Game::find($tournament->game_id);
                        $tournament = Tournament::find($tournament->id);
                        $teams = Team::where('tournament_id', $tournament->id)->get();
                        $standingsArray = DB::select('CALL GetStandingsRanking(?)', [$tournament->id]);
                        $standings = collect($standingsArray);
                        $registration = RegistrationSetting::where('tournament_id', $tournament->id)->first();
                        $slotTersisa = $registration->slot_tersisa; // Assuming this is how you get the slot_tersisa value
                        $remainingSlots = $registration->jumlah_anggota_tim - $teams->count();
                    @endphp
                    <h1>{{ $tournament->nama }}</h1>
                    <h4>{{ $tournament->tipe }}</h4>
                    <ul>
                        <li>
                            <ion-icon name="calendar" class="icon"></ion-icon>Berlangsung:
                            {{ $tournament->jadwal_mulai }}
                        </li>
                        <li>
                            <ion-icon name="alarm" class="icon"></ion-icon>Selesai:
                            {{ $tournament->jadwal_selesai }}
                        </li>
                        <li>
                            <ion-icon name="people-circle" class="icon"></ion-icon>Individu: {{ $tournament->tipe }}
                        </li>
                        <li><ion-icon name="pricetags" class="icon"></ion-icon>Tiket: {{ $tournament->fee }}</li>
                        <li>
                            <ion-icon name="location" class="icon"></ion-icon>
                            {{ $tournament->tipe }}
                        </li>
                    </ul>
                </div>
                <div class="reg-tour">
                    <!-- Button trigger popup -->
                    <button class="reg-button" data-target="#regist-tour"
                        {{ $slotTersisa == 0 ? 'disabled' : '' }}>DAFTAR</button>
                    <p>Slot Tersisa: {{ $remainingSlots }}</p>
                </div>
            </div>
        </div>

        <!-- TABS -->
        <div class="tab-container">
            <div class="tab-box">
                <div class="tab-btns">
                    <button class="tab-btn active" data-target="#overview">
                        OVERVIEW
                    </button>

                    <button class="tab-btn" data-target="#bracket">BRACKET</button>

                    <button class="tab-btn" data-target="#live">LIVE</button>

                    <button class="tab-btn" data-target="#standings">STANDINGS</button>
                </div>

                <!--
            ISIAN TAB
           -->
                <div class="content-box">
                    <!-- OVERVIEW -->
                    <div class="content active" id="overview">
                        <div class="overview-box">
                            <div class="box-1">
                                <h2>Descriptions</h2>
                                <div class="desc-overview">
                                    <span>
                                        Tempat pertarungan para bintang, di mana legenda dibentuk
                                        dan juara terlahir.
                                    </span>
                                    <div class="desc-tournament" style="width: 100%;">
                                        <p>
                                            {!! $tournament->deskripsi !!}
                                            <br />
                                            <br />
                                            CP: @esports_upicibiru (instagram)
                                        </p>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="box-small">

                                        <div class="overview-icon">
                                            <img src="{{ asset('storage/photo-game/' . $game->photo) }}"
                                                alt="logo ml" />
                                        </div>
                                        <span class="desc-1">Game</span>
                                        <span class="desc-2">{{ $game->judul }}</span>
                                    </div>
                                    <div class="box-small">
                                        <div class="overview-icon">
                                            <ion-icon name="desktop-outline"></ion-icon>
                                        </div>
                                        <span class="desc-1">Platform</span>
                                        <span class="desc-2">{{ $game->platform }}</span>
                                    </div>
                                    <div class="box-small">
                                        <div class="overview-icon">
                                            <ion-icon name="people"></ion-icon>
                                        </div>
                                        <span class="desc-1">Teams</span>
                                        <span class="desc-2">{{ $registration->jumlah_anggota_tim }}</span>
                                    </div>
                                    <div class="box-small">
                                        <div class="overview-icon">
                                            <ion-icon name="diamond"></ion-icon>
                                        </div>
                                        <span class="desc-1">Prizes</span>
                                        <span class="desc-2">{{ $tournament->prize }}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="box-2">
                                <div class="box-fill">
                                    <div class="box-large">
                                        <h2>Location</h2>
                                        <div class="desc-location">
                                            <div class="loct">
                                                <ion-icon name="location" class="icon"></ion-icon>
                                                <p>{{ $tournament->alamat }}</p>
                                                </a>
                                            </div>
                                            <span>Detail location</span>
                                            <p>
                                            </p>
                                        </div>
                                        <iframe class="iframe-map"
                                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.5873234054766!2d107.72293907373137!3d-6.9398229679324155!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68c323777ca3a1%3A0x355eff6734ed9167!2sUniversitas%20Pendidikan%20Indonesia%20-%20Kampus%20UPI%20Cibiru!5e0!3m2!1sen!2sid!4v1713593733087!5m2!1sen!2sid"
                                            style="border:0;" allowfullscreen="" loading="lazy"
                                            referrerpolicy="no-referrer-when-downgrade">
                                        </iframe>
                                    </div>
                                </div>

                                <div class="box-fill">
                                    <div class="box-large">
                                        <h2>Requirements</h2>
                                        <div class="desc-location">
                                            <div class="loct">
                                                <ion-icon name="pricetag" class="icon"></ion-icon></ion-icon>
                                                <p>Rp. {{ $tournament->fee }}</p>
                                            </div>
                                            <div class="loct">
                                                <ion-icon name="alert-circle" class="icon"></ion-icon>
                                                <p>{{ $registration->jenis }}</p>
                                            </div>
                                            <span>Format</span>
                                            <p>{{ $tournament->format }}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="box-fill">
                                    <div class="box-large">
                                        <h2>Winner</h2>
                                        <table class="winner">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Team</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($standings->take(3) as $standing)
                                                    <tr>
                                                        <td>{{ $standing->ranking }}</td>
                                                        <td>{{ $standing->team_name }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- BRACKET -->
                    <div class="content" id="bracket">
                        <h2>Bracket</h2>

                    </div>

                    <!-- LIVE -->
                    <div class="content" id="live">
                        <h2>Live</h2>
                        <iframe class="iframe-live" width="560" height="315" src="{{ $tournament->url_live }}"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                    </div>

                    <!-- STANDING -->
                    <div class="content" id="standings">
                        <h2>Standings</h2>
                        <div class="detail-standings">
                            <table class="standings">
                                <thead>
                                    <tr>
                                        <th rowspan="2">Rank</th>
                                        <th rowspan="2">Team</th>
                                        <th colspan="2">Matches</th>
                                        <th rowspan="2">WR</th>
                                    </tr>
                                    <tr>
                                        <th>Win</th>
                                        <th>Lose</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($standings as $standing)
                                        <tr>
                                            <td>{{ $standing->ranking }}</td>
                                            <td>{{ $standing->team_name }}</td>
                                            <td>{{ $standing->win }}</td>
                                            <td>{{ $standing->lose }}</td>
                                            <td>{{ $standing->wr }}%</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    @extends('spatial.footer')

    {{-- <script src="{{asset('assets/js/script.js')}}"></script>
    <script src="{{asset('assets/js/script_detailTournament.js')}}"></script> --}}

</body>

</html>
