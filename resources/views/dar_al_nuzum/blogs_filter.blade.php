<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Template Mo">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <title>Blogs</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('frontend/css/style-'. $dir_lang .'.css') }}">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/lightbox.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/navi.css') }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    @toastr_css
</head>
<style>
    .btn_submit {
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

    h6 {
        font-size: 12px;
    }
</style>

<body>



    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container" id="app">
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
    <!-- ***** Header Area End ***** -->
    <section class="heading-page header-text" id="top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>BLOGS</h2>
                </div>
            </div>
        </div>
    </section>

    <section class="meetings-page" id="meetings" style="flex-direction: column;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="filters">
                                <ul class="flexitab">

                                    @foreach($categories as $global_category)
                                         <li  class="{{ (request()->is('blog-filter/'.$global_category->url_slug())) ? 'active' : '' }}"  style="color: white;line-height: 10px;background-color: #726d6d" ><a href="{{ route('blogs.filter', $global_category->url_slug()) }}" style="color: white;line-height: 1px;">{{ $global_category->name() }}</a></li>

                                     @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="row grid">
                                @forelse ($posts as $post )
                                <div class="col-lg-4 templatemo-item-col all tra">
                                    <div class="meeting-item">
                                        <div class="thumb">
                                            <a href="{{ route('single.blog', $post->url_slug()) }}">
                                                @if($post->media->count() > 0)
                                                <img src="{{ asset('assets/posts/' . $post->media->first()->file_name) }}" style="width: 100%; height: 100%;" alt="{{ $post->title() }}">
                                                @else
                                                <img src="{{ asset('assets/posts/default.jpg') }}" style="width: 100%;height: 100%;" alt="blog images">
                                                @endif
                                            </a>
                                        </div>
                                        <div class="down-content">
                                            <a {{ route('single.blog', $post->url_slug()) }}>
                                                <h4>
                                                    {{ $post->title() }}
                                                </h4>
                                            </a>
                                            <p>{{ \Illuminate\Support\Str::limit($post->description(), 90, '...') }}
                                                <a href="{{ route('single.blog', $post->url_slug()) }}" style="color: #ba0f0f;">Read More</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                @empty
                                <p>Sorry , No blog posted </p>
                                @endforelse
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="pagination">
                                <ul>
                                    @if (request('page'))
                                    <li>{!! $posts->links() !!}</li>
                                    @else
                                    <li class="active">{!! $posts->links() !!}</li>
                                    @endif
                                </ul>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

    </section>
    <section class="contact-us" id="contact">

        @include('dar_al_nuzum.partial.footer_daralnuzum')
    </section>

    <section id="message">
        <button id="myBtn"><img src="/assets/images/message.png"></button>
        <div id="myModal" class="modal">


            @include('dar_al_nuzum.partial.leave_message')

        </div>
    </section>


    <!-- Scripts -->
    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ url('js/lang_'.config('app.locale').'.js') }}"></script>
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('backend/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="{{ asset('assets/js/isotope.min.js') }}"></script>
    <script src="{{ asset('assets/js/owl-carousel.js') }}"></script>
    <script src="{{ asset('assets/js/lightbox.js') }}"></script>
    <script src="{{ asset('assets/js/tabs.js') }}"></script>
    <script src="{{ asset('assets/js/video.js') }}"></script>
    <script src="{{ asset('assets/js/slick-slider.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    @jquery
    @toastr_js
    @toastr_render
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
                        scrollTop: reqSectionPos
                    },
                    800);
            } else {
                $('body, html').scrollTop(reqSectionPos);
            }

        };

        var checkSection = function checkSection() {
            $('.section').each(function() {
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

        $('.main-menu, .responsive-menu, .scroll-to-section').on('click', 'a', function(e) {
            e.preventDefault();
            showSection($(this).attr('href'), true);
        });

        $(window).scroll(function() {
            checkSection();
        });
    </script>
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
                        scrollTop: reqSectionPos
                    },
                    800);
            } else {
                $('body, html').scrollTop(reqSectionPos);
            }

        };

        var checkSection = function checkSection() {
            $('.section').each(function() {
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

        $('.main-menu, .responsive-menu, .scroll-to-section').on('click', 'a', function(e) {
            e.preventDefault();
            showSection($(this).attr('href'), true);
        });

        $(window).scroll(function() {
            checkSection();
        });
    </script>
    <script>
        const nxtBtn = document.querySelector('#submitBtn');
        const form1 = document.querySelector('#form1');
        const form2 = document.querySelector('#form2');
        const form3 = document.querySelector('#form3');
        const form4 = document.querySelector('#form4');
        const form5 = document.querySelector('#form5');


        const icon1 = document.querySelector('#icon1');
        const icon2 = document.querySelector('#icon2');
        const icon3 = document.querySelector('#icon3');
        const icon4 = document.querySelector('#icon4');
        const icon5 = document.querySelector('#icon5');


        var viewId = 1;

        function nextForm() {
            console.log("hellonext");
            viewId = viewId + 1;
            progressBar();
            displayForms();

            console.log(viewId);

        }

        function prevForm() {
            console.log("helloprev");
            viewId = viewId - 1;
            console.log(viewId);
            progressBar1();
            displayForms();
        }

        function progressBar1() {
            if (viewId === 1) {
                icon2.classList.add('active');
                icon2.classList.remove('active');
                icon3.classList.remove('active');
                icon4.classList.remove('active');
                icon5.classList.remove('active');
            }
            if (viewId === 2) {
                icon2.classList.add('active');
                icon3.classList.remove('active');
                icon4.classList.remove('active');
                icon5.classList.remove('active');
            }
            if (viewId === 3) {
                icon3.classList.add('active');
                icon4.classList.remove('active');
                icon5.classList.remove('active');
            }
            if (viewId === 4) {
                icon4.classList.add('active');
                icon5.classList.remove('active');
            }
            if (viewId === 5) {
                icon5.classList.add('active');
                nxtBtn.innerHTML = "Submit"
            }
            if (viewId > 5) {
                icon2.classList.remove('active');
                icon3.classList.remove('active');
                icon4.classList.remove('active');
                icon5.classList.remove('active');

            }
        }

        function progressBar() {
            if (viewId === 2) {
                icon2.classList.add('active');
            }
            if (viewId === 3) {
                icon3.classList.add('active');
            }
            if (viewId === 4) {
                icon4.classList.add('active');
            }
            if (viewId === 5) {
                icon5.classList.add('active');
                nxtBtn.innerHTML = "Submit"
            }
            if (viewId > 5) {
                icon2.classList.remove('active');
                icon3.classList.remove('active');
                icon4.classList.remove('active');
                icon5.classList.remove('active');

            }
        }

        function displayForms() {

            if (viewId > 5) {
                viewId = 1;
            }

            if (viewId === 1) {
                form1.style.display = 'block';
                form2.style.display = 'none';
                form3.style.display = 'none';
                form4.style.display = 'none';
                form5.style.display = 'none';


            } else if (viewId === 2) {
                form1.style.display = 'none';
                form2.style.display = 'block';
                form3.style.display = 'none';
                form4.style.display = 'none';
                form5.style.display = 'none';

            } else if (viewId === 3) {
                form1.style.display = 'none';
                form2.style.display = 'none';
                form3.style.display = 'block';
                form4.style.display = 'none';
                form5.style.display = 'none';
            } else if (viewId === 4) {
                form1.style.display = 'none';
                form2.style.display = 'none';
                form3.style.display = 'none';
                form4.style.display = 'block';
                form5.style.display = 'none';

            } else if (viewId === 5) {
                form1.style.display = 'none';
                form2.style.display = 'none';
                form3.style.display = 'none';
                form4.style.display = 'none';
                form5.style.display = 'block';

            }
        }

        // for slider

        var slider = document.querySelector(".slider");
        var output = document.querySelector(".output__value");
        output.innerHTML = slider.value;

        slider.oninput = function() {
            output.innerHTML = this.value;


        }
    </script>
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
                        scrollTop: reqSectionPos
                    },
                    800);
            } else {
                $('body, html').scrollTop(reqSectionPos);
            }

        };

        var checkSection = function checkSection() {
            $('.section').each(function() {
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

        $('.main-menu, .responsive-menu, .scroll-to-section').on('click', 'a', function(e) {
            e.preventDefault();
            showSection($(this).attr('href'), true);
        });

        $(window).scroll(function() {
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
    <script>
        AOS.init();
    </script>
</body>


</body>

</html>
