<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Template Mo">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <title>Profile</title>
    <!-- Additional CSS Files -->
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('frontend/css/style-'. $dir_lang .'.css') }}">
    <style>
    @import url('http://fonts.cdnfonts.com/css/gotham');
    </style>
    <!-- Additionala CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/profile.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/lightbox.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/register.css') }}">
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
            padding-top: 10px;
            line-height: 0px;
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
          <!-- <h6></h6> -->
          <h2>Profile</h2>
        </div>
      </div>
    </div>
  </section>
         @if (auth()->user()->status_order == '1')
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <h3 class="text-center" style="background: rgb(128, 41, 0); color:white">Status Your Order is Under Processing ....</h3>
                    </div>
                </div>
            </div>

        @elseif ( auth()->user()->status_order == '2')
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <p class="text-center" style="background: green; color:white">State order : Accepted</p>
                    </div>
                </div>
            </div>
        @endif
  <section class="meetings-page" id="meetings" style="display: block;">
    <div class="profile">
      <p class="name-tit">{{ auth()->user()->company_name }} Company </p>
      <hr class="redi">
      <br>
            <div class="row">
                <div class="col-6 card shadow mb-4">
                    <p class="main">Company Details:</p>
                </div>
            </div>

            <div class="row">
                <div class="form-control card shadow mb-4">
                <div class="col-3">
                    <p class="supo">Company Name <span>{{ auth()->user()->company_name }}</span></p>
                </div>
                <div class="col-3">
                    <p class="supo">Trade License Number: <span>{{ auth()->user()->license_number }}</span></p>
                </div>
                <div class="col-3">
                    <p class="supo">Trade License Attachment: <span>{{ auth()->user()->Commercial_Register }}</span></p>
                </div>
                <div class="col-3">
                    <p class="supo">MOA Attachment: <span>{{ auth()->user()->MOA }}</span></p>
                </div>

                <div class="col-6">
                    <div>
                        @if (auth()->user()->Commercial_Register != null)
                            <a class="btn btn-outline-success btn-sm btn_submit"
                                href="{{ url('view-trade-license') }}/{{ auth()->user()->id }}/{{ auth()->user()->Commercial_Register }}"
                                target="_blank"
                                ><i class="fas fa-eye"></i>&nbsp;
                                Show Trade License
                            </a>
                        @endif
                        @if (auth()->user()->MOA != null)
                             <a class="btn btn-outline-success btn-sm btn_submit"
                        href="{{ url('view-MOA') }}/{{ auth()->user()->id }}/{{ auth()->user()->MOA }}"
                        target="_blank"
                        ><i class="fas fa-eye"></i>&nbsp;
                        Show MOA
                    </a>
                        @endif

                    </div>

                </div>


                </div>
            </div>
            <div class="row">
                <div class="col-6 card shadow mb-4">
                     <p class="main">Contract Details:</p>
                </div>
            </div>
            <div class="row">
                <div class="form-control card shadow mb-4">
                 <div class="col-3">
                    <p class="supo">Contract Approval Date: <span>{{ auth()->user()->date_contract }}</span></p>
                </div>
                 <div class="col-3">
                    <p class="supo">Contract Attachment: <span>{{ auth()->user()->contract_pdf }}</span></p>
                </div>
                <div class="col-3">
                    @if(auth()->user()->contract_pdf != null)
                        <a class="btn btn-outline-success btn-sm btn_submit"
                                href="{{ url('view-contract') }}/{{ auth()->user()->id }}/{{ auth()->user()->contract_pdf }}"
                                target="_blank"
                                ><i class="fas fa-eye"></i>&nbsp;
                                Show  Contract
                    </a>
                    @endif

                </div>
                </div>
            </div>

            <div class="row">
                <div class="col-6 card shadow mb-4">
                     <p class="main">About the Owners:</p>
                </div>
            </div>
            <div class="row">
                <div class="form-control card shadow mb-4">
                    <div class="col-4">
                        <p class="supo">Passport Number: <span>{{ auth()->user()->passport_number }}</span></p>
                    </div>
                    <div class="col-4">
                        <p class="supo">Expiry Date: <span>{{ auth()->user()->expiry_date_passport }}</span></p>
                    </div>
                    <div class="col-4">
                        <p class="supo">ID Number: <span>{{ auth()->user()->id_number }}</span></p>
                    </div>
                    <div class="col-4">
                        <p class="supo">Expiry Date: <span>{{ auth()->user()->expiry_date }}</span></p>
                    </div>
                    <div class="col-4">
                        <p class="supo">Visa attachement: <span>{{ auth()->user()->emirates_id }}</span></p>
                    </div>
                    <div class="col-4">
                        @if (auth()->user()->emirates_id != null)
                            <a class="btn btn-outline-success btn-sm btn_submit"
                                href="{{ url('view-visa') }}/{{ auth()->user()->id }}/{{ auth()->user()->emirates_id }}"
                                target="_blank"
                                ><i class="fas fa-eye"></i>&nbsp;
                                Show File Visa
                            </a>
                        @endif

                    </div>
                </div>
            </div>
            @if ($financial_file_all->count() === 0)
                 <span></span>
            @else
                <div class="row">
                        <div class="col-6 card shadow mb-4">
                            <p class="main">Requirments Financial Report:</p>
                        </div>
                </div>
                <div class="row">
                    <div class="form-control card shadow mb-4">

                            @if ($financial_file_all === null)
                                <div class="col-3">

                                    <div class="col-3">
                                        <div class="form-group">
                                        <img src="" width="60">
                                    </div>
                                    </div>
                                </div>
                            @else
                                @forelse ($financial_file_all as $f_file)

                                    <div class="be-comment">
                                        <div class="be-comment-content">

                                                <span class="be-comment-name">
                                                    <p>{{ $f_file->user->name  }}</p>
                                                </span>
                                                <span class="be-comment-time">
                                                    <i class="fa fa-clock-o"></i>
                                                    {{ $f_file->created_at->format('M d Y h:i a') }}
                                                </span>

                                            <p class="be-comment-text">
                                                {{ $f_file->financial  }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="forn-control">

                                            <a class="btn btn-outline-success btn-sm"
                                                href="{{ url('View_file') }}/{{ $f_file->upload_to }}/{{ $f_file->financial }}"
                                                target="_blank"
                                                ><i class="fas fa-eye"></i>&nbsp;
                                                Show File
                                            </a>
                                            <a class="btn btn-outline-warning btn-sm"
                                                    href="{{ url('download') }}/{{ $f_file->upload_to  }}/{{ $f_file->financial }}">
                                                    <i class="fas fa-download"></i>&nbsp;
                                                    Download File
                                            </a>
                                            <a class="btn btn-outline-info btn-sm"
                                                href="{{ route('users.show_financial_report',$f_file->id) }}">
                                                <i class="fas fa-comment"></i>&nbsp;
                                                Open Comments
                                            </a>
                                            @if(auth()->user()->id == $f_file->user_id)
                                            <button href="javascript:void(0)"
                                                onclick="if (confirm('Are you sure to delete this file?') ) { document.getElementById('user-delete-{{ $f_file->id }}').submit(); } else { return false; }"
                                                class="btn btn-outline-danger btn-sm "><i class="fa fa-trash"></i>
                                                Delete
                                            </button>
                                            <form action="{{ route('users.delete_file', $f_file->id) }}" method="post" id="user-delete-{{ $f_file->id }}" style="display: none;">
                                                        @csrf
                                                        @method('DELETE')
                                            </form>
                                            @endif
                                        </div>
                                    </div>
                                    <hr>
                                @empty
                                    <br>
                                    <h5 class="text-center">No Financial Report found</h5>
                                @endforelse
                            @endif
                        </div>
                    </div>
                    <br>
                    <div class="row card shadow mb-4">
                        <h3>Requirments Information Financial Report</h3>
                        <div class="form-control">
                            <div class="col-6">
                            <form action="{{ route('users.financial.store',auth()->user()->id) }}"  method="Post" autocomplete="off" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                        <div class="form-group">
                                            <label for="financial_report1" class="supo">Upload Requirments PDF</label>
                                            <br><br>
                                        <input type="file" name="financial_report1" class="form-control">
                                            @error('financial_report1')<span class="text-danger">{{ $message }}</span>@enderror
                                        </div>
                                </div>
                                <br>
                                <div class="row">
                                        <div class="form-group">
                                            <button type="submit" name="update_information" class="btn btn-primary">Upload File</button>
                                        </div>

                                </div>
                            </form>
                        </div>
                        </div>
                    </div>
                </div>
                <br>
                <p class="name-tit ">Financial Report</p>
                <hr class="redi">
                <div class="finn">

                                <div class="col-6">
                                    @if ($financial_file === null)
                                <div class="col-6">
                                    <div class="form-group">
                                    <h5 class="text-center">No Financial Report found</h5>
                                    </div>
                                </div>
                            @else

                                <div class="col-10">
                                    <div class="form-control">
                                        <p class="supo"> Name Financial Report: <span>{{ $financial_file->financial  }}</span> </p>
                                    <a class="btn btn-outline-success btn-sm"
                                        href="{{ url('View_file') }}/{{ $financial_file->upload_to }}/{{ $financial_file->financial }}"
                                        target="_blank"
                                        ><i class="fas fa-eye"></i>&nbsp;
                                        Show File Financial Report
                                    </a>
                                    <br>
                                    <br>
                                    <a class="btn btn-outline-info btn-sm"
                                            href="{{ url('download') }}/{{ $financial_file->upload_to  }}/{{ $financial_file->financial }}">
                                            <i class="fas fa-download"></i>&nbsp;
                                            Download File Financial Report
                                    </a>
                                    <br>
                                    <br>
                                    <a class="btn btn-outline-warning btn-sm"
                                        href="{{ route('users.show_financial_report',$financial_file->id) }}">
                                        <i class="fas fa-comment"></i>&nbsp;
                                        Comments on Financial Report
                                    </a>


                                    </div>
                                </div>
                                <br>
                            @endif
                                </div>
                </div>
            @endif
     <div class="container">
    <div class="be-comment-block">
        @if ($financial_file === null)
        <div class="col-6">
                    <div class="form-group">
                    <h5 class="text-center"></h5>
                    </div>
                </div>
        @else
            <h1 class="comments-title">{{ $comments->count() }} comment(s)</h1>
                @forelse ($comments as $comment)
                <div class="be-comment">
                    <div class="be-comment-content">

                            <span class="be-comment-name">
                                <a href="{{ $comment->url != '' ? $comment->url : '#' }}">{{ $comment->name }}</a>
                            </span>
                            <span class="be-comment-time">
                                <i class="fa fa-clock-o"></i>
                                {{ $comment->created_at->format('M d Y h:i a') }}
                            </span>

                        <p class="be-comment-text">
                            {{ $comment->comment }}
                        </p>
                    </div>
                </div>
                @empty
                    <p>No comments found.</p>
                @endforelse
        @endif


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



    <script src="https://kit.fontawesome.com/bc7e7f9f58.js" crossorigin="anonymous"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ url('js/lang_'.config('app.locale').'.js') }}"></script>
    <!-- Bootstrap core JavaScript -->
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

     <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
</body>


  </body>

</html>
