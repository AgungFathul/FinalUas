<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>GASLogin - Tournament</title>
    <link
      rel="shortcut icon"
      href="./assets/images/fav.png"
      type="image/svg+xml"
    />
    <link rel="stylesheet" href="{{asset('assets/css/style_tournament.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500;600;700&family=Poppins:wght@400;500;700&display=swap"
      rel="stylesheet"
    />
    <script src="{{asset('assets/js/script_tournament.js')}}"></script>
    <script src="{{asset('assets/js/script_tournament.js')}}"></script>
    <style>
      /* Styles for the modal */
      .modal {
          display: none; 
          position: fixed; 
          z-index: 1; 
          padding-top: 100px; 
          left: 0;
          top: 0;
          width: 100%; 
          height: 100%; 
          overflow: auto; 
          background-color: rgb(0,0,0); 
          background-color: rgba(0,0,0,0.4); 
      }

      .modal-content {
          background-color: #fefefe;
          margin: auto;
          padding: 20px;
          border: 1px solid #888;
          width: 80%;
      }

      .close {
          color: #aaa;
          float: right;
          font-size: 28px;
          font-weight: bold;
      }

      .close:hover,
      .close:focus {
          color: black;
          text-decoration: none;
          cursor: pointer;
      }

      .btn-primary {
          background-color: hsl(31, 100%, 51%);
          color: white;
          border: none;
          padding: 10px 20px;
          cursor: pointer;
      }

      .btn-primary:hover {
          background-color: hsl(31, 100%, 45%);
      }
  </style>
  </head>
  <body>
    @extends('spatial.navbar')
    <main>
      <!-- Homepage -->
      <section class="homepage" id="home" style=" background: url('{{ asset('assets/images/ml.jpg') }}') no-repeat center center; background-size: cover;">
        <div class="content">
          <div class="text">
              <h1>Join the Champion's Arena</h1>
              <p>
                  Platform terdepan untuk turnamen game yang menghubungkan pemain dari seluruh dunia. <br />
                  Daftarkan timmu, ikuti pertandingan, dan rebutlah tahta juara!
              </p>
          </div>
          
          @guest
          <button class="btn-primary" id="createTournamentBtn">
              Create Tournament
          </button>
          @endguest
  
          @auth
          <a href="{{ route('createtourfe') }}" class="btn-primary">Create Tournament</a>
          @endauth
      </div>
  
      <!-- Modal -->
      <div id="loginModal" class="modal">
          <div class="modal-content">
              <span class="close">&times;</span>
              <h1>Login</h1>
              <p>Jika kamu ingin membuat turnamen, silakan login terlebih dahulu</p>
              <a href="{{ route('guest.login') }}" class="btn-primary" style="margin-top: 10px;">Log in</a>
          </div>
      </div>
      </section>

      <!-- Tournament -->
      <section class="list_tournament">
        <div class="text_tournament">
          <h2>Turnamen Game</h2>
        </div>
        <section class="list_tournament">

          <!-- Carousel Section -->
          <div class="carousel">
            <div class="carousel-images">
              @php
              $games = App\Models\Game::all();
              @endphp
              @foreach ($games as $game)
              <div class="carousel-image">
                <img src="{{ asset('storage/photo-game/' . $game->photo) }}" alt="1" />
                <div class="image-title">{{ $game->judul }}</div>
              </div>
              @endforeach
            </div>
            <button class="prev" aria-label="Previous">&#10094;</button>
            <button class="next" aria-label="Next">&#10095;</button>
          </div>
        </section>
      </section>
        

      <!-- Event -->
      <div class="filter-section">
        <select id="eventFilter" class="event-dropdown">
            <option value="all">Semua</option>
            <option value="upcoming">Mendatang</option>
            <option value="ongoing">Berlangsung</option>
            <option value="completed">Selesai</option>
        </select>
    </div>
    

        <!-- Card Event -->
        <div class="card-container">
          @php
          $tournaments = App\Models\Tournament::with('game')->get();
          @endphp
          
          @foreach($tournaments as $tournament)
          <a href="{{ route('detailtour', ['id' => $tournament->id]) }}">
              <div class="card" data-status="upcoming">
                  <div class="card-header">
                      @if($tournament->game)
                          <img src="{{ asset('storage/photo-game/' . $tournament->game->photo) }}" alt="Upcoming Event" />
                      @else
                          <img src="{{ asset('storage/photo-game/default.jpg') }}" alt="Upcoming Event" />
                      @endif
                      <span class="status status-upcoming">Mendatang</span>
                  </div>
                  <div class="card-body">
                      <h3 class="tournament-name">{{ $tournament->nama }}</h3>
                      <p class="tournament-detail">Mulai: {{ \Carbon\Carbon::parse($tournament->jadwal_mulai)->format('d M Y') }}</p>
                  </div>
              </div>
          </a>
          @endforeach
          
        </div>
      </section>
    </main>

    @extends('spatial.footer')
  
  </body>
  <script>
    // Get the modal
    var modal = document.getElementById("loginModal");

    // Get the button that opens the modal
    var btn = document.getElementById("createTournamentBtn");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal 
    btn.onclick = function() {
        modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>
  {{-- <script src="{{asset('assets/js/script.js')}}"></script>
  <script
    type="module"
    src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"
  ></script>
  <script
    nomodule
    src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"
  ></script> --}}
</html>
