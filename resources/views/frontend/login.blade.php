<!DOCTYPE html>
<html>
  <head>
    <title>GASLogin - Login</title>
    <link
      rel="shortcut icon"
      href="./assets/images/fav.png"
      type="image/svg+xml"
    />
    <link rel="stylesheet" href="{{asset('assets/css/style_otentikasi.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}" />
    <link
      href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap"
      rel="stylesheet"
    />
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
  </head>
  <body>
    <div class="container-logreg">
      <div class="desc">
        <div class="back"></div>
        <div class="desc-content">
          <h2>Belum Memiliki Akun?</h2>
          <p>
            Daftar sekarang dan akses beragam fitur eksklusif kami dengan mudah!
          </p>
          <a href="{{route('guest.register')}}" id="register-link"
            ><button id="to-register">Daftar</button></a
          >
        </div>
      </div>
      <div class="login-content">
        <form action="{{ route('guest.loginproses') }}" method="POST">
          @csrf
          <a href="{{route('login')}}" id="login-image"
            ><img src="{{asset('assets/images/login.png')}}"
          /></a>
          <h2 class="title">Login</h2>
          <div class="input-div pass">
            <div class="i">
              <i class="fas fa-envelope"></i>
            </div>
            <div class="div">
              <h5>Email</h5>
              <input type="email" class="input" name="email" />
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
          <div class="remember-forgot">
            <label class="forgot-pass">
              <input type="checkbox" />
              <span> Ingat Saya</span>
            </label>
            <a href="{{route('guest.forgotpassword')}}">Lupa password?</a>
          </div>
          <input type="submit" class="btn-logreg" value="Login" />
          <div class="login-register">
            <label for="register-checkbox">Belum memiliki akun?</label>
            <a href="{{route('guest.register')}}" id="register-link">Daftar</a>
          </div>
        </form>
      </div>
    </div>
    <script
      type="text/javascript"
      src="{{asset('assets/js/script_otentikasi.js')}}"
    ></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  @if($message = Session::get('error'))
  Swal.fire({
  icon: "error",
  title: "Oops...",
  text: "kamu salah memasukan email atau password !",
});
@endif
</script>
  </body>
</html>
