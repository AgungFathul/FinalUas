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
    <link rel="stylesheet" href="{{asset('assets/css/style-blog.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/style_tournament.css')}}" />
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
      
      <div class="card-container" style="margin-top: 30vh;">
        @foreach($beritas as $berita)
        <a href="{{ route('blog', $berita->id) }}">
            <div class="card" data-status="completed">
                <div class="card-header">
                    <img src="{{ asset('storage/photo-berita/' . $berita->photo) }}" alt="{{ $berita->judul }}" style="width: 100%; height: 200px; object-fit: cover;" />
                    {{-- <span class="status status-completed">Berita</span> --}}
                </div>
                <div class="card-body">
                    <h3 class="tournament-name">{{ Str::limit($berita->judul, 30) }}</h3>
                    <p class="tournament-detail">{{ $berita->created_at->format('d M Y') }}</p>
                </div>
            </div>
        </a>
        @endforeach
    </div>
    </main>

    @extends('spatial.footer')

    {{-- <script
      type="module"
      src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"
    ></script>
    <script
      nomodule
      src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"
    ></script> --}}
  </body>
</html>
