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
</head>
<body id="top" class="section-wrapper">
    @extends('spatial.navbar')

    <main class="site-main">
        <article>
            <section class="container">
                <article id="post">
                    <div class="headings text-center">
                        <div class="category">
                            <a href="#" class="nav-link">Tournament</a>
                        </div>
                        <div class="title">
                            <h1 class="text-title text-dark display-1" style="font-size: 7vh;">asdasdasd</h1>
                        </div>
                    </div>

                    <div class="thumbnail mt-3">
                        <img src="{{ asset('storage/photo-berita/' . $berita->photo) }}" class="thumbnail" alt="Article Image">
                    </div>

                    <div class="content text-dark display-2 secondary-title mt-3">
                        <div>{!! $berita->isiberita !!}</div>
                    </div>
                </article>

                <div class="post-footer mb-3">
                    <div class="post-author text-center">
                        <div class="author-avatar">
                            <center>
                                <img src="{{ asset('assets/images/dev-img/member-team1.jpg') }}" class="rounded" alt="Author Image">
                            </center>
                        </div>
                        <div class="author-info py-2">
                            <h3 class="text-dark">Agung Fathul Muhtadin</h3>
                            <p class="text-secondary secondary-title text-center">Founder &amp; CEO</p>
                            <div class="post-tags d-flex flex-wrap justify-content-center">
                                <a href="#" class="nav-link"><i class="fab fa-facebook-f"></i></a>
                                <a href="#" class="nav-link"><i class="fab fa-twitter"></i></a>
                                <a href="#" class="nav-link"><i class="fab fa-instagram"></i></a>
                                <a href="#" class="nav-link"><i class="fab fa-dribbble"></i></a>
                            </div>
                        </div>
                    </div>

                    <!-- post related -->
                    <div class="post-related py-2">
                        <div class="row justify-content-center">
                            <div class="prev">
                                <div class="py-2">
                                    <a href="#" class="display-2 text-dark">
                                        <i class="fas fa-chevron-left"></i>
                                        Blog Sebelumnya
                                    </a>
                                </div>
                                <article class="article text-center">
                                    <div class="d-flex">
                                        <a href="#">
                                            <img src="./assets/images/valorant.jpg" class="object-fit" alt="Previous Blog Image">
                                        </a>
                                        <div class="cart-body px-1">
                                            <div class="category">
                                                <a href="#" class="link text-primary text-secondary">Fashion</a>
                                            </div>
                                            <a href="#" class="text-title display-1 text-dark">
                                                Looking for some feedback for this rejected track technology
                                            </a>
                                        </div>
                                    </div>
                                </article>
                            </div>
                            <div class="next text-right">
                                <div class="py-2">
                                    <a href="#" class="display-2 text-dark">
                                        Blog Selanjutnya
                                        <i class="fas fa-chevron-right"></i>
                                    </a>
                                </div>
                                <article class="article text-center">
                                    <div class="d-flex">
                                        <div class="cart-body px-1">
                                            <div class="category">
                                                <a href="#" class="link text-primary text-secondary">Fashion</a>
                                            </div>
                                            <a href="#" class="text-title display-1 text-dark">
                                                Looking for some feedback for this rejected track technology
                                            </a>
                                        </div>
                                        <a href="#">
                                            <img src="./assets/images/dota2.jpg" class="object-fit" alt="Next Blog Image">
                                        </a>
                                    </div>
                                </article>
                            </div>
                        </div>
                    </div>

                    <div class="post-comments py-2">
                        <h3 class="text-center text-light display-1 secondary-title py-2">3 Comments</h3>
                        <div class="comment-details">
                            <div class="comment-item py-2">
                                <div class="d-flex">
                                    <div class="avatar px-2">
                                        <img src="./assets/images/dev-img/member-team2.jpg" class="rounded" alt="Commenter Image">
                                    </div>
                                    <div class="comment-content">
                                        <h5 class="display-2 display-comment m-0">Brandon Kelley</h5>
                                        <p class="title-secondary text-dark">Wow, tulisan yang sangat menginspirasi! Saya selalu terpesona dengan intensitas dan keahlian yang ditunjukkan oleh para pemain di turnamen EA Esports. Mereka benar-benar membawa game ke level yang baru dan mengubahnya menjadi bentuk seni kompetitif yang luar biasa.</p>
                                    </div>
                                </div>
                                <!-- comment reply -->
                                <div class="reply py-2">
                                    <div class="d-flex">
                                        <div class="avatar px-2">
                                            <img src="./assets/images/dev-img/member-team3.jpg" class="rounded" alt="Reply Commenter Image">
                                        </div>
                                        <div class="comment-content">
                                            <h5 class="display-2 display-comment m-0">Agung Fathul Muhtadin</h5>
                                            <p class="title-secondary text-dark">Saya sangat setuju dengan penulis! Turnamen EA Esports bukan hanya tentang kompetisi, tetapi juga tentang kesempatan untuk menghubungkan diri dengan komunitas yang berbagi minat yang sama. Saya sudah tidak sabar untuk melihat siapa yang akan menjadi bintang berikutnya di dunia game!</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="comment-item py-2">
                                <div class="d-flex">
                                    <div class="avatar px-2">
                                        <img src="./assets/images/dev-img/member-team4.jpg" class="rounded" alt="Commenter Image">
                                    </div>
                                    <div class="comment-content">
                                        <h5 class="display-2 display-comment m-0">Brandon Kelley</h5>
                                        <p class="title-secondary text-dark">Tulisan yang sangat menggugah semangat! Saya adalah salah satu dari mereka yang terpesona oleh dunia EA Esports, dan saya sangat menghargai upaya para pemain dan penyelenggara turnamen dalam menjaga semangat persaingan yang sehat dan sportivitas. Semoga turnamen ini terus berkembang dan memberikan inspirasi bagi banyak generasi mendatang!</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <h3 class="text-center display-1 display-comment py-2">Leave Comment</h3>
                        <div class="comment-form">
                            <div class="d-flex justify-content-between flex-wrap">
                                <input type="text" class="form-control" placeholder="Name">
                                <input type="email" class="form-control" placeholder="Email">
                                <input type="text" class="form-control" placeholder="Website">
                            </div>
                            <textarea class="form-control mt-3" placeholder="Message" rows="10"></textarea>
                            <div class="text-center">
                                <center>
                                    <button type="submit" class="btn btn-primary display-2 text-light mt-2">Submit</button>
                                </center>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </article>
    </main>

    @extends('spatial.footer')
</body>
</html>
