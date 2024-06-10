<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>GASLogin</title>
    <link
      rel="shortcut icon"
      href="./assets/images/fav.png"
      type="image/svg+xml"
    />
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/style-wild.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/style_tournament.css')}}" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500;600;700&family=Poppins:wght@400;500;700&display=swap"
      rel="stylesheet"
    />
    <!-- Page-Revealer -->
    <link rel="stylesheet" href="{{asset('assetsmigrate/css/main.css')}}" />
    <script src="{{asset('assetsmigrate/js/tg-page-head.js')}}"></script>
  </head>

  <body id="top">

    @extends('spatial.navbar')
    
    <main>
      <article>
        <!-- 
        - #About
      -->

        <div class="section-wrapper">
          <section class="about" id="about">
            <div class="container">
              <figure class="about-banner">
                <img
                  src="./assets/images/team-logo-1.png"
                  alt="M shape"
                  class="about-img"
                />

                <img
                  src="./assets/images/team-logo-2.png"
                  alt="Game character"
                  class="character character-1"
                />

                <img
                  src="./assets/images/team-logo-3.png"
                  alt="Game character"
                  class="character character-5"
                />

                <img
                  src="./assets/images/team-logo-4.png"
                  alt="Game character"
                  class="character character-3"
                />
                <img
                  src="./assets/images/team-logo-5.png"
                  alt="Game character"
                  class="character character-4"
                />
              </figure>

              <div class="about-content">
                <p class="about-subtitle">Cari Lawan Untuk Teammu!</p>

                <h2 class="about-title">
                  Tantangan selalu <strong>menanti</strong>
                </h2>

                <p class="about-text">
                  Sambutlah Era Baru Gaming dengan GAS Login. Kami hadir untuk
                  membawa permainan Anda ke level berikutnya. Dapatkan akses
                  eksklusif ke layanan pembuatan turnamen kami yang inovatif.
                </p>

                <p class="about-bottom-text">
                  <ion-icon name="arrow-forward-circle-outline"></ion-icon>

                  <a href="tournament.html"
                    ><span>Tingkatkan Pengalaman Gaming Anda Sekarang!</span></a
                  >
                </p>
              </div>
            </div>
          </section>

          <!-- 
          - #PARTNER
        -->

        <section class="section partner">
          <div class="container">
            <a href="#" class="partner-logo">
              <img
                src="./assets/images/partner-1.png"
                width="157"
                height="55"
                loading="lazy"
                alt="Children Fund"
                class="gray"
              />

              <img
                src="./assets/images/partner-1-active.png"
                width="157"
                height="55"
                loading="lazy"
                alt="Children Fund"
                class="color"
              />
            </a>

            <a href="#" class="partner-logo">
              <img
                src="./assets/images/partner-2.png"
                width="163"
                height="55"
                loading="lazy"
                alt="Non Profit Agency"
                class="gray"
              />

              <img
                src="./assets/images/partner-2-active.png"
                width="163"
                height="55"
                loading="lazy"
                alt="Non Profit Agency"
                class="color"
              />
            </a>

            <a href="#" class="partner-logo">
              <img
                src="./assets/images/partner-3.png"
                width="149"
                height="55"
                loading="lazy"
                alt="Rise Hand Help Us"
                class="gray"
              />

              <img
                src="./assets/images/partner-3-active.png"
                width="149"
                height="55"
                loading="lazy"
                alt="Rise Hand Help Us"
                class="color"
              />
            </a>

            <a href="#" class="partner-logo">
              <img
                src="./assets/images/partner-4.png"
                width="169"
                height="58"
                loading="lazy"
                alt="Helping"
                class="gray"
              />

              <img
                src="./assets/images/partner-4-active.png"
                width="169"
                height="58"
                loading="lazy"
                alt="Helping"
                class="color"
              />
            </a>

            <a href="#" class="partner-logo">
              <img
                src="./assets/images/partner-5.png"
                width="211"
                height="55"
                loading="lazy"
                alt="Poor Fund Organization"
                class="gray"
              />

              <img
                src="./assets/images/partner-5-active.png"
                width="211"
                height="55"
                loading="lazy"
                alt="Poor Fund Organization"
                class="color"
              />
            </a>
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
        


        {{-- <section class="tournament__list-area section-pb-120 section-pt-120" data-background="assets/img/bg/tournament_bg.jpg">
          <div class="container">
              <div class="tournament__wrapper">
                  <div class="row align-items-end mb-60">
                      <div class="col-lg-8">
                          <div class="section__title text-center text-lg-start title-shape-none">
                              <span class="sub-title tg__animate-text">tournament List</span>
                              <h3 class="title">Active tournament</h3>
                          </div>
                      </div>
                      
                  </div>
                  <div class="row">
                      <div class="col-12">
                          <div class="tournament__list-item-wrapper">
                              <div class="tournament__list-item wow fadeInUp" data-wow-delay=".2s">
                                  <svg xmlns="http://www.w3.org/2000/svg" width="1116.562" height="163.37" viewBox="0 0 1116.562 163.37">
                                      <path class="background-path" d="M708,1784l28-27s4.11-5.76,18-6,702-1,702-1a37.989,37.989,0,0,1,16,9c7.47,7.08,37,33,37,33s9.02,9.47,9,18,0,42,0,42-0.19,9.43-11,19-32,30-32,30-5.53,11.76-21,12-985,0-985,0a42.511,42.511,0,0,1-26-13c-11.433-12.14-34-32-34-32s-6.29-5.01-7-17,0-43,0-43-1-5.42,12-18,34-32,34-32,10.4-8.28,19-8,76,0,76,0a44.661,44.661,0,0,1,21,11c9.268,8.95,22,22,22,22Z" transform="translate(-401.563 -1749.875)" />
                                  </svg>
                                  <div class="tournament__list-content">
                                      <div class="tournament__list-thumb">
                                          <a href="tournament-details.html"><img src="assets/img/others/tournament_thumb01.png" alt="thumb"></a>
                                      </div>
                                      <div class="tournament__list-name">
                                          <h5 class="team-name">FoxTie Max</h5>
                                          <span class="status">Online</span>
                                      </div>
                                      <div class="tournament__list-prize">
                                          <h6 class="title">Prize</h6>
                                          <i class="fas fa-trophy"></i>
                                          <span>$75000</span>
                                      </div>
                                      <div class="tournament__list-time">
                                          <h6 class="title">Time</h6>
                                          <i class="fas fa-clock"></i>
                                          <span>10h : 15m</span>
                                      </div>
                                      <div class="tournament__list-live">
                                          <a href="https://www.twitch.tv/videos/1726788358" target="_blank">Live now <i class="far fa-play-circle"></i></a>
                                      </div>
                                  </div>
                              </div>
                              <div class="tournament__list-item wow fadeInUp" data-wow-delay=".4s">
                                  <svg xmlns="http://www.w3.org/2000/svg" width="1116.562" height="163.37" viewBox="0 0 1116.562 163.37">
                                      <path class="background-path" d="M708,1784l28-27s4.11-5.76,18-6,702-1,702-1a37.989,37.989,0,0,1,16,9c7.47,7.08,37,33,37,33s9.02,9.47,9,18,0,42,0,42-0.19,9.43-11,19-32,30-32,30-5.53,11.76-21,12-985,0-985,0a42.511,42.511,0,0,1-26-13c-11.433-12.14-34-32-34-32s-6.29-5.01-7-17,0-43,0-43-1-5.42,12-18,34-32,34-32,10.4-8.28,19-8,76,0,76,0a44.661,44.661,0,0,1,21,11c9.268,8.95,22,22,22,22Z" transform="translate(-401.563 -1749.875)" />
                                  </svg>
                                  <div class="tournament__list-content">
                                      <div class="tournament__list-thumb">
                                          <a href="tournament-details.html"><img src="assets/img/others/tournament_thumb02.png" alt="thumb"></a>
                                      </div>
                                      <div class="tournament__list-name">
                                          <h5 class="team-name">Hatlax TM.</h5>
                                          <span class="status">Online</span>
                                      </div>
                                      <div class="tournament__list-prize">
                                          <h6 class="title">Prize</h6>
                                          <i class="fas fa-trophy"></i>
                                          <span>$85000</span>
                                      </div>
                                      <div class="tournament__list-time">
                                          <h6 class="title">Time</h6>
                                          <i class="fas fa-clock"></i>
                                          <span>12h : 10m</span>
                                      </div>
                                      <div class="tournament__list-live">
                                          <a href="https://www.twitch.tv/videos/1726788358" target="_blank">Live now <i class="far fa-play-circle"></i></a>
                                      </div>
                                  </div>
                              </div>
                              <div class="tournament__list-item wow fadeInUp" data-wow-delay=".6s">
                                  <svg xmlns="http://www.w3.org/2000/svg" width="1116.562" height="163.37" viewBox="0 0 1116.562 163.37">
                                      <path class="background-path" d="M708,1784l28-27s4.11-5.76,18-6,702-1,702-1a37.989,37.989,0,0,1,16,9c7.47,7.08,37,33,37,33s9.02,9.47,9,18,0,42,0,42-0.19,9.43-11,19-32,30-32,30-5.53,11.76-21,12-985,0-985,0a42.511,42.511,0,0,1-26-13c-11.433-12.14-34-32-34-32s-6.29-5.01-7-17,0-43,0-43-1-5.42,12-18,34-32,34-32,10.4-8.28,19-8,76,0,76,0a44.661,44.661,0,0,1,21,11c9.268,8.95,22,22,22,22Z" transform="translate(-401.563 -1749.875)" />
                                  </svg>
                                  <div class="tournament__list-content">
                                      <div class="tournament__list-thumb">
                                          <a href="tournament-details.html"><img src="assets/img/others/tournament_thumb03.png" alt="thumb"></a>
                                      </div>
                                      <div class="tournament__list-name">
                                          <h5 class="team-name">Spartan iv</h5>
                                          <span class="status">Online</span>
                                      </div>
                                      <div class="tournament__list-prize">
                                          <h6 class="title">Prize</h6>
                                          <i class="fas fa-trophy"></i>
                                          <span>$45000</span>
                                      </div>
                                      <div class="tournament__list-time">
                                          <h6 class="title">Time</h6>
                                          <i class="fas fa-clock"></i>
                                          <span>10h : 15m</span>
                                      </div>
                                      <div class="tournament__list-live">
                                          <a href="https://www.twitch.tv/videos/1726788358" target="_blank">Live now <i class="far fa-play-circle"></i></a>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </section> --}}

      
    @extends('spatial.footer')


    <script src="{{asset('assets/js/script.js')}}"></script>
    <script src="{{asset('assets/js/script_tournament.js')}}"></script>
    
    <script>
      @if($message = Session::get('success'))
      Swal.fire({
      icon: "success",
      title: "Berhasil",
      text: "{{$message}}",
    });
    @endif
    </script>
  </body>
</html>
