<!DOCTYPE html>
<html>
  <head>
    <title>GASLogin - Register</title>
    <link rel="shortcut icon" href="./assets/images/fav.png" type="image/svg+xml" />
    <link rel="stylesheet" href="{{ asset('assets/css/style_otentikasi.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
  </head>
  <body>
    <div class="container-logreg">
      <div class="desc">
        <div class="back"></div>
        <div class="desc-content">
          <h2>Sudah Memiliki Akun?</h2>
          <p>
            Masuk sekarang untuk mengakses profil Anda dan fitur-fitur lainnya.
          </p>
          <a href="{{ route('guest.login') }}" id="register-link"><button id="to-register">Masuk</button></a>
        </div>
      </div>
      <div class="login-content">
        <form action="{{ route('guest.registerproses') }}" method="post">
          @csrf
          <a href="{{ route('guest.login') }}" id="login-image"><img src="{{ asset('assets/images/login.png') }}" /></a>
          <h2 class="title">Daftar</h2>
          <div class="input-div one">
            <div class="i">
              <i class="fas fa-user"></i>
            </div>
            <div class="div">
              <h5>Nama</h5>
              <input type="text" name="nama" class="input" />
              @error('nama')
                  <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
          </div>
          <div class="input-div pass">
            <div class="i">
              <i class="fas fa-envelope"></i>
            </div>
            <div class="div">
              <h5>Email</h5>
              <input type="email" name="email" class="input" />
              @error('email')
                  <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
          </div>
          <div class="input-div pass">
            <div class="i">
              <i class="fas fa-lock"></i>
            </div>
            <div class="div">
              <h5>Password</h5>
              <input type="password" name="password" class="input" />
              @error('password')
                  <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
          </div>
          <input type="submit" class="btn-logreg" value="Daftar" />
          <div class="login-register">
            <label for="register-checkbox">Sudah memiliki akun?</label>
            <a href="{{ route('guest.login') }}" id="register-link">Login</a>
          </div>
        </form>
      </div>
    </div>
    <script type="text/javascript" src="{{ asset('assets/js/script_otentikasi.js') }}"></script>
  </body>
</html>
