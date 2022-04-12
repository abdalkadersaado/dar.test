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
