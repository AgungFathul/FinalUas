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
    <link rel="stylesheet" href="{{asset('assets/css/style_about.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}" />
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
      <section class="about-team">
        <div id="about-content">
          <div id="about-text">
            <h2>Lets Meet Our Teams</h2>
            <p>
              Di sini kami memperkenalkan tim kami yang berdedikasi dan
              bersemangat.
            </p>
          </div>
        </div>
        <div class="about-container">
          <div id="about-profile">
            <div id="about-profile-header">
              <img src="assets/images/dev-img/member-team1.jpg" />
            </div>
            <div id="about-profile-body">
              <h2>Agung Fathul Muhtadin</h2>
              <p>Leader</p>
              <div class="about-social-media">
                <a href="https://www.facebook.com">
                  <ion-icon name="logo-facebook"></ion-icon>
                </a>
                <a href="https://www.instagram.com">
                  <ion-icon name="logo-instagram"></ion-icon>
                </a>
                <a href="https://www.linkedin.com">
                  <ion-icon name="logo-linkedin"></ion-icon>
                </a>
                <a href="https://github.com/AgungFathul01">
                  <ion-icon name="logo-github"></ion-icon>
                </a>
              </div>
            </div>
          </div>
          <div id="about-profile">
            <div id="about-profile-header">
              <img src="assets/images/dev-img/member-team2.jpg" />
            </div>
            <div id="about-profile-body">
              <h2>Davin Ghani Ananta Kusuma</h2>
              <p>Member</p>
              <div class="about-social-media">
                <a href="https://www.facebook.com">
                  <ion-icon name="logo-facebook"></ion-icon>
                </a>
                <a href="https://www.instagram.com">
                  <ion-icon name="logo-instagram"></ion-icon>
                </a>
                <a href="https://www.linkedin.com">
                  <ion-icon name="logo-linkedin"></ion-icon>
                </a>
                <a href="https://github.com/DavinGhani">
                  <ion-icon name="logo-github"></ion-icon>
                </a>
              </div>
            </div>
          </div>
          <div id="about-profile">
            <div id="about-profile-header">
              <img src="assets/images/dev-img/member-team3.jpg" />
            </div>
            <div id="about-profile-body">
              <h2>Raka Indra Rahmawan</h2>
              <p>Member</p>
              <div class="about-social-media">
                <a href="https://www.facebook.com">
                  <ion-icon name="logo-facebook"></ion-icon>
                </a>
                <a href="https://www.instagram.com/indra_rahmaone/">
                  <ion-icon name="logo-instagram"></ion-icon>
                </a>
                <a href="https://www.linkedin.com">
                  <ion-icon name="logo-linkedin"></ion-icon>
                </a>
                <a href="https://github.com/Rahmaone">
                  <ion-icon name="logo-github"></ion-icon>
                </a>
              </div>
            </div>
          </div>
          <div id="about-profile">
            <div id="about-profile-header">
              <img src="assets/images/dev-img/member-team4.jpg" />
            </div>
            <div id="about-profile-body">
              <h2>Rizka Alfadilla</h2>
              <p>Member</p>
              <div class="about-social-media">
                <a href="https://www.facebook.com">
                  <ion-icon name="logo-facebook"></ion-icon>
                </a>
                <a href="https://www.instagram.com">
                  <ion-icon name="logo-instagram"></ion-icon>
                </a>
                <a href="https://www.linkedin.com">
                  <ion-icon name="logo-linkedin"></ion-icon>
                </a>
                <a href="https://github.com/YeeIsRizka">
                  <ion-icon name="logo-github"></ion-icon>
                </a>
              </div>
            </div>
          </div>
          <div id="about-profile">
            <div id="about-profile-header">
              <img src="assets/images/dev-img/member-team5.jpg" />
            </div>
            <div id="about-profile-body">
              <h2>Zidan Dwi Permana</h2>
              <p>Member</p>
              <div class="about-social-media">
                <a href="https://www.facebook.com">
                  <ion-icon name="logo-facebook"></ion-icon>
                </a>
                <a href="https://www.instagram.com">
                  <ion-icon name="logo-instagram"></ion-icon>
                </a>
                <a href="https://www.linkedin.com">
                  <ion-icon name="logo-linkedin"></ion-icon>
                </a>
                <a href="https://github.com/zidandp">
                  <ion-icon name="logo-github"></ion-icon>
                </a>
              </div>
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
    {{-- <script src="{{asset('assets/js/script.js')}}"></script> --}}

  </body>
</html>
