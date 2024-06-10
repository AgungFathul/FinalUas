<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{asset('assets/css/style_detailTournament.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500;600;700&family=Poppins:wght@400;500;700&display=swap"
      rel="stylesheet"
    />
    <title>GASLogin - Detail Tournament</title>
    <link
      rel="shortcut icon"
      href="./assets/images/fav.png"
      type="image/svg+xml"
    />
    <!-- Page-Revealer -->
    <link rel="stylesheet" href="{{asset('assetsmigrate/css/main.css')}}" />
    <script src="{{asset('assetsmigrate/js/tg-page-head.js')}}"></script>
  </head>

  <body>
    @extends('spatial.navbar')

  <!-- 
    - MAIN  SECTION 
   -->
    <main>

      <!-- 
        POP UP DAFTAR TOUR
       -->
      <div class="modal" id="regist-tour">
        <div class="modal-content">
          <span class="close-button">&times;</span>
          <h2>JOIN TOURNAMENT</h2>
          <form>

            <!-- Form fields untuk pendaftaran -->
            <label for="team-name">Name of team</label>
            <input type="text" id="team-name" required />
            <div class="captain-info">
              <p>Captain</p>
              <small>Note: Game ID should be in format "12345678 - 1234"</small>
              <div class="capt-card">
                <div class="capt-uname">
                  <label for="captain-name">Username</label>
                  <input type="text" id="captain-name" required />
                </div>
                <div class="capt-id">
                  <label for="game-id">Game ID - Server</label>
                <input type="text" id="game-id" required />
                </div>
              </div>
            </div>
            
            <div class="reg-member-card">
              <div class="reg-member-info">
                <p>Member 1</p>
                <label for="member-name">Username</label>
                <input type="text" id="member-name" />
                <label for="game-id">Game ID - Server</label>
                <input type="text" id="game-id" />
              </div>
              <div class="reg-member-info">
                <p>Member 2</p>
                <label for="member-name">Username</label>
                <input type="text" id="member-name"  />
                <label for="game-id">Game ID - Server</label>
                <input type="text" id="game-id" />
              </div>
              <div class="reg-member-info">
                <p>Member 3</p>
                <label for="member-name">Username</label>
                <input type="text" id="member-name"  />
                <label for="game-id">Game ID - Server</label>
                <input type="text" id="game-id"  />
              </div>
              <div class="reg-member-info">
                <p>Member 4</p>
                <label for="member-name">Username</label>
                <input type="text" id="member-name"  />
                <label for="game-id">Game ID - Server</label>
                <input type="text" id="game-id" />
              </div>
            </div>
            <center>
              <p>Donation(optional)</p>
            <img src="./assets/images/qr.png" alt="" style="align-items: center;" width="150px" height="150px"></center>
            <button type="submit" class="submit-button">Daftar</button>
          </form>
        </div>
      </div>

      <!--  Awal Card Tour -->
      <div class="tour-card">
        <div class="tour-bg" data-tournament-id="T3"></div>
        <div class="tour-info-container">
          <div class="tour-information">
            <h1>Turnamen DONASI UNTUK ANAK YATIM</h1>
            <h4>Organized by Rizka</h4>
            <ul>
              <li>
                <ion-icon name="calendar" class="icon"></ion-icon>19 - 21 April 2024
              </li>
              <li>
                <ion-icon name="alarm" class="icon"></ion-icon> 20:00 WIB - Selesai
              </li>
              <li>
                <ion-icon name="people-circle" class="icon"></ion-icon> 32 Teams
              </li>
              <li><ion-icon name="pricetags" class="icon"></ion-icon>PAID</li>
              <li>
                <ion-icon name="location" class="icon"></ion-icon>
                Online
              </li>
            </ul>
          </div>
          <div class="reg-tour">
            <!-- Button trigger popup -->
            <button class="reg-button" data-target="#regist-tour">DAFTAR</button>
            <p>(OPEN) 0/32 TEAMS REGISTED</p>
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
                      Pembayaran bisa melalui transfer ke :
                    </span>
                    <p>
                      1. BCA : 98765312 a/n Bjorka </br>
                      2. Dana/OVO/Gopay : 08123456789 a/n Anonymus </br>
                      *Bukti transfer harap dikirimkan ke Contact Person yang telah tersedia</br>
                      <br />
                      <br />
                      CP: @meister.esports (instagram)
                    </p>
                  </div>
                  <div class="row">
                    <div class="box-small">
                      <div class="overview-icon">
                        <img
                          src="/GasLogin/assets/images/icon-valo.jpg"
                          alt="logo valo"
                        />
                      </div>
                      <span class="desc-1">Game</span>
                      <span class="desc-2">Valorant</span>
                    </div>
                    <div class="box-small">
                      <div class="overview-icon">
                        <ion-icon name="desktop-outline"></ion-icon>
                      </div>
                      <span class="desc-1">Platform</span>
                      <span class="desc-2">PC </span>
                    </div>
                    <div class="box-small">
                      <div class="overview-icon">
                        <ion-icon name="people"></ion-icon>
                      </div>
                      <span class="desc-1">Teams</span>
                      <span class="desc-2">0/32</span>
                    </div>
                    <div class="box-small">
                      <div class="overview-icon">
                        <ion-icon name="diamond"></ion-icon>
                      </div>
                      <span class="desc-1">Prizes</span>
                      <span class="desc-2">IDR 650.000</span>
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
                          <a href="https://g.co/kgs/E3pj652">
                            <p>Online</p>
                          </a>
                        </div>
                        <span>Detail location</span>
                        <p>
                          -
                        </p>
                      </div>
                    </div>
                  </div>

                  <div class="box-fill">
                    <div class="box-large">
                      <h2>Requirements</h2>
                      <div class="desc-location">
                        <div class="loct">
                          <ion-icon name="pricetag" class="icon"></ion-icon></ion-icon>
                            <p>Rp. 25.000,- (/Team)</p>
                        </div>
                        <div class="loct">
                          <ion-icon name="alert-circle" class="icon"></ion-icon>
                            <p>Terbuka untuk Umum</p>   
                        </div>
                        <span>Rules</span>
                        <ul>
                          <li> <p>- Multi Slot On | Double Winner Allowed </br>
                            - All Rank/Tier</br>
                            - Squad Mode</br>
                            - Match Mode : Standard 13R - Tournament Mode</p></li>
                        </ul>
                        <span>Format</span>
                        <p>Single Eliminations</p>
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
                            <th>Prizes</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>🥇</td>
                            <td>TBA</td>
                            <td>Rp. 300.000,-</td>
                          </tr>
                          <tr>
                            <td>🥈</td>
                            <td>TBA</td>
                            <td>Rp. 200.000,-</td>
                          </tr>
                          <tr>
                            <td>🥉</td>
                            <td>TBA</td>
                            <td>Rp. 100.000,-</td>
                          </tr>
                          <tr>
                            <td>4</td>
                            <td>TBA</td>
                            <td>Rp. 50.000,-</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- BRACKET -->
            <div class="content" id="bracket">
              <h2>Bracket not ready yet.</h2>
            </div>
            <div class="content" id="live">
              <h2>Tournament live have not started yet.</h2>
            </div>
            <div class="content" id="standings">
              <h2>Standings not ready yet.</h2>
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
