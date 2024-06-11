<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GASLogin</title>
    <link rel="shortcut icon" href="./assets/images/fav.png" type="image/svg+xml">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style-article.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500;600;700&family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
    {{-- <link
            rel="stylesheet"
            href="{{asset('assetsmigrate/css/plugins.css')}}"
        /> --}}
        <!-- Page-Revealer -->
        <link rel="stylesheet" href="{{asset('assetsmigrate/css/main.css')}}" />
        <script src="{{asset('assetsmigrate/js/tg-page-head.js')}}"></script>
</head>
<body id="top" class="section-wrapper">
    @extends('spatial.navbar')

    <main class="main--area">


        <!-- blog-area -->
        <section class="blog-area blog-details-area" style="margin-top: 10vh;">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="blog-post-wrapper">
                        <div class="blog-post-item">
                            <div class="blog-post-thumb">
                                <img src="{{ asset('storage/photo-berita/' . $berita->photo) }}" alt="img">
                            </div>
                            <div class="blog-post-content blog-details-content">
                                <div class="blog-post-meta">
                                    <ul class="list-wrap">
                                        <li>By<a href="#">Admin</a></li>
                                        <li><i class="far fa-calendar-alt"></i> {{ $berita->created_at->format('d M Y') }}</li>
                                        <li><i class="far fa-comments"></i><a href="#">No comments</a></li>
                                    </ul>
                                </div>
                                <h2 class="title">{{ $berita->judul }}</h2>
                                <div>{!! $berita->isiberita !!}</div>
                                <div class="blog-details-bottom">
                                    <div class="row">
                                        <div class="col-xl-6 col-md-7">
                                            <div class="tg-post-tags">
                                                <h5 class="tags-title">tags :</h5>
                                                <ul class="list-wrap d-flex flex-wrap align-items-center m-0">
                                                    <li><a href="#">Esports</a>,</li>
                                                    <li><a href="#">Fantasy</a>,</li>
                                                    <li><a href="#">game</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-5">
                                            <div class="blog-post-share justify-content-start justify-content-md-end">
                                                <h5 class="share">share :</h5>
                                                <ul class="list-wrap">
                                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                                    <li>
                                                        <a href="#">
                                                            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M8.33192 5.92804L13.5438 0H12.3087L7.78328 5.14724L4.16883 0H0L5.46575 7.78353L0 14H1.2351L6.01407 8.56431L9.83119 14H14L8.33192 5.92804ZM6.64027 7.85211L6.08648 7.07704L1.68013 0.909771H3.57718L7.13316 5.88696L7.68694 6.66202L12.3093 13.1316H10.4123L6.64027 7.85211Z" fill="currentColor" />
                                                            </svg>
                                                        </a>
                                                    </li>
                                                    <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="blog__avatar-wrap mb-65">
                            <div class="blog__avatar-img">
                                <a href="#"><img src="{{asset('assetsmigrate/img/blog/avatar.jpg')}}" alt="img"></a>
                            </div>
                            <div class="blog__avatar-info">
                                <span class="designation">Ditulis oleh:</span>
                                <h4 class="name"><a href="#">Admin</a></h4>
                                <p>Berita ini </p>
                            </div>
                        </div>
                        <div class="comments-wrap">
                            <h4 class="comments-wrap-title">{{ $berita->comments->count() }} Comments</h4>
                            <div class="latest-comments">
                                <ul class="list-wrap">
                                    @foreach($berita->comments as $comment)
                                    <li>
                                        <div class="comments-box">
                                            <div class="comments-avatar">
                                                <img src="{{ asset('lte\dist\img\avatar.png') }}" alt="img">
                                            </div>
                                            <div class="comments-text">
                                                <div class="avatar-name">
                                                    <h6 class="name">{{ $comment->user->name }} <a href="#" class="comment-reply-link"><i class="fas fa-reply"></i> Reply</a></h6>
                                                    <span class="date">{{ $comment->created_at->format('d M Y') }}</span>
                                                </div>
                                                <p>{{ $comment->comment }}</p>
                                            </div>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        @auth
                        <div class="comment-respond">
                            <h3 class="comment-reply-title">Leave a Reply</h3>
                            <form class="comment-form" action="{{ route('pengguna_biasa.comments.store', $berita->id) }}" method="POST">
                                @csrf
                                <div class="form-grp">
                                    <textarea name="comment" placeholder="Comment *"></textarea>
                                </div>
                                <button type="submit">Post Comment</button>
                            </form>
                        </div>
                        @else
                        <p>Please <a href="{{ route('guest.login') }}">login</a> to leave a comment.</p>
                        @endauth
                    </div>
                    <div class="blog-post-sidebar">
                        <aside class="blog-sidebar">
                            <div class="blog-widget">
                                <div class="sidebar__author">
                                    <div class="sidebar__author-content">
                                        <h4 class="name">BERITA TERBARU</h4>
                                        <p>Pantau terus berita mengenai Esport favoritmu di sini, jangan sampai ketinggalan!</p>
                                    </div>
                                </div>
                            </div>

                            <div class="blog-widget">
                                <h4 class="fw-title">Berita yang baru saja di post</h4>
                                <div class="rc__post-wrapper">
                                    @php
                                        $beritas = App\Models\Berita::orderBy('created_at', 'desc')->take(3)->get();
                                    @endphp
                                    @foreach($beritas as $berita)
                                    <div class="rc__post-item">
                                        <div class="rc__post-thumb">
                                            <a href="{{ route('blog', $berita->id) }}"><img src="{{ asset('storage/photo-berita/' . $berita->photo) }}" alt="{{ $berita->judul }}"></a>
                                        </div>
                                        <div class="rc__post-content">
                                            <h6 class="title"><a href="{{ route('blog', $berita->id) }}">{{ $berita->judul }}</a></h6>
                                            <span class="date">{{ $berita->created_at->format('M d, Y') }}</span>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="blog-widget">
                                <h4 class="fw-title">Newsletter</h4>
                                <div class="sidebar__newsletter">
                                    <p>Lorem ipsum sitamet conteur adipiscin</p>
                                </div>
                            </div>
                            <div class="blog-widget">
                                <h4 class="fw-title">Tag Cloud</h4>
                                <div class="tagcloud">
                                    <a href="#">E-sports</a>
                                    <a href="#">Fantasy</a>
                                    <a href="#">game</a>
                                    <a href="#">Tournaments</a>
                                    <a href="#">Matches</a>
                                    <a href="#">Streamers</a>
                                </div>
                            </div>
                        </aside>
                    </div>
                </div>
            </div>
        </section>
        <!-- blog-area-end -->

    </main>

    @extends('spatial.footer')
</body>
</html>
