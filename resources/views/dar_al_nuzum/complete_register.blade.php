<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Template Mo">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <title>Sign In</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

 <style>
    @import url('http://fonts.cdnfonts.com/css/gotham');
    </style>
    <!-- Additional CSS Files -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/lightbox.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/register.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/navi.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"crossorigin="anonymous"></script>
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
            font-size: 11px;
        }
    </style>
</head>

<body style="Font-family:'gotham' ">



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


  <!-- ***** Header Area End ***** -->

  <section class="heading-page jio header-text" id="top">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h6>Complete Register</h6>
          <!-- <h2>Online Teaching and Learning Tools</h2> -->
        </div>
      </div>
    </div>
  </section>

  <section class="meetings-page" id="meetings" style="display: block;">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="row">
            <div class="col-lg-12">
              <div class="meeting-single-item"data-aos="fade-up"
              data-aos-duration="1000">
                <div class="down-content bodyk">
                  <div class="title__container" style="    display: flex;
                    align-items: center;
                    height: 78px;">
                      <img src="/assets/images/Dar Logo.png" style="    width: 15%;" class="logo1">
                      <div class="titj">
                        <h1>Complete Register</h1>
                      </div>
                    </div>
                    <!-- <div class="title__container">

                        <h1>Sign in</h1>
                        <p>Sign in with user name and password you already have.</p>
                    </div> -->
                    <div class="body__container">
                        <div class="left__container">
                            <div class="side__titles">
                              <div class="title__name">
                                    <h3>Company Details</h3>
                                    <!-- <p>Enter & press next</p> -->
                                </div>
                                <div class="title__name">
                                  <h3>Contract Details</h3>
                                  <!-- <p>Enter & press next</p> -->
                              </div>
                              <div class="title__name">
                                  <h3>About Owner</h3>
                                  <!-- <p>Enter & press next</p> -->
                              </div>
                              <div class="title__name">
                                  <h3>Category</h3>
                                  <!-- <p>Enter & press next</p> -->
                              </div>

                            </div>
                            <div class="progress__bar__container">
                                <ul>
                                    <li class="active" id="icon1">

                                        <ion-icon name="podium-outline"></ion-icon>
                                    </li>
                                    <li id="icon2">
                                      <ion-icon name="document-attach-outline"></ion-icon>

                                    </li>
                                    <li id="icon3">
                                      <ion-icon name="person-outline"></ion-icon>
                                    </li>
                                    <li id="icon4">
                                      <ion-icon name="id-card-outline"></ion-icon>
                                    </li>

                                </ul>
                            </div>
                        </div>
                        <div class="right__container">
                            <form action="{{ route('users.complete_user_info',auth()->user()->id) }}" method="post" autocomplete="off" enctype="multipart/form-data">
                               @csrf

                            <fieldset id="form1">
                                <div class="sub__title__container ">
                                    <p>Step 1/4</p>

                                    <h2>Company Details</h2>
                                    <p>Please enter your Company Details.</p>
                                    <div class="formain">
                                      <label for="" class="forml">Company Name</label>
                                        <input type="text" name="company_name" value="{{ old('company_name',auth()->user()->company_name) }}" class="formi">
                                        @error('company_name')<span class="text-danger">{{ $message }}</span>@enderror
                                        <label for="" class="forml">Trade License Number</label>
                                        <input type="text" name="license_number" value="{{ old('license_number',auth()->user()->license_number) }}"  class="formi">
                                        @error('license_number')<span class="text-danger">{{ $message }}</span>@enderror
                                        <label for="" class="forml">Trade License</label>
                                        <input type="file" name="Commercial_Register" value="{{ old('license_number',auth()->user()->Commercial_Register) }}" class="formi" style="padding:0;"  >
                                        @error('Commercial_Register')<span class="text-danger">{{ $message }}</span>@enderror
                                        <label for="" class="forml">MOA</label>
                                        <input type="file" name="MOA" value="{{ old('MOA',auth()->user()->MOA) }}" class="formi" style="padding:0;"  >
                                        @error('MOA')<span class="text-danger">{{ $message }}</span>@enderror

                                    </div>
                                </div>
                                <div class="input__container"> <a class="nxt__btn" onclick="nextForm();"> Next</a> </div>
                            </fieldset>
                            <fieldset class="active__form" id="form2">
                                <div class="sub__title__container">
                                    <p>Step 2/4</p>
                                    <h2>Contract Details</h2>
                                    <p>Please enter your Contract Details</p>
                                    <div class="formain">
                                       <label for="" class="forml">Contract Approval Date</label>
                                            <input type="date" name="date_contract" value="{{ old('date_contract',auth()->user()->date_contract) }}"  class="formi">
                                            @error('date_contract')<span class="text-danger">{{ $message }}</span>@enderror
                                            <label for="" class="forml">Contract (Signed Copy)</label>
                                            <input type="file" name="contract_pdf" value="{{ old('contract_pdf',auth()->user()->contract_pdf) }}"  class="formi" style="padding:0;"  >
                                            @error('contract_pdf')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                 </div>
                                <div class="input__container">
                                    <div class="buttons"> <a class="prev__btn" onclick="prevForm();">Back</a> <a class="nxt__btn" onclick="nextForm();">Next</a> </div>
                                </div>
                            </fieldset>
                            <fieldset class="active__form" id="form3">
                                <div class="sub__title__container">
                                    <p>Step 3/4</p>
                                    <h2>About the Owner</h2>
                                    <p>Please select number of Owner</p>


                                  <div class="partnerrs">

                                  <div id="par" class="partner-form">
                                    <p class="par-tit">Owner Details</p>
                                    <div class="loi">
                                    <div class="ro">
                                      <label for="" class="forml">Passport Number</label>
                                        <input type="number" name="passport_number" value="{{ old('passport_number',auth()->user()->passport_number) }}"  class="formi">
                                        @error('passport_number')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                    <div class="ro">
                                      <label for="" class="forml">Expiry Date</label>
                                       <input type="date" name="expiry_date_passport" value="{{ old('expiry_date_passport',auth()->user()->expiry_date_passport) }}" class="formi">
                                        @error('expiry_date_passport')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                      <div class="ro">
                                      <label for="" class="forml">ID Number</label>
                                      <input type="number" name="id_number" placeholder="" value="{{ old('id_number',auth()->user()->id_number) }}" class="formi">
                                        @error('id_number')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                      <div class="ro">
                                      <label for="" class="forml">Expiry Date Visa</label>
                                      <input type="date" name="expiry_date" value="{{ old('expiry_date',auth()->user()->expiry_date) }}" class="formi">
                                        @error('expiry_date')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                      <div class="ro">
                                      <label for="" class="forml">visa attachement</label>
                                      <input type="file" name="emirates_id"  class="formi" value="{{ old('emirates_id',auth()->user()->emirates_id) }}" style="padding:0;" accept="application/pdf,application/vnd.ms-excel"  >
                                        @error('emirates_id')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                  </div>
                                  </div>
                                </div>
                                </div>
                                <div class="input__container">
                                  <div class="buttons"> <a class="prev__btn" onclick="prevForm();">Back</a> <a class="nxt__btn" onclick="nextForm();">Next</a> </div>
                              </div>
                            </fieldset>
                            <fieldset class="active__form" id="form4">
                              <div class="sub__title__container">
                                  <p>Step 4/4</p>
                                  <h2> Category</h2>
                                  <p>Please select your category </p>
                                  <div class="formain">
                                    <label for="category_id" class="forml">Category</label>
                                    <select name="category_id"  class="formi">
                                        <option value="">Choose Category</option>
                                     @foreach ($categories as $cat )
                                         <option value="{{ $cat->id }}" {{ old('category_id',auth()->user()->category_id) == $cat->id ? 'selected': '' }}>{{ $cat->name() }}</option>
                                    @endforeach
                                    </select>
                                    </div>
                               </div>

                              <div class="input__container">
                                <div class="buttons"> <a class="prev__btn" onclick="prevForm();">Back</a> <button class="nxt__btn" onclick="nextForm();">Submit</button> </div>
                            </div>
                          </fieldset>
                        </div>
                    </form>
                    </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="contact-us" id="contact">

    @include('dar_al_nuzum.partial.footer_daralnuzum')
  </section>

  @include('dar_al_nuzum.partial.leave_message')

  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="assets/js/isotope.min.js"></script>
    <script src="assets/js/owl-carousel.js"></script>
    <script src="assets/js/lightbox.js"></script>
    <script src="assets/js/tabs.js"></script>
    <script src="assets/js/video.js"></script>
    <script src="assets/js/slick-slider.js"></script>
    <script src="assets/js/custom.js"></script>
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
// const icon5 = document.querySelector('#icon5');


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

}
if(viewId===2){
icon2.classList.add('active');
icon3.classList.remove('active');
icon4.classList.remove('active');

}
if(viewId===3){
icon3.classList.add('active');
icon4.classList.remove('active');

}
if(viewId===4){
icon4.classList.add('active');
nxtBtn.innerHTML = "Submit"
}

if(viewId>4){
icon2.classList.remove('active');
icon3.classList.remove('active');
icon4.classList.remove('active');


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
// nxtBtn.innerHTML = "Submit"
}

if(viewId>4){
icon2.classList.remove('active');
icon3.classList.remove('active');
icon4.classList.remove('active');


}
}

function displayForms(){

if(viewId>4){
viewId=1;
}

if(viewId ===1){
form1.style.display = 'block';
form2.style.display = 'none';
form3.style.display = 'none';
form4.style.display = 'none';



}else if(viewId === 2){
form1.style.display = 'none';
form2.style.display = 'block';
form3.style.display = 'none';
form4.style.display = 'none';


}else if(viewId === 3){
form1.style.display = 'none';
form2.style.display = 'none';
form3.style.display = 'block';
form4.style.display = 'none';

}else if(viewId === 4){
form1.style.display = 'none';
form2.style.display = 'none';
form3.style.display = 'none';
form4.style.display = 'block';


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
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
         <script>
          AOS.init();
        </script>

</body>


  </body>

</html>
