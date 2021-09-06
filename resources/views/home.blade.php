@extends('layouts.app')

@section('content')

@if ($section_1->count() > 0)
    @foreach ($section_1 as $item)
        <header class="masthead" style="background: linear-gradient(to bottom, rgba(92, 77, 66, 0.8) 0%, rgba(92, 77, 66, 0.8) 100%), url('{{ asset('storage/' . $item->image) }}')">
            <div class="container px-4 px-lg-5 h-100">
                <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
                    <div class="col-lg-8 align-self-end">
                        <h1 class="text-white font-weight-bold">
                            {{ $item->name }}
                        </h1>
                        <hr class="divider" />
                        <h6 class="text-white">
                            {{ $item->title }}
                        </h6>
                    </div>
                    <div class="col-lg-8 align-self-baseline">
                        <p class="text-white-75 mb-5">{!! $item->desc !!}</p>
                        <a class="btn btn-primary btn-xl" target="_blank" href="https://opensea.io/collection/abstraspace">Buy token</a>
                    </div>
        
                    <div class="col-lg-8 my-3 my-lg-0 containter_social">
                        <a class="btn btn-dark btn-social mx-2" href="#!"><i class="bi bi-twitter"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!"><i class="bi bi-instagram"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!"><i class="bi bi-discord"></i></a>
                    </div>

                </div>
            </div>
        </header>
    @endforeach
@endif
@if ($section_2->count() > 0)
    @foreach ($section_2 as $item)
        <section class="page-section bg-primary" id="about">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-8 text-center">
                        <h2 class="text-white mt-0">{{ $item->name }}</h2>
                        <hr class="divider divider-light" />
                        <h6 class="text-white">
                            {{ $item->title }}
                        </h6>
                        <p class="text-white-75 mb-4">
                         {!! $item->desc !!}
                        </p>
                    </div>
                </div>
            </div>
        </section>
    @endforeach
@endif
@if ($section_3->count() > 0)
    @foreach ($section_3 as $item)
        <section class="page-section" id="services">
            <div class="container px-4 px-lg-5">
                <h2 class="text-center mt-0">{{ $item->name }}</h2>
                <hr class="divider">
                <div class="row gx-4 gx-lg-5">
                    <div class="row">
                        <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0">
                            <h3>{{ $item->title }}</h3>
                            {!! $item->desc !!}
                        </div>
                        <div class="col-lg-6 order-1 order-lg-2 text-center">
                            <img src="{{ asset('storage/' . $item->image) }}" alt="" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endforeach
@endif
@if ($section_4->count() > 0)
    @foreach ($section_4 as $item)
        <section class="page-section bg-dark text-white mb-3">
            <div class="container px-4 px-lg-5">
            <h2 class="text-center mt-0">{{ $item->name }}</h2>
                <hr class="divider">
                <div class="row gx-4 gx-lg-5">
                
                    <div class="col-lg-6 mt-3 mt-lg-0">
                        <img src="{{ asset('storage/' . $item->image) }}" alt="" class="img-fluid">
                    </div>
                    <div class="col-lg-6 text-left">
                        <h3>{{ $item->title }}</h3>
                        {!! $item->desc !!}
                    </div>
                </div>
            </div>
        </section>
    @endforeach
@endif
    <!-- Portfolio-->
    <div id="portfolio">
        <div class="container-fluid p-0">
        <h2 class="text-center mt-0">Gallery</h2>
            <hr class="divider">
            <div class="row g-0">
                <div class="col-lg-3 col-sm-6">
                    <img class="img-fluid" src="assets/img/portfolio/thumbnails/1.jpg" alt="..." />
                </div>
                <div class="col-lg-3 col-sm-6">
                    <img class="img-fluid" src="assets/img/portfolio/thumbnails/2.jpg" alt="..." />
                </div>
                <div class="col-lg-3 col-sm-6">
                    <img class="img-fluid" src="assets/img/portfolio/thumbnails/3.jpg" alt="..." />
                </div>
                <div class="col-lg-3 col-sm-6">
                    <img class="img-fluid" src="assets/img/portfolio/thumbnails/4.jpg" alt="..." />
                </div>
                <div class="col-lg-3 col-sm-6">
                    <img class="img-fluid" src="assets/img/portfolio/thumbnails/5.jpg" alt="..." />
                </div>
                <div class="col-lg-3 col-sm-6">
                    <img class="img-fluid" src="assets/img/portfolio/thumbnails/6.jpg" alt="..." />
                </div>
                <div class="col-lg-3 col-sm-6">
                    <img class="img-fluid" src="assets/img/portfolio/thumbnails/7.jpg" alt="..." />
                </div>
                <div class="col-lg-3 col-sm-6">
                    <img class="img-fluid" src="assets/img/portfolio/thumbnails/8.jpg" alt="..." />
                </div>
            </div>
        </div>
    </div>

    <!-- Mapa-->
    <section class="page-section bg-dark text-white" id="map">
        <div class="container px-4 px-lg-5">
        <h2 class="text-center mt-0">Mapa projektu</h2>
            <hr class="divider">
            <div class="row gx-4 gx-lg-5 lead">
              
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis repellat architecto voluptatibus modi quisquam cumque praesentium. Ipsam similique nostrum, atque nulla aliquam quos velit. Illo at voluptatibus quisquam molestias earum.
            </div>
    </section>

@if ($faq->count() > 0)
    <section class="page-section bg-primary" id="faq">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-lg-8 text-center">
                    <h2 class="text-white mt-0">FAQ</h2>
                    <hr class="divider divider-light" />
                </div>
                @foreach ($faq as $item)
                    <div class="faq_item text-white">
                        <h3>{{ $item->name }}</h3>
                        <p class="gx-4 gx-lg-5">
                            {!! $item->desc !!}
                        </p>
                        <hr class="my-4">
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endif

    <!--footer-->
    <footer class="footer py-4">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 text-lg-start">Copyright &copy; 2021 <a href="http://wojciech-kondraciuk.pl/" target="_blank">wojciech-kondraciuk.pl/</a></div>
                    <div class="col-lg-4 my-3 my-lg-0 containter_social">
                        <a class="btn btn-dark btn-social mx-2" href="#!"><i class="bi bi-twitter"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!"><i class="bi bi-instagram"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!"><i class="bi bi-discord"></i></a>
                    </div>
                    <div class="col-lg-4 text-lg-end">
                        <a class="link-dark text-decoration-none me-3" href="#!">Privacy Policy</a>
                        <a class="link-dark text-decoration-none" href="#!">Terms of Use</a>
                    </div>
                </div>
            </div>
        </footer>
@endsection

