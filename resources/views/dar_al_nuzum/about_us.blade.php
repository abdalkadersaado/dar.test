<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="userId" content="{{ auth()->check() ? auth()->id() : '' }}">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <title>About Us</title>
    <style>
    @import url('http://fonts.cdnfonts.com/css/gotham');
    </style>
     <!-- Bootstrap core CSS -->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('frontend/css/style-'. $dir_lang .'.css') }}">
    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/css/ser.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/aboutus.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/owl.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/lightbox.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/navi.css') }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"crossorigin="anonymous"></script>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
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
            font-size: 12px;
        }
    </style>
  </head>

<body>

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky">
    <div class="container" id="app">
        <div class="row">
            <div class="col-12">

                <nav class="main-nav">
                            <!-- ***** Logo Start ***** -->
                            <a href="index.html" class="logo">
                                <img src="/assets/images/Dar Logo.png" style="width: 25%;     min-width: 170px;" class="logo1">
                                 <img src="/assets/images/Dar Logo.png" style="width: 25%; min-width: 127px;" class="logo2">
                            </a>
                            <!-- ***** Logo End ***** -->
                            <!-- ***** Menu Start ***** -->
                            <ul class="nav">
                                <li class="drop with--one--item" ><a style=" {{ (request()->is('/')) ? 'color:#ba0f0f' : '' }} " href="{{ route('dar.home') }}">{{ __('Frontend/general.Home') }}</a></li>
                                <li class="nav-item dropdown has-megamenu">
                                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" style="padding: 0;"> {{ __('Frontend/general.Services') }} </a>
                                    <div class="dropdown-menu megamenu" role="menu">
                                        @include('dar_al_nuzum.partial.services_header')
                                    <!-- end row -->
                                    </div> <!-- dropdown-mega-menu.// -->
                                </li>

                               <li class="drop with--one--item"><a style=" {{ (request()->is('blogs')) ? 'color:#ba0f0f' : '' }} " href="{{ route('blogs') }}">{{ __('Frontend/general.Blogs') }}</a></li>
                               <li class="drop with--one--item"><a style=" {{ (request()->is('contact')) ? 'color:#ba0f0f' : '' }} " href="{{ route('dar.contact') }}">Contact Us</a></li>
                               <li class=""><a style=" {{ (request()->is('about-us')) ? 'color:#ba0f0f' : '' }} " href="{{ route('about.us') }}">About Us </a></li>
                                @if (config('app.locale') == 'ar')
                                    <li class="lang_link">
                                        <a href="{{ route('change_locale','en') }}">English</a>
                                    </li>
                                @else
                                    <li class="lang_link">
                                        <a href="{{ route('change_locale','ar') }}">Arabic</a>
                                    </li>
                                @endif
                                @auth
                                        <user-notification></user-notification>
                                @endauth
                                <li class="dropdown" >
                                    @guest
                                        <li >
                                            <div class="main-button-red">
                                                <div class="" ><a href="{{ route('frontend.show_login_form') }}"  class="whi"
                                                style="
                                                    padding: 2px 18px;
                                                    font-size: 12px;
                                                    line-height: 34px;
                                                    height: 36px;
                                                    color: #ffffff!important;">
                                                    Sign in</a>
                                                </div>
                                            </div>
                                        </li>
                                    @else
                                    <li class="dropdown" ><a href="#">
                                        <button class="dropbtn">
                                            <svg xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:cc="http://creativecommons.org/ns#" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns:svg="http://www.w3.org/2000/svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 2666.6667 2666.6667" height="40px" width="40px" xml:space="preserve" id="svg2" version="1.1"><metadata id="metadata8"><rdf:RDF><cc:Work rdf:about=""><dc:format>image/svg+xml</dc:format><dc:type rdf:resource="http://purl.org/dc/dcmitype/StillImage" /></cc:Work></rdf:RDF></metadata><defs id="defs6" /><g transform="matrix(1.3333333,0,0,-1.3333333,0,2666.6667)" id="g10"><g transform="scale(0.1)" id="g12"><g transform="scale(1.08466)" id="g14"><path id="path16" style="fill:#000;fill-opacity:1;fill-rule:nonzero;stroke:none" d="m 9219.46,15857.5 c -3660.21,0 -6638.01,-2977.8 -6638.01,-6638.04 0,-3660.22 2977.8,-6638.01 6638.01,-6638.01 3660.24,0 6638.04,2977.79 6638.04,6638.01 0,3660.24 -2977.8,6638.04 -6638.04,6638.04 z m 0,-13718.59 c -955.78,0 -1883.08,187.25 -2756.14,556.49 -843.17,356.7 -1600.37,867.18 -2250.56,1517.34 -650.2,650.25 -1160.69,1407.44 -1517.33,2250.56 -369.28,873.08 -556.52,1800.38 -556.52,2756.16 0,955.74 187.24,1883.04 556.52,2756.14 356.64,843.2 867.13,1600.4 1517.33,2250.6 650.19,650.2 1407.39,1160.6 2250.56,1517.3 873.06,369.3 1800.36,556.5 2756.14,556.5 955.74,0 1883.04,-187.2 2756.14,-556.5 843.1,-356.7 1600.3,-867.1 2250.6,-1517.3 650.1,-650.2 1160.6,-1407.4 1517.3,-2250.6 369.3,-873.1 556.5,-1800.4 556.5,-2756.14 0,-955.78 -187.2,-1883.08 -556.5,-2756.16 C 15386.8,5620.18 14876.3,4862.99 14226.2,4212.74 13575.9,3562.58 12818.7,3052.1 11975.6,2695.4 11102.5,2326.16 10175.2,2138.91 9219.46,2138.91" /></g><path id="path18" style="fill:#000;fill-opacity:1;fill-rule:nonzero;stroke:none" d="m 15011.4,4261.2 c -110.4,0 -209.8,76.7 -234.3,189 -431.5,1980.5 -2218.4,3418 -4248.8,3418 H 9471.82 c -2030.4,0 -3817.3,-1437.5 -4248.85,-3418 -28.21,-129.5 -156.11,-211.6 -285.59,-183.4 -129.51,28.2 -211.62,156.1 -183.4,285.6 116.56,534.9 322.35,1042.6 611.65,1509 283.75,457.5 639.52,862.1 1057.42,1202.8 421.59,343.6 893.51,611.4 1402.65,796.1 526.91,191 1080.74,287.9 1646.12,287.9 h 1056.48 c 565.4,0 1119.2,-96.9 1646.1,-287.9 509.2,-184.7 981.1,-452.5 1402.7,-796.1 417.9,-340.7 773.6,-745.3 1057.4,-1202.8 289.3,-466.4 495.1,-974.1 611.6,-1509 28.3,-129.5 -53.9,-257.4 -183.4,-285.6 -17.2,-3.8 -34.4,-5.6 -51.3,-5.6" /><path id="path20" style="fill:#000;fill-opacity:1;fill-rule:nonzero;stroke:none" d="m 10000,13596.4 c -1446.94,0 -2624.11,-1177.1 -2624.11,-2624.1 0,-1446.9 1177.17,-2624.1 2624.11,-2624.1 1446.9,0 2624.1,1177.2 2624.1,2624.1 0,1447 -1177.2,2624.1 -2624.1,2624.1 z m 0,-5728.2 c -829.14,0 -1608.65,322.9 -2194.94,909.2 -586.29,586.3 -909.17,1365.8 -909.17,2194.9 0,829.1 322.88,1608.7 909.17,2195 586.29,586.2 1365.8,909.1 2194.94,909.1 829.1,0 1608.7,-322.9 2194.9,-909.1 586.3,-586.3 909.2,-1365.9 909.2,-2195 0,-829.1 -322.9,-1608.6 -909.2,-2194.9 -586.2,-586.3 -1365.8,-909.2 -2194.9,-909.2" /></g></g> </svg>
                                        </button></a>

                                        <div class="dropdown-content">
                                             {{-- <a href="{{ route('profile') }}" class="drno">
                                                @if (auth()->user())
                                                    {{ auth()->user()->name}}
                                                @endif
                                            </a>
                                            <hr> --}}
                                            <a href="{{ route('profile') }}" class="drno">Profile</a>
                                            <a href="{{ route('edit_profile') }}" class="drno">Edit profile</a>
                                            <a href="{{ route('frontend.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="drno">Sign out</a>
                                                <form id="logout-form" action="{{ route('frontend.logout') }}" method="POST" style="display: none;">
                                                    @csrf
                                                </form>
                                        </div>
                                    </li>
                                    @endguest
                                </li>
                            </ul>
                            <a class='menu-trigger'>
                                <span>Menu</span>
                            </a>
                            <!-- ***** Menu End ***** -->
                        </nav>


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
        <div class="col-lg-12" >
          <!-- <h6></h6> -->
          <h2>About Us</h2>
        </div>
      </div>
    </div>
  </section>

  <section class="meetings-page" id="meetings" style="display: block;">

    <div class="aboutus">
      <p class="ser-title ">Who We Are</p>
      <hr class="redi">
      <p class="dar">DAR ALNUZUM Group</p>
      <p class="containn">Dar Alnuzum, Public Accountants was established in 1994 by Mahmoud Juma Assad, a certified public accountant. He formerly served as a director at Saba & Company (Deloitte Touch Ross).

        We have built a reputation of trust and reliability in the local market by providing the best accounting, bookkeeping and financial planning services to small and medium enterprises. Despite having over 20 years of experience in accounting, auditing, assurance and advisory services, we are still eager to grow and add more value to our clients’ business. We have a professional staff with an unwavering commitment to ethics, a desire for accountability, and a bottomless appetite for achievement.


        </p>
        <div class="v-m-con">
          <!-- <div class="v-m" data-aos="fade-right" data-aos-duration="2000">
            <p class="v-mtitle">Mission</p>
            <p class="v-mcon hu">Be recognized as a leading professional services firm in the UAE through developing value-centric, qualitative, timely, and cost-effective services.            </p>
          </div> -->
          <img src="{{ asset('assets/images/m.png') }}" class="vim">
          <!-- <div class="v-m" data-aos="fade-left" data-aos-duration="2000">
            <p class="v-mtitle">Vision</p>
            <p class="v-mcon">Create a highly regarded brand name and unbeatable workplace in local market and all over the region that will provide professionals from all over the country with opportunities to develop successful careers.

            </p>
          </div> -->
          <img src="{{ asset('assets/images/v.png') }}" class="vim">
        </div>

    </div>
    <div class="founder">
      <img src="{{ asset('assets/images/founder1.png') }}" class="img-f" data-aos="zoom-in" data-aos-duration="2000">
      <div class="txt-fon">
        <p class="tit-f">The Founder</p>
        <p class="name-f">Mahmoud Juma Assad</p>
        <hr class="redi fi" style="width: 162px;">
        <p class="con-f">Late Mr. Mahmoud Establish the firm in 1994 and has since then transformed it into one of the best audit and financial consultancy firms in the UAE.
          Mr. Mahmoud served as an Audit Manager at Deloitte Touch Ross (Saba & Co) before the inauguration of Dar Al-Nuzum.
          External Audit, Audit of government entities, Liquidation and insolvency, Company formation, Business valuation, Due diligence reviews, Fraud and forensic audits, Legal Framework in UAE
          PROFESSIONAL AFFILIATIONS
          Member of JACPA, Affiliated member of ASCA</p>
      </div>
    </div>
    <div class="team">
      <p class="tit-f"><span class="slim">  PROFESSIONAL </span>TEAM</p>
      <hr class="redi" style="width: 162px;">
      <p class="con-f" style="    width: 75%;">
        Our Staff Holds High Academic Qualifications, And Have Long And Varied Experience. Our Customers Will Be Able To Benefit From The Expertise Of Our Partners Spread Across The World
      </p>
      <div class="founder">
        <img src="{{ asset('assets/images/moha.png') }}" class="img-f" data-aos="zoom-in" data-aos-duration="2000">
        <div class="txt-fon">
          <!-- <p class="tit-f">The Founder</p> -->
          <p class="name-f">Mohammad Mahmoud Juma </p>
          <p class="sika">Managing Partner & CEO IACPA <br>
            GCC Tax Diploma (PWC)- Tax Agent</p>
          <hr class="redi " style="width: 162px;">
          <p class="con-f">Mr. Mohammed is IASCA and IACPA qualified and an active member of AAA. With over 21 years of post-qualification experience in the UAE, he brings along innovative ideas backed up with hard-work.
            Mohammed is specialized in the field of audit, accounting and management advisory services. Planning and administering the Audit Schedules, delegation and supervision of work, design and implementation of accounting systems and procedures are some of his areas of expertise.</p>
        </div>
      </div>
      <div class="team-grid">
        <img src="{{ asset('assets/images/1.png') }}" class="teami" data-aos="fade-right" data-aos-duration="2000">
        <img src="{{ asset('assets/images/2.png') }}" class="teami" data-aos="fade-left" data-aos-duration="2000">
        <img src="{{ asset('assets/images/3.png') }}" class="teami" data-aos="fade-right" data-aos-duration="2000">
        <img src="{{ asset('assets/images/4.png') }}" class="teami" data-aos="fade-left" data-aos-duration="2000">
        <img src="{{ asset('assets/images/5.png') }}" class="teami" data-aos="fade-right" data-aos-duration="2000">
        <img src="{{ asset('assets/images/6.png') }}" class="teami" data-aos="fade-left" data-aos-duration="2000">
        <img src="{{ asset('assets/images/7.png') }}" class="teami" data-aos="fade-right" data-aos-duration="2000">
        <img src="{{ asset('assets/images/8.png') }}" class="teami" data-aos="fade-left" data-aos-duration="2000">
        <img src="{{ asset('assets/images/9.png') }}" class="teami" data-aos="fade-right" data-aos-duration="2000">
      </div>
    </div>
  </section>

  <section class="contact-us" id="contact">

    @include('dar_al_nuzum.partial.footer_daralnuzum')
  </section>

    @include('dar_al_nuzum.partial.leave_message')
<!-- Bootstrap core JavaScript -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ url('js/lang_'.config('app.locale').'.js') }}"></script>
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


    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

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
function nextForm(){
console.log("hellonext");
viewId=viewId+1;
progressBar();
displayForms();

console.log(viewId);

}

function prevForm(){
console.log("helloprev");
viewId=viewId-1;
console.log(viewId);
progressBar1();
displayForms();
}
function progressBar1(){
if(viewId===1){
icon2.classList.add('active');
icon2.classList.remove('active');
icon3.classList.remove('active');
icon4.classList.remove('active');
icon5.classList.remove('active');
}
if(viewId===2){
icon2.classList.add('active');
icon3.classList.remove('active');
icon4.classList.remove('active');
icon5.classList.remove('active');
}
if(viewId===3){
icon3.classList.add('active');
icon4.classList.remove('active');
icon5.classList.remove('active');
}
if(viewId===4){
icon4.classList.add('active');
icon5.classList.remove('active');
}
if(viewId===5){
icon5.classList.add('active');
nxtBtn.innerHTML = "Submit"
}
if(viewId>5){
icon2.classList.remove('active');
icon3.classList.remove('active');
icon4.classList.remove('active');
icon5.classList.remove('active');

}
}

function progressBar(){
if(viewId===2){
icon2.classList.add('active');
}
if(viewId===3){
icon3.classList.add('active');
}
if(viewId===4){
icon4.classList.add('active');
}
if(viewId===5){
icon5.classList.add('active');
nxtBtn.innerHTML = "Submit"
}
if(viewId>5){
icon2.classList.remove('active');
icon3.classList.remove('active');
icon4.classList.remove('active');
icon5.classList.remove('active');

}
}

function displayForms(){

if(viewId>5){
viewId=1;
}

if(viewId ===1){
form1.style.display = 'block';
form2.style.display = 'none';
form3.style.display = 'none';
form4.style.display = 'none';
form5.style.display = 'none';


}else if(viewId === 2){
form1.style.display = 'none';
form2.style.display = 'block';
form3.style.display = 'none';
form4.style.display = 'none';
form5.style.display = 'none';

}else if(viewId === 3){
form1.style.display = 'none';
form2.style.display = 'none';
form3.style.display = 'block';
form4.style.display = 'none';
form5.style.display = 'none';
}else if(viewId === 4){
form1.style.display = 'none';
form2.style.display = 'none';
form3.style.display = 'none';
form4.style.display = 'block';
form5.style.display = 'none';

}else if(viewId === 5){
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
output.innerHTML = slider.value ;

slider.oninput = function() {
output.innerHTML = this.value ;


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
        <script>
          AOS.init();
        </script>
</body>


  </body>

</html>
