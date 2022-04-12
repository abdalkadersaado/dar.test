<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Contact Us</title>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

     <link
      href="https://fonts.googleapis.com/css?family=Roboto:400,100,300,700"
      rel="stylesheet"
      type="text/css"
    />

    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
    />

     <style>
    @import url('http://fonts.cdnfonts.com/css/gotham');
    </style>

<!-- Bootstrap core CSS -->
<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
<link rel="stylesheet" href="{{ asset('frontend/css/style-'. $dir_lang .'.css') }}">
<!-- Additionala CSS Files -->

<link rel="stylesheet" href="{{ asset('assets/css/fontawesome.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/css/owl.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/css/lightbox.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/css/navi.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/stylecontact.css') }}" />



    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      crossorigin="anonymous"
    />
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
      crossorigin="anonymous"
    ></script>
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
        .header-area .main-nav .nav li a{
            color: #000
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
    <div id="contact">
      <section class="ftco-section">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-md-12">
              <div class="wrapper">
                <div
                  class="row no-gutters mb-5"
                  data-aos="fade-up"
                  data-aos-duration="1000"
                >
                  <div class="col-md-7">
                    <div class="contact-wrap w-100 p-md-5 p-4">
                      <h3 class="mb-4">Contact Us</h3>
                      <div id="form-message-warning" class="mb-4"></div>
                      <div id="form-message-success" class="mb-4">
                        Your message was sent, thank you!
                      </div>
                      <form
                        action="{{ route('frontend.do_contact') }}"
                        method="POST"
                        {{-- id="contactForm" --}}
                        name="contactForm"
                        class="contactForm"
                      >
                      @csrf
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="label" for="name">{{ __('Frontend/general.Full_Name') }}</label>
                              <input
                                type="text"
                                class="form-control"
                                name="name"
                                id="name"
                                placeholder="Name"
                              />
                              @error('name')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="label" for="email"
                                >{{ __('Frontend/general.Email') }}</label
                              >
                              <input
                                type="email"
                                class="form-control"
                                name="email"
                                id="email"
                                placeholder="Email"
                              />
                              @error('email')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="label" for="subject">{{ __('Frontend/general.Subject') }}</label>
                              <input
                                type="text"
                                class="form-control"
                                name="title"
                                id="subject"
                                placeholder="Subject"
                              />
                              @error('title')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="label" for="email"
                                >{{ __('Frontend/general.Mobile_Number') }}</label
                              >
                              <input
                                type="number"
                                name="mobile"
                                class="form-control"
                                id="mobile"
                                placeholder="Mobile Number"
                              />
                              @error('mobile')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="form-group">
                              <label class="label" for="message">{{ __('Frontend/general.Message') }}</label>
                              <textarea
                                name="message"
                                class="form-control"
                                id="message"
                                cols="30"
                                rows="4"
                                placeholder="Message"
                              ></textarea>
                              @error('message')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="form-group">
                              {{-- <input type="submit" value="Send Message" class="btn btn-primary"/> --}}
                              <button type="submit" class="btn btn-primary">{{ __('Frontend/general.send_Message') }}</button>
                              <div class="submitting"></div>
                            </div>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                  <div class="col-md-5 d-flex align-items-stretch">
                    <div id="map"></div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-3">
                    <div
                      class="dbox w-100 text-center"
                      data-aos="fade-up"
                      data-aos-duration="2000"
                    >
                      <div
                        class="icon d-flex align-items-center justify-content-center"
                      >
                        <span class="fa fa-map-marker"></span>
                      </div>
                      <div class="text">
                        <p>
                          OFFICE NO. 203 AL MULLA BUILDING, ALMUTEENA P. O. BOX:
                          25256 DUBAI, UNITED ARAB EMIRATES
                        </p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div
                      class="dbox w-100 text-center"
                      data-aos="fade-up"
                      data-aos-duration="2000"
                    >
                      <div
                        class="icon d-flex align-items-center justify-content-center"
                      >
                        <span class="fa fa-phone"></span>
                      </div>
                      <div class="text">
                        <p>
                          <a href="tel:+971-4-3964900">TEL: +971-4-3964900</a>
                          <br /><a href=" ">FAX: +971-4-3965025</a>
                        </p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div
                      class="dbox w-100 text-center"
                      data-aos="fade-up"
                      data-aos-duration="2000"
                    >
                      <div
                        class="icon d-flex align-items-center justify-content-center"
                      >
                        <span class="fa fa-paper-plane"></span>
                      </div>
                      <div class="text">
                        <p>
                          <a href="mailto:info@daralnuzum.com"
                            >INFO@DARALNUZUM.COM
                          </a>
                        </p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div
                      class="dbox w-100 text-center"
                      data-aos="fade-up"
                      data-aos-duration="2000"
                    >
                      <div
                        class="icon d-flex align-items-center justify-content-center"
                      >
                        <span class="fa fa-globe"></span>
                      </div>
                      <div class="text">
                        <p>MON - SAT | 9AM - 6PM</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>

    <section class="contact-us" id="contact">
      @include('dar_al_nuzum.partial.footer_daralnuzum')
    </section>



  <!-- Scripts -->
    <!-- Bootstrap core JavaScript -->
     <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ url('js/lang_'.config('app.locale').'.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    @jquery
    @toastr_js
    @toastr_render
    <script src="{{ asset('assets/js/isotope.min.js') }}"></script>
    <script src="{{ asset('assets/js/owl-carousel.js') }}"></script>
    <script src="{{ asset('assets/js/lightbox.js') }}"></script>
    <script src="{{ asset('assets/js/tabs.js') }}"></script>
    <script src="{{ asset('assets/js/video.js') }}"></script>
    <script src="{{ asset('assets/js/slick-slider.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.validate.min.js') }}"></script>

    <script>
       // Initialize and add the map
function initMap() {
  // The location of Uluru
  const uluru = { lat: 25.2739142, lng: 55.3281456 };
  // The map, centered at Uluru
  const map = new google.maps.Map(document.getElementById("map"), {
    zoom: 4,
    center: uluru,
  });
  // The marker, positioned at Uluru
  const marker = new google.maps.Marker({
    position: uluru,
    map: map,
  });
}
   </script>

    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&callback=initMap&v=weekly"
      async
    ></script>

    <script src="{{ asset('assets/js/google-map.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script>
      AOS.init();
    </script>
  </body>
</html>
