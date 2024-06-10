<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>GASLogin - About</title>
    <link
      rel="shortcut icon"
      href="./assets/images/fav.png"
      type="image/svg+xml"
    />
    <link rel="stylesheet" href="{{ asset('assets/css/style_about.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css')}}">
    <script src="{{ asset('assets/js/script_tournament.js')}}"></script>
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
      <section class="about-head">
        <div id="about-first">
          <div id="about-text">
            <h1>ABOUT US</h1>
            <p>
              GAS Login adalah sebuah platform yang memungkinkan pengguna untuk
              membuat dan mengikuti turnamen esports secara mudah dan
              menyenangkan. Kami menyediakan berbagai fitur yang memungkinkan
              para gamer untuk mengatur kompetisi sesuai keinginan mereka dan
              bergabung dalam turnamen dari berbagai game populer.
            </p>
          </div>
        </div>
      </section>
      <section class="about-goal">
        <div id="about-content">
          <div id="about-text">
            <div class="about-container">
              <div class="visi">
                <h2>VISI</h2>
                <p>
                  Visi kami adalah untuk menjadi pusat utama bagi komunitas
                  esports lokal, di mana para gamer dapat menemukan dan
                  berpartisipasi dalam berbagai turnamen yang menarik dan
                  kompetitif.
                </p>
              </div>
              <div class="misi">
                <h2>MISI</h2>
                <p>
                  Misi kami adalah untuk menyediakan platform yang mudah
                  digunakan, aman, dan adil bagi semua kalangan, serta untuk
                  terus mendorong pertumbuhan dan pengembangan komunitas
                  esports.
                </p>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="about-box">
        <div id="about-content">
          <div id="about-text">
            <h2>
              Explore Powerful Features for Creating and Joining Esports
              Tournaments
            </h2>
          </div>
        </div>
        <div class="about-container">
          <div id="about-feature">
            <div id="about-feature-header">
              <ion-icon name="trophy"></ion-icon>
            </div>
            <div id="about-feature-body">
              <h3>Pembuatan Turnamen</h3>
              <p>
                Pengguna dapat dengan mudah membuat turnamen mereka sendiri
                dengan berbagai opsi pengaturan.
              </p>
            </div>
          </div>
          <div id="about-feature">
            <div id="about-feature-header">
              <ion-icon name="people"></ion-icon>
            </div>
            <div id="about-feature-body">
              <h3>Pendaftaran Turnamen</h3>
              <p>
                Para gamer dapat mendaftar untuk berbagai turnamen yang tersedia
                dalam berbagai game.
              </p>
            </div>
          </div>
          <div id="about-feature">
            <div id="about-feature-header">
              <ion-icon name="calendar"></ion-icon>
            </div>
            <div id="about-feature-body">
              <h3>Manajemen Turnamen</h3>
              <p>
                Sistem manajemen turnamen yang canggih memudahkan pengguna dalam
                mengatur dan mengelola kompetisi.
              </p>
            </div>
          </div>
          <div id="about-feature">
            <div id="about-feature-header">
              <ion-icon name="help-circle-outline"></ion-icon>
            </div>
            <div id="about-feature-body">
              <h3>Coming soon..</h3>
              <p>???</p>
            </div>
          </div>
        </div>
      </section>
    </main>

    @extends('spatial.footer')
    <!-- 
    - #GO TO TOP
  -->

    <a href="#top" class="btn btn-primary go-top" data-go-top>
      <ion-icon name="chevron-up-outline"></ion-icon>
    </a>
    {{-- <script src="./assets/js/script.js"></script> --}}

  </body>
</html>