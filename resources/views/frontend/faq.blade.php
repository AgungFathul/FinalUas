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
    <style>
        .faq-container {
            margin: 200px 20%;
        }
    </style>
    <!-- Page-Revealer -->
    <link rel="stylesheet" href="{{asset('assetsmigrate/css/main.css')}}" />
    <script src="{{asset('assetsmigrate/js/tg-page-head.js')}}"></script>
  </head>

  <body id="top">

    @extends('spatial.navbar')

    <div class="comments-wrap faq-container">
      <h4 class="comments-wrap-title">FAQ</h4>
      <div class="latest-comments">
          <ul class="list-wrap">
              @foreach($faqs as $faq)
              <li>
                  <div class="comments-box">
                      <div class="comments-text">
                          <div class="avatar-name">
                              <h6 class="name">{{ $faq->question }}</h6>
                          </div>
                          <p>{{ $faq->answer }}</p>
                      </div>
                  </div>
              </li>
              @endforeach
          </ul>
      </div>
    </div>
        




      
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
