@extends('Welcome.template.head')

@section('content')
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="hero d-flex align-items-center">

        <div class="container">
            <div class="row">
                <div class="col-lg-6 d-flex flex-column justify-content-center">
                    <h1 data-aos="fade-up">Layanan Pengaduan BPS Banjarmasin</h1>
                    <h2 data-aos="fade-up" data-aos-delay="400">Sampaikan laporan anda kepada kami secara langsung</h2>
                    <div data-aos="fade-up" data-aos-delay="600">
                        <div class="text-center text-lg-start">
                            <a href="{{ route('pengaduan.create') }}"
                                class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                                <span>Buat Aduan</span>
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
                    <img src="assets/img/hero-img.png" class="img-fluid" alt="">
                </div>
            </div>
        </div>

    </section><!-- End Hero -->

    <main id="main">
        <!-- ======= About Section ======= -->
        <section id="about" class="about">

            <div class="container" data-aos="fade-up">
                <div class="row gx-0">

                    <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
                        <div class="content">
                            <h3>Tentang Kami</h3>
                            <h2>Expedita voluptas omnis cupiditate totam eveniet nobis sint iste. Dolores est repellat
                                corrupti reprehenderit.</h2>
                            <p>
                                Quisquam vel ut sint cum eos hic dolores aperiam. Sed deserunt et. Inventore et et dolor
                                consequatur itaque ut voluptate sed et. Magnam nam ipsum tenetur suscipit voluptatum nam et
                                est corrupti.
                            </p>
                            <div class="text-center text-lg-start">
                                <a href="#"
                                    class="btn-read-more d-inline-flex align-items-center justify-content-center align-self-center">
                                    <span>Read More</span>
                                    <i class="bi bi-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
                        <img src="assets/img/about.jpg" class="img-fluid" alt="">
                    </div>

                </div>
            </div>

        </section><!-- End About Section -->

        <!-- ======= Values Section ======= -->
        {{-- <section id="values" class="values">

            <div class="container" data-aos="fade-up">

                <header class="section-header">
                    <h2>Our Values</h2>
                    <p>Odit est perspiciatis laborum et dicta</p>
                </header>

                <div class="row">

                    <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                        <div class="box">
                            <img src="assets/img/values-1.png" class="img-fluid" alt="">
                            <h3>Ad cupiditate sed est odio</h3>
                            <p>Eum ad dolor et. Autem aut fugiat debitis voluptatem consequuntur sit. Et veritatis id.</p>
                        </div>
                    </div>

                    <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="400">
                        <div class="box">
                            <img src="assets/img/values-2.png" class="img-fluid" alt="">
                            <h3>Voluptatem voluptatum alias</h3>
                            <p>Repudiandae amet nihil natus in distinctio suscipit id. Doloremque ducimus ea sit non.</p>
                        </div>
                    </div>

                    <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="600">
                        <div class="box">
                            <img src="assets/img/values-3.png" class="img-fluid" alt="">
                            <h3>Fugit cupiditate alias nobis.</h3>
                            <p>Quam rem vitae est autem molestias explicabo debitis sint. Vero aliquid quidem commodi.</p>
                        </div>
                    </div>

                </div>

            </div>

        </section><!-- End Values Section --> --}}

        <!-- ======= Counts Section ======= -->
        <!-- Data Sensus Banjarmasin -->
        {{-- <section id="counts" class="counts">
            <div class="container" data-aos="fade-up">

                <div class="row gy-4">

                    <div class="col-lg-3 col-md-6">
                        <div class="count-box">
                            <i class="bi bi-emoji-smile"></i>
                            <div>
                                <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="1"
                                    class="purecounter"></span>
                                <p>Happy Clients</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="count-box">
                            <i class="bi bi-journal-richtext" style="color: #ee6c20;"></i>
                            <div>
                                <span data-purecounter-start="0" data-purecounter-end="521" data-purecounter-duration="1"
                                    class="purecounter"></span>
                                <p>Projects</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="count-box">
                            <i class="bi bi-headset" style="color: #15be56;"></i>
                            <div>
                                <span data-purecounter-start="0" data-purecounter-end="1463" data-purecounter-duration="1"
                                    class="purecounter"></span>
                                <p>Hours Of Support</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="count-box">
                            <i class="bi bi-people" style="color: #bb0852;"></i>
                            <div>
                                <span data-purecounter-start="0" data-purecounter-end="15" data-purecounter-duration="1"
                                    class="purecounter"></span>
                                <p>Hard Workers</p>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End Counts Section --> --}}

        <!-- ======= F.A.Q Section ======= -->
        <section id="faq" class="faq">

            <div class="container" data-aos="fade-up">

                <header class="section-header">
                    <h2>F.A.Q</h2>
                    <p>Frequently Asked Questions</p>
                </header>

                <div class="row">
                    <div class="col-lg-12">
                        <!-- F.A.Q List 1-->
                        <div class="accordion accordion-flush" id="faqlist1">
                            @foreach ($faq as $faqs)
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#faq-content-{{ $faqs->id }}">
                                            {{ $faqs->question }}
                                        </button>
                                    </h2>
                                    <div id="faq-content-{{ $faqs->id }}" class="accordion-collapse collapse"
                                        data-bs-parent="">
                                        <div class="accordion-body">
                                            {{ $faqs->answer }}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>

        </section><!-- End F.A.Q Section -->

        <!-- ======= Recent Blog Posts Section ======= -->
        {{-- <section id="recent-blog-posts" class="recent-blog-posts">

            <div class="container" data-aos="fade-up">

                <header class="section-header">
                    <h2>Blog</h2>
                    <p>Recent posts form our Blog</p>
                </header>

                <div class="row">

                    <div class="col-lg-4">
                        <div class="post-box">
                            <div class="post-img"><img src="assets/img/blog/blog-1.jpg" class="img-fluid"
                                    alt=""></div>
                            <span class="post-date">Tue, September 15</span>
                            <h3 class="post-title">Eum ad dolor et. Autem aut fugiat debitis voluptatem consequuntur sit
                            </h3>
                            <a href="blog-single.html" class="readmore stretched-link mt-auto"><span>Read More</span><i
                                    class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="post-box">
                            <div class="post-img"><img src="assets/img/blog/blog-2.jpg" class="img-fluid"
                                    alt=""></div>
                            <span class="post-date">Fri, August 28</span>
                            <h3 class="post-title">Et repellendus molestiae qui est sed omnis voluptates magnam</h3>
                            <a href="blog-single.html" class="readmore stretched-link mt-auto"><span>Read More</span><i
                                    class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="post-box">
                            <div class="post-img"><img src="assets/img/blog/blog-3.jpg" class="img-fluid"
                                    alt=""></div>
                            <span class="post-date">Mon, July 11</span>
                            <h3 class="post-title">Quia assumenda est et veritatis aut quae</h3>
                            <a href="blog-single.html" class="readmore stretched-link mt-auto"><span>Read More</span><i
                                    class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>

                </div>

            </div>

        </section><!-- End Recent Blog Posts Section --> --}}
    </main><!-- End #main -->
@endsection
