{{-- <link rel="stylesheet" href="{{asset('assets/css/fullstyle.css')}}"> --}}
<header class="header">
    <div class="overlay" data-overlay></div>

    <div class="container">
      <a href="#" class="logo">
        <img
          src="{{asset('assets/images/logo.png')}}"
          alt="GASLogin logo"
          width="110vh"
          height="110vh"
        />
      </a>

      <button class="nav-open-btn" data-nav-open-btn>
        <ion-icon name="menu-outline"></ion-icon>
      </button>

      <nav class="navbar" data-nav>
        <div class="navbar-top">
          <a href="#" class="logo">
            <img
              src="{{asset('assets/images/logo.png')}}"
              alt="GASLogin logo"
              width="110vh"
              height="110vh"
            />
          </a>

          <button class="nav-close-btn" data-nav-close-btn>
            <ion-icon name="close-outline"></ion-icon>
          </button>
        </div>

        <ul class="navbar-list">
          <li>
            <a href="{{route ('home')}}" class="navbar-link">Home</a>
          </li>

          <li>
            <a href="{{route ('about')}}" class="navbar-link">About</a>
          </li>

          <li>
            <a href="{{route ('tournament')}}" class="navbar-link">Tournament</a>
          </li>

          <li>
            <a href="{{route ('mainblog')}}" class="navbar-link">Blog</a>
          </li>

          <li>
            <a href="{{route ('contact')}}" class="navbar-link">Contact</a>
          </li>
        </ul>

        <ul class="nav-social-list">
          <li>
            @guest
            <a href="{{route('guest.login')}}">
              <button style="color: hsl(31, 100%, 51%)">
                <span>Log-ins</span>
              </button></a
            >
            @endguest
          </li>
          <li>
            @auth
            <a href="{{route('pengguna_biasa.logout')}}">
              <button style="color: hsl(31, 100%, 51%)">
                <span>logout</span>
              </button></a
            >
            @endauth
          </li>
        </ul>
      </nav>

      <div class="header-actions">
        <button class="search">
            <ion-icon name="search-outline"></ion-icon>
        </button>
    
        @guest
        <a href="{{ route('guest.login') }}">
            <button class="btn-sign_in">
                <div class="icon-box">
                    <ion-icon name="log-in-outline"></ion-icon>
                </div>
                <span>Log-in</span>
            </button>
        </a>
        @endguest
    
        @auth
        <a href="{{ route('logoutuser') }}"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <button class="btn-sign_in">
                <div class="icon-box">
                    <ion-icon name="log-out-outline"></ion-icon>
                </div>
                <span>Log-out</span>
            </button>
        </a>
    
        <form id="logout-form" action="{{ route('logoutuser') }}" method="GET" style="display: none;">
            @csrf
        </form>
        @endauth
    </div>
    
    </div>
  </header>

  <script>
   "use strict";

const elemToggleFunc = function (elem) {
  elem.classList.toggle("active");
};

const navbar = document.querySelector("[data-nav]");
const navOpenBtn = document.querySelector("[data-nav-open-btn]");
const navCloseBtn = document.querySelector("[data-nav-close-btn]");
const overlay = document.querySelector("[data-overlay]");

const navElemArr = [navOpenBtn, navCloseBtn, overlay];

for (let i = 0; i < navElemArr.length; i++) {
  navElemArr[i].addEventListener("click", function () {
    elemToggleFunc(navbar);
    elemToggleFunc(overlay);
    elemToggleFunc(document.body);
  });
}

const goTopBtn = document.querySelector("[data-go-top]");

window.addEventListener("scroll", function () {
  if (window.scrollY >= 800) {
    goTopBtn.classList.add("active");
  } else {
    goTopBtn.classList.remove("active");
  }
});

  </script>