<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="TemplateMo">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <title>Education Meeting HTML5 Template</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.css') }}">

    <link rel="stylesheet" href="assets/css/templatemo-edu-meeting.css">
    <link rel="stylesheet" href="{{ asset('assets/css/templatemo-edu-meeting.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/owl.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/lightbox.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"crossorigin="anonymous"></script>

  </head>

<body>

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky">
      <div class="container">
          <div class="row">
              <div class="col-12">
                  <nav class="main-nav">
                      <!-- ***** Logo Start ***** -->
                      <a href="index.html" class="logo">
                          <img src="{{ asset('assets/images/logo.png') }}" style="width: 70%;">
                      </a>
                      <!-- ***** Logo End ***** -->
                      <!-- ***** Menu Start ***** -->
                      <ul class="nav">
                          <li class="scroll-to-section"><a href="#top" class="active">Home</a></li>
                          <li class="has-sub">
                              <a href="javascript:void(0)">Services</a>
                              <ul class="sub-menu">
                                  @foreach ($services as $service )
                                  <li><a href="meetings.html">{{ $service->name }}</a></li>

                                  @endforeach
                              </ul>
                          </li>
                          <li class="scroll-to-section"><a href="#courses">Blogs</a></li>
                          <li class="scroll-to-section"><a href="#contact">Contact Us</a></li>
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

  <!-- ***** Main Banner Area Start ***** -->
  <section class="section main-banner" id="top" data-section="section1">
      <video autoplay muted loop id="bg-video">
          <source src="{{ asset('assets/images/2.mp4') }}" type="video/mp4" />
      </video>

      <div class="video-overlay header-text">
          <div class="container">
            <div class="row">
              <div class="col-lg-12">
                <div class="caption">
              <!-- <h6>Hello Students</h6> -->
              <h2>VAT CONSULTATION
                AUDIT & ASSURANCE</h2>
              <p>external & internal audit
                We will help you identify The potential financial challenges you may face in the implementation of vat.


                 </p>
              <div class="main-button-red">
                  <div class="scroll-to-section"><a href="#contact">Sign in</a></div>
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
        @forelse($posts as $post)
            <div class="item">
              <div class="icon">

                <a href="{{ route('frontend.posts.show', $post->url_slug()) }}">
                            @if($post->media->count() > 0)
                                <img src="{{ asset('assets/posts/' . $post->media->first()->file_name) }}" alt="{{ $post->title() }}">
                            @else
                                <img src="{{ asset('assets/posts/default.jpg') }}" alt="blog images">
                            @endif
                        </a>
              </div>
              <div class="down-content">
                <h4><a {{ route('frontend.posts.show', $post->url_slug()) }}>{{ $post->title() }}</a></h4>
                <p>{!! \Illuminate\Support\Str::limit($post->description(), 145, '...') !!}</p>
              </div>
            </div>

        @empty
                <div class="text-center">No Posts found</div>
        @endforelse
{{--
            <div class="item">
              <div class="icon">
                <!-- <img src="assets/images/blog/blog (1).jpg" alt=""> -->
              </div>
              <div class="down-content">
                <h4>Title Blog</h4>
                <p>Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis enim velit mollit. Exercitation veniam consequat sunt nostrud amet.nsequat duis enim velit mollit. Exercitation veniam consequat sunt nostrud amet.</p>
              </div>
            </div>


            <div class="item">
              <div class="icon">
                <!-- <img src="assets/images/blog/blog (1).jpg" alt=""> -->
              </div>
              <div class="down-content">
                <h4>Title Blog</h4>
                <p>Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis enim velit mollit. Exercitation veniam consequat sunt nostrud amet.nsequat duis enim velit mollit. Exercitation veniam consequat sunt nostrud amet.</p>
              </div>
            </div>


            <div class="item">
              <div class="icon">
                <!-- <img src="assets/images/blog/blog (1).jpg" alt=""> -->
              </div>
              <div class="down-content">
                <h4>Title Blog</h4>
                <p>Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis enim velit mollit. Exercitation veniam consequat sunt nostrud amet.nsequat duis enim velit mollit. Exercitation veniam consequat sunt nostrud amet.</p>
              </div>
            </div>


            <div class="item">
              <div class="icon">
                <!-- <img src="assets/images/blog/blog (1).jpg" alt=""> -->
              </div>
              <div class="down-content">
                <h4>Title Blog</h4>
                <p>Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis enim velit mollit. Exercitation veniam consequat sunt nostrud amet.nsequat duis enim velit mollit. Exercitation veniam consequat sunt nostrud amet.</p>
              </div>
            </div> --}}



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
                  <ul>
                    <li data-filter="*"  class="active">All Meetings</li>
                    <li data-filter=".soon">Soon</li>
                    <li data-filter=".imp">Important</li>
                    <li data-filter=".att">Attractive</li>
                  </ul>
                </div>
              </div>
              <div class="col-lg-12">
                <div class="row">
                  <div class="col-lg-8 dewll all soon">
                    <div class="client">
                      <img src="/assets/images/blog/img-01.png">
                      <div class="cl-tit wify">
                          <p class="client-tit">
                              Audit clientes
                          </p>
                          <p class="client-con">
                              Elementum interdum malesuada velit amet dapibus Elementum interdum malesuada vel ...
                          </p>
                      </div>
                  </div>

                  <div class="client">
                    <img src="/assets/images/blog/img-01.png">
                    <div class="cl-tit wify">
                        <p class="client-tit">
                            Audit clientes
                        </p>
                        <p class="client-con">
                            Elementum interdum malesuada velit amet dapibus Elementum interdum malesuada vel ...
                        </p>
                    </div>
                </div>
                  <div class="client">
                    <img src="/assets/images/blog/img-01.png">
                    <div class="cl-tit wify">
                        <p class="client-tit">
                            Audit clientes
                        </p>
                        <p class="client-con">
                            Elementum interdum malesuada velit amet dapibus Elementum interdum malesuada vel ...
                        </p>
                    </div>
                </div>
                  <div class="client">
                    <img src="/assets/images/blog/img-01.png">
                    <div class="cl-tit wify">
                        <p class="client-tit">
                            Audit clientes
                        </p>
                        <p class="client-con">
                            Elementum interdum malesuada velit amet dapibus Elementum interdum malesuada vel ...
                        </p>
                    </div>
                </div>
                  <div class="client">
                    <img src="/assets/images/blog/img-01.png">
                    <div class="cl-tit wify">
                        <p class="client-tit">
                            Audit clientes
                        </p>
                        <p class="client-con">
                            Elementum interdum malesuada velit amet dapibus Elementum interdum malesuada vel ...
                        </p>
                    </div>
                </div>
                  <div class="client">
                    <img src="/assets/images/blog/img-01.png">
                    <div class="cl-tit wify">
                        <p class="client-tit">
                            Audit clientes
                        </p>
                        <p class="client-con">
                            Elementum interdum malesuada velit amet dapibus Elementum interdum malesuada vel ...
                        </p>
                    </div>
                </div>
                  <div class="client">
                    <img src="/assets/images/blog/img-01.png">
                    <div class="cl-tit wify">
                        <p class="client-tit">
                            Audit clientes
                        </p>
                        <p class="client-con">
                            Elementum interdum malesuada velit amet dapibus Elementum interdum malesuada vel ...
                        </p>
                    </div>
                </div>
                  <div class="client">
                    <img src="/assets/images/blog/img-01.png">
                    <div class="cl-tit wify">
                        <p class="client-tit">
                            Audit clientes
                        </p>
                        <p class="client-con">
                            Elementum interdum malesuada velit amet dapibus Elementum interdum malesuada vel ...
                        </p>
                    </div>
                </div>
                  <div class="client">
                    <img src="/assets/images/blog/img-01.png">
                    <div class="cl-tit wify">
                        <p class="client-tit">
                            Audit clientes
                        </p>
                        <p class="client-con">
                            Elementum interdum malesuada velit amet dapibus Elementum interdum malesuada vel ...
                        </p>
                    </div>
                </div>

                  </div>
                  <div class="col-lg-4 imp">
                  <div class=" templatemo-item-col ">
                    <div class="meeting-item blogs">
                      <div class="blogs">
                        <div class="lod">
                          <div class="immmg"></div>
                          <div class="containt">
                            <p class="titles"> Lorem ipsum</p>
                            <p class="supi">dolor sit amet consectetur adipisicing elit. Eaque voluptates dolor illo fugit ipsa eum laudantium deleniti quidem saepe, id consectetur earum blanditiis ipsum odit architecto ea minus tenetur vitae?</p>
                          </div>
                        </div>
                        <div class="lod">
                          <div class="immmg"></div>
                          <div class="containt">
                            <p class="titles"> Lorem ipsum</p>
                            <p class="supi">dolor sit amet consectetur adipisicing elit. Eaque voluptates dolor illo fugit ipsa eum laudantium deleniti quidem saepe, id consectetur earum blanditiis ipsum odit architecto ea minus tenetur vitae?</p>
                          </div>
                        </div>
                        <div class="lod">
                          <div class="immmg"></div>
                          <div class="containt">
                            <p class="titles"> Lorem ipsum</p>
                            <p class="supi">dolor sit amet consectetur adipisicing elit. Eaque voluptates dolor illo fugit ipsa eum laudantium deleniti quidem saepe, id consectetur earum blanditiis ipsum odit architecto ea minus tenetur vitae?</p>
                          </div>
                        </div>
                        <div class="lod">
                          <div class="immmg"></div>
                          <div class="containt">
                            <p class="titles"> Lorem ipsum</p>
                            <p class="supi">dolor sit amet consectetur adipisicing elit. Eaque voluptates dolor illo fugit ipsa eum laudantium deleniti quidem saepe, id consectetur earum blanditiis ipsum odit architecto ea minus tenetur vitae?</p>
                          </div>
                        </div>
                        <div class="lod">
                          <div class="immmg"></div>
                          <div class="containt">
                            <p class="titles"> Lorem ipsum</p>
                            <p class="supi">dolor sit amet consectetur adipisicing elit. Eaque voluptates dolor illo fugit ipsa eum laudantium deleniti quidem saepe, id consectetur earum blanditiis ipsum odit architecto ea minus tenetur vitae?</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                </div>
              </div>
              <div class="col-lg-12">
                <div class="pagination">
                  <ul>
                    <li><a href="#">1</a></li>
                    <li class="active"><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
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
            <div class="owl-courses-item owl-carousel">


            @forelse ($services as $service )
              <div class="servic">
                <svg class="wi" viewBox="0 0 138 138" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle opacity="0.08" cx="69" cy="69" r="69" fill="#8B1613" fill-opacity="0.98" />
                    <path
                        d="M101.001 77.1065H87.4635C82.4929 77.1034 78.464 73.0776 78.4609 68.107C78.4609 63.1363 82.4929 59.1105 87.4635 59.1074H101.001"
                        stroke="url(#paint0_linear_105_11625)" stroke-width="5" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M88.9934 67.9014H87.9512" stroke="url(#paint1_linear_105_11625)" stroke-width="5"
                        stroke-linecap="round" stroke-linejoin="round" />
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M54.548 39H83.4514C93.1427 39 100.999 46.8567 100.999 56.548V80.5478C100.999 90.2391 93.1427 98.0958 83.4514 98.0958H54.548C44.8567 98.0958 37 90.2391 37 80.5478V56.548C37 46.8567 44.8567 39 54.548 39Z"
                        stroke="url(#paint2_linear_105_11625)" stroke-width="5" stroke-linecap="round" stroke-linejoin="round" />
                    <path opacity="0.4" d="M52.168 54.1758H70.2219" stroke="url(#paint3_linear_105_11625)" stroke-width="5"
                        stroke-linecap="round" stroke-linejoin="round" />
                    <defs>
                        <linearGradient id="paint0_linear_105_11625" x1="105.349" y1="77.1065" x2="71.3684" y2="74.4986"
                            gradientUnits="userSpaceOnUse">
                            <stop stop-color="#BA0F0F" />
                            <stop offset="1" stop-color="#8A2422" />
                        </linearGradient>
                        <linearGradient id="paint1_linear_105_11625" x1="89.1945" y1="68.9014" x2="87.6204" y2="68.8008"
                            gradientUnits="userSpaceOnUse">
                            <stop stop-color="#BA0F0F" />
                            <stop offset="1" stop-color="#8A2422" />
                        </linearGradient>
                        <linearGradient id="paint2_linear_105_11625" x1="113.344" y1="98.0958" x2="16.719" y2="91.6826"
                            gradientUnits="userSpaceOnUse">
                            <stop stop-color="#BA0F0F" />
                            <stop offset="1" stop-color="#8A2422" />
                        </linearGradient>
                        <linearGradient id="paint3_linear_105_11625" x1="73.7042" y1="55.1758" x2="61.3957" y2="41.5568"
                            gradientUnits="userSpaceOnUse">
                            <stop stop-color="#BA0F0F" />
                            <stop offset="1" stop-color="#8A2422" />
                        </linearGradient>
                    </defs>
                </svg>
                <div class="ser-txt">

                    <p class="tit">
                        {{ $service->name }}
                    </p>
                    <p class="con">
                        {{ $service->description }}
                    </p>

                </div>
                <svg class="ki" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                  <rect width="40" height="40" transform="matrix(-1 8.74228e-08 8.74228e-08 1 40 0)" fill="url(#pattern0)" fill-opacity="0.33"/>
                  <defs>
                  <pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1" height="1">
                  <use xlink:href="#image0_18_7827" transform="scale(0.0111111)"/>
                  </pattern>
                  <image id="image0_18_7827" width="90" height="90" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAFoAAABaCAYAAAA4qEECAAAABmJLR0QA/wD/AP+gvaeTAAABPUlEQVR4nO3asUoDQQAG4YmFUfC9tRCxtclDWATfyEoQFSzPQishiYjO4jofpLviZzj2UiwkSZIkSZLkr1kDl8AD8ALcAKdDF01oDWyB5dPvZuSo2eyKvABPA3dNZV/kBXgcN20ehyIvwNWwdZP4SuTtx3P5pmPglv2R74CTUQNnUGRBkQVFFhRZUGRBkQVFFhRZUGRBkQVFFhRZUGRBkQVFFhRZUGRBkQVFFhRZUGRBkQVFFnS5RXJBkRX3/NPj4mj0gPyOczo6FH0MRf29ExVbVGxRsUXFFhVbVGxRsUXFFhVbVGxRsUXFFhVbVGxRsUXFFhVbVGxRsUXFFhVbVGxRsUVd0hF9Jfb1sHWTORT7GVgNWzeZfbFf6Tbtj9oVezNy1KzWvJ/Jz7y/yRvgbOiiya3oXE6SJEmSZGZvirMNXP4WmKAAAAAASUVORK5CYII="/>
                  </defs>
                  </svg>
            </div>
            @empty
            <div class="text-center">not fount any services</div>
            @endforelse


            </div>
          </div>
        </div>
      </div>
    </section>
  </section>

  <section class="contact-us" id="contact">

    <div class="footer">
      <div class="footer-flex">
        <div class="logo"><img src="/assets/images/logo.png"></div>
        <div class="sections">
          <p class="pold mpo">Explore More </p>
          <a href="index.html">Home</a>
          <a href="index.html">Services</a>
          <a href="index.html">Blogs</a>
          <a href="index.html">Contact Us</a>
        </div>
        <div class="contact">
          <p class="pold">Contact Us </p>
          <div class="vivi">

            <div class="add">
              <svg width="20" height="24" viewBox="0 0 20 24" fill="none" xmlns="http://www.w3.org/2000/svg"> <g filter="url(#filter0_d_53_7908)"> <path d="M14 9C14 15 8 21 8 21C8 21 2 15 2 9C2 7 3.5 3 8 3C12.5 3 14 7 14 9Z" stroke="white" stroke-linejoin="round"/> </g> <g filter="url(#filter1_d_53_7908)"> <circle cx="8" cy="9" r="2" stroke="white" stroke-linejoin="round"/> </g> <defs> <filter id="filter0_d_53_7908" x="0.5" y="2.5" width="15" height="21" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB"> <feFlood flood-opacity="0" result="BackgroundImageFix"/> <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/> <feOffset dy="1"/> <feGaussianBlur stdDeviation="0.5"/> <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.1 0"/> <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_53_7908"/> <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_53_7908" result="shape"/> </filter> <filter id="filter1_d_53_7908" x="4.5" y="6.5" width="7" height="7" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB"> <feFlood flood-opacity="0" result="BackgroundImageFix"/> <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/> <feOffset dy="1"/> <feGaussianBlur stdDeviation="0.5"/> <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.1 0"/> <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_53_7908"/> <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_53_7908" result="shape"/> </filter> </defs>
              </svg>
               <p class="coni">
                  Office No. 203 Al Mulla Building, AlMuteena P. O. Box: 25256 Dubai, United Arab Emirates
                </p>
            </div>

            <div class="add">

              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g filter="url(#filter0_d_53_7922)">
                <path d="M3 18V6C3 5.44772 3.44772 5 4 5H20C20.5523 5 21 5.44772 21 6V18C21 18.5523 20.5523 19 20 19H4C3.44772 19 3 18.5523 3 18Z" stroke="white" stroke-linejoin="round"/>
                </g>
                <g filter="url(#filter1_d_53_7922)">
                <path d="M3.5 5.5L12 12L20.5 5.5" stroke="white" stroke-linejoin="round"/>
                </g>
                <defs>
                <filter id="filter0_d_53_7922" x="1.5" y="4.5" width="21" height="17" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                <feOffset dy="1"/>
                <feGaussianBlur stdDeviation="0.5"/>
                <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.1 0"/>
                <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_53_7922"/>
                <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_53_7922" result="shape"/>
                </filter>
                <filter id="filter1_d_53_7922" x="2.19629" y="5.10254" width="19.6074" height="9.39746" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                <feOffset dy="1"/>
                <feGaussianBlur stdDeviation="0.5"/>
                <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.1 0"/>
                <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_53_7922"/>
                <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_53_7922" result="shape"/>
                </filter>
                </defs>
                </svg>

                             <p class="coni">
                              Tel: +971-4-3964900 <br>
                              Fax: +971-4-3965025
                              </p>
               </div>


            <div class="add">

                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M17.3332 13.1004V15.6004C17.3341 15.8325 17.2866 16.0622 17.1936 16.2749C17.1006 16.4875 16.9643 16.6784 16.7933 16.8353C16.6222 16.9922 16.4203 17.1116 16.2005 17.186C15.9806 17.2603 15.7477 17.288 15.5165 17.2671C12.9522 16.9884 10.489 16.1122 8.32486 14.7087C6.31139 13.4293 4.60431 11.7222 3.32486 9.70874C1.91651 7.53474 1.04007 5.05957 0.76653 2.48374C0.745705 2.2533 0.773092 2.02104 0.846947 1.80176C0.920801 1.58248 1.03951 1.38098 1.1955 1.21009C1.3515 1.0392 1.54137 0.902664 1.75302 0.809175C1.96468 0.715685 2.19348 0.667291 2.42486 0.667073H4.92486C5.32928 0.663093 5.72136 0.806305 6.028 1.07002C6.33464 1.33373 6.53493 1.69995 6.59153 2.10041C6.69705 2.90046 6.89274 3.68601 7.17486 4.44207C7.28698 4.74034 7.31125 5.0645 7.24478 5.37614C7.17832 5.68778 7.02392 5.97383 6.79986 6.20041L5.74153 7.25874C6.92783 9.34503 8.65524 11.0724 10.7415 12.2587L11.7999 11.2004C12.0264 10.9764 12.3125 10.8219 12.6241 10.7555C12.9358 10.689 13.2599 10.7133 13.5582 10.8254C14.3143 11.1075 15.0998 11.3032 15.8999 11.4087C16.3047 11.4658 16.6744 11.6697 16.9386 11.9817C17.2029 12.2936 17.3433 12.6917 17.3332 13.1004Z" stroke="white" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"/>
                  </svg>

               <p class="coni">
                info@daralnuzum.com
                </p>
            </div>


            <div class="add">

              <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M10.0003 15.8337C13.222 15.8337 15.8337 13.222 15.8337 10.0003C15.8337 6.77866 13.222 4.16699 10.0003 4.16699C6.77866 4.16699 4.16699 6.77866 4.16699 10.0003C4.16699 13.222 6.77866 15.8337 10.0003 15.8337Z" stroke="white" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M10 7.5V10L11.25 11.25" stroke="white" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M13.7584 14.458L13.4667 17.6497C13.4292 18.0652 13.2371 18.4516 12.9286 18.7324C12.62 19.0132 12.2173 19.168 11.8001 19.1664H8.19173C7.77451 19.168 7.37182 19.0132 7.06323 18.7324C6.75465 18.4516 6.56261 18.0652 6.52507 17.6497L6.2334 14.458M6.24173 5.54136L6.5334 2.34969C6.57082 1.93559 6.76167 1.55043 7.06849 1.26982C7.37531 0.989205 7.77594 0.833413 8.19173 0.833022H11.8167C12.234 0.831329 12.6366 0.986187 12.9452 1.267C13.2538 1.54781 13.4459 1.93415 13.4834 2.34969L13.7751 5.54136" stroke="white" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>

               <p class="coni">
                Mon - Sat | 9am - 6pm
                </p>
            </div>
          </div>

        </div>
      </div>
      <hr class="zizi">
      <p>© 2022 Dar AlNuzum All Rights Reserved. </p>

    </div>
  </section>

  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>

    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>

    <script src="{{ asset('assets/js/isotope.min.js') }}"></script>
    <script src="{{ asset('assets/js/owl-carousel.js') }}"></script>
    <script src="{{ asset('assets/js/lightbox.js') }}"></script>
    <script src="{{ asset('assets/js/tabs.js') }}"></script>
    <script src="{{ asset('assets/js/video.js') }}"></script>
    <script src="{{ asset('assets/js/slick-slider.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
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
</body>

</body>
