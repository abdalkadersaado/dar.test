<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Maya">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <title>Dar AlNuzum</title>
{{-- <link href="http://fonts.cdnfonts.com/css/gotham" rel="stylesheet"> --}}
<style>
@import url('http://fonts.cdnfonts.com/css/gotham');
</style>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">


    <!-- Additionala CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    {{-- <link rel="stylesheet" href="a{{ asset('assets/css/profile.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('assets/css/owl.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/lightbox.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/navi.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"crossorigin="anonymous"></script>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
@toastr_css

    <style>
        .btn_submit
        {
            font-size: 13px;
            color: #fff;
            background-color: #ba0f0f;
            padding: 8px 30px;
            display: inline-block;
            border-radius: 22px;
            font-weight: 500;
            text-transform: uppercase;
            transition: all .3s;
            padding-top: 17px;
        }
        h6{
            font-size: 11px;
        }
    </style>
</head>

    <body>
        <!-- ***** Header Area Start ***** -->
        <header class="header-area header-sticky">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        @include('dar_al_nuzum.partial.nav_daralnuzum')
                    </div>
                </div>
            </div>
        </header>
        <!-- ***** Header Area End ***** -->
        <a class="button" href="#popup1">Get Quote</a>
        @include('dar_al_nuzum.partial.get_quote')

        <!-- ***** Main Banner Area Start ***** -->
        <section class="section main-banner" id="top" data-section="section1">
            <video autoplay muted loop id="bg-video">
                <source src="{{ asset('DAR-ALNUZUM1/assets/images/2.mp4') }}" type="video/mp4" />
            </video>

            <div class="video-overlay header-text">
                <div class="container">
                    <div class="row">
                    <div class="col-lg-12">
                        <div class="caption">
                    <!-- <h6>Hello Students</h6> -->
                    <h2>AUDIT & ASSURANCE
                VAT CONSULTATION
                </h2>
                    <p>external & internal audit
                        We will help you identify The potential financial challenges you may face in the implementation of vat.


                        </p>
                    <div class="main-button-red">
                         @guest
                         <div ><a href="{{ route('about.us') }}">Read more About us</a></div>
                        @else
                        @endguest

                    </div>
                </div>
                    </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ***** Main Banner Area End ***** -->

        <section class="services">
            <div class="container">
            <div class="row">
                <div class="col-lg-12">
                <div class="owl-service-item owl-carousel">
                    @forelse ($posts as $post )
                        <div class="item">
                        <div class="icon">
                            <a href="{{ route('single.blog', $post->url_slug()) }}" >

                                @if($post->media->count() > 0)
                                    <img src="{{ asset('assets/posts/' . $post->media->first()->file_name) }}" style="width: 100%; height: 100%;" alt="{{ $post->title() }}">
                                @else
                                    <img src="{{ asset('assets/posts/default.jpg') }}" style="width: 100%;height: 100%;" alt="blog images">
                                @endif
                            </a>
                        </div>
                        <div class="down-content">
                            <h4><a href="{{ route('single.blog', $post->url_slug()) }}" style="color: #fff">{{\Illuminate\Support\Str::limit($post->title(),20,'...')  }}</a></h4>
                            <p>{{ \Illuminate\Support\Str::limit($post->description(), 90, '...') }}</p>
                        </div>
                    </div>
                    @empty
                        <p>Sorry , No blog posted </p>
                    @endforelse


                </div>
                </div>
            </div>
            </div>
        </section>

        <section class="upcoming-meetings" id="meetings">

            <section class="meetings-page" id="meetings">
            <div class="container">
                <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading">
                        <h2>News & Top Clients</h2>
                        <hr class="po">
                    </div>
                    </div>
                    <div class="row">
                    <div class="col-lg-12">
                        <div class="filters">
                        <ul class="fil-cla">
                            {{-- @foreach ($categories as $category)
                                <li data-filter="*"  class="active"><a href="{{ route('frontend.filter_category',$category->url_slug()) }}" style="color: white">{{ $category->name() }}</a></li>
                            @endforeach --}}
                            @foreach($global_categories as $global_category)

                                <li  class="active" style="color: white;line-height: 10px;background-color: #926a6a2b;" ><a href="{{ route('frontend.filter_category', $global_category->url_slug()) }}" style="color: white;line-height: 1px;">{{ $global_category->name() }}</a></li>

                            @endforeach

                        </ul>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="row">
                        <div class="col-lg-7 dewll all soon">
                            @forelse ($users as $user)
                                 <div class="client">
                                @if ($user->user_image != '')

                                    <img src="{{ asset('assets/users/' . $user->user_image) }}" width="60">
                                 @else
                                    <img src="{{ asset('assets/users/default.png') }}" width="60">
                                @endif
                                <div class="cl-tit wify">
                                    <p class="client-tit">
                                        {{ $user->name }}
                                    </p>
                                    <p class="client-con">
                                        {{ $user->bio }}
                                    </p>
                                </div>
                            </div>
                            @empty
                                <p>no user Found</p>
                            @endforelse

                        </div>

                        <div class="col-lg-5 imp">
                        <div class=" templatemo-item-col ">
                            <div class="meeting-item">
                            <div class="blogs">

                                @forelse ($posts_by_category_id as $post )
                                    <div class="lod">
                                        <div class="immmg">
                                            @if($post->media->count() > 0)
                                                 <img class="img-block-small" src="{{ asset('assets/posts/' . $post->media->first()->file_name) }}" alt="{{ $post->title() }}">
                                             @else
                                                 <img class="img-block-small" src="{{ asset('assets/posts/default.jpg') }}" alt="blog images">
                                            @endif
                                        </div>
                                        <div class="containt">
                                            <a href="{{ route('single.blog', $post->url_slug()) }}">
                                                <p class="titles"> {{ $post->title() }}</p>
                                            </a>
                                            <p class="supi">{{ \Illuminate\Support\Str::limit($post->description(), 90, '...') }}</p>
                                        </div>
                                     </div>
                                @empty
                                     <p>not found any post</p>
                                @endforelse


                            </div>
                            </div>
                        </div>
                        </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="pagination">
                            <ul>
                                @if (request('page'))
                                    <li >{!! $posts_by_category_id->links() !!}</li>
                                @else
                                    <li class="active" >{!! $posts_by_category_id->links() !!}</li>
                                @endif
                            </ul>

                        </div>
                    </div>
                    </div>
                </div>
                </div>

            </section>
            </section>


        <section class="our-facts fd">
            <section class="our-courses our-facts" id="courses">
                <div class="container">
                    <div class="row">
                    <div class="col-lg-12">
                        <div class="section-headings">
                        <h2>Our Services</h2>
                        <hr class="po">
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="owl-courses-item owl-carousel " >

                           @include('dar_al_nuzum.services.services')

                        </div>
                    </div>
                    </div>
                </div>
            </section>
        </section>

        <section class="contact-us" id="contact">

            @include('dar_al_nuzum.partial.footer_daralnuzum')
        </section>

        @include('dar_al_nuzum.partial.leave_message')
        <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('backend/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('assets/js/isotope.min.js') }}"></script>
    <script src="{{ asset('assets/js/owl-carousel.js') }}"></script>
    <script src="{{ asset('assets/js/lightbox.js') }}"></script>
    <script src="{{ asset('assets/js/tabs.js') }}"></script>
    <script src="{{ asset('assets/js/video.js') }}"></script>
    <script src="{{ asset('assets/js/slick-slider.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @jquery
    @toastr_js
    @toastr_render
            {{-- @if (Session::has('message'))
        <script>
            toastr.success("{!! Session::get('message') !!}")
        </script>
    @endif
    @if(Session::has('error'))
       <script>
            toastr.error("{!! Session::get('error') !!}")
        </script>
    @endif --}}

            <script>
                //according to loftblog tut
                $('.nav li:first').addClass('active');

                var showSection = function showSection(section, isAnimate) {
                var
                direction = section.replace(/#/, ''),
                reqSection = $('.section').filter('[data-section="' + direction + '"]'),
                reqSectionPos = reqSection.offset().top - 0;

                if (isAnimate) {
                    $('body, html').animate({
                    scrollTop: reqSectionPos },
                    800);
                } else {
                    $('body, html').scrollTop(reqSectionPos);
                }

                };

                var checkSection = function checkSection() {
                $('.section').each(function () {
                    var
                    $this = $(this),
                    topEdge = $this.offset().top - 80,
                    bottomEdge = topEdge + $this.height(),
                    wScroll = $(window).scrollTop();
                    if (topEdge < wScroll && bottomEdge > wScroll) {
                    var
                    currentId = $this.data('section'),
                    reqLink = $('a').filter('[href*=\\#' + currentId + ']');
                    reqLink.closest('li').addClass('active').
                    siblings().removeClass('active');
                    }
                });
                };

                $('.main-menu, .responsive-menu, .scroll-to-section').on('click', 'a', function (e) {
                e.preventDefault();
                showSection($(this).attr('href'), true);
                });

                $(window).scroll(function () {
                checkSection();
                });
            </script>
            <script>
            // Get the modal
            var modal = document.getElementById("myModal");

            // Get the button that opens the modal
            var btn = document.getElementById("myBtn");

            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName("close")[0];

            // When the user clicks the button, open the modal
            btn.onclick = function() {
                modal.style.display = "block";
            }

            // When the user clicks on <span> (x), close the modal
            span.onclick = function() {
                modal.style.display = "none";
            }

            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function(event) {
                if (event.target == modal) {
                modal.style.display = "none";
                }
            }
            </script>
    </body>

</html>
