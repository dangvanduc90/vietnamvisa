<section class="header">
    <div class="top">
        <div class="container">
            <div class="left_top">
                <a href="tel:+84.969.255.515">
                    <span class="phone"><i class="fa fa-phone" aria-hidden="true"></i></span> +84.969.255.515 </a>
                <a class="hidden_mobile" href="mailto:support@vietnamvisavoa.com">
                    <span class="email"><i class="fa fa-envelope" aria-hidden="true"></i></span> +
                    support@vietnamvisavoa.com </a>
                <a class="hidden_mobile" href="skype:VietnamvisaVOA?chat">
                    <span class="skype"><i class="fa fa-skype" aria-hidden="true"></i></span> VietnamvisaVOA </a>
            </div>
            <div class="right_head">
                <div class="top_head">
                    <div class="lang">
                        <div id="google_translate_element"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="banner_head">
        <div class="container">
            <div class="banner">
                <div class="logo">
                    <a href="https://vietnamvisavoa.com/"
                       title="Vietnam visa on arrival for Tourist, Business &amp; Work - Vietnamvisavoa">
                        <img src="{{asset('frontend/images/logo-viet-nam-visa-voa.png')}}"
                             alt="Vietnam visa on arrival for Tourist, Business &amp; Work - Vietnamvisavoa">
                    </a>
                </div>
                <div class="menu">
                    <a class="btn_menu_mobile"><img src="{{asset('frontend/img/btn_menu_mobile.png')}}" alt="icon menu">
                    </a>
                    <ul class="nav_menu">
                        <li><a href="https://vietnamvisavoa.com/en/home" title="Home">Home</a></li>
                        <li><a href="https://vietnamvisavoa.com/en/how-to-apply" title="How to apply ">How to apply </a>
                        </li>
                        <li><a href="https://vietnamvisavoa.com/en/visa-fees" title="Visa Fees">Visa Fees</a></li>
                        <li><a href="https://vietnamvisavoa.com/en/extra-services" title="Extra Services">Extra
                                Services</a></li>
                        <li><a href="https://vietnamvisavoa.com/en/blog" title="Blog">Blog</a></li>
                        <li class="check_status"><a href="#" data-toggle="modal" data-target="#checkStatus">Check
                                status</a></li>
                        <a class="login hidden_pc" href="#" data-toggle="modal" data-target="#showLogin">
                            <i class="fa fa-lock" aria-hidden="true"></i> Login </a>
                        <a class="register hidden_pc" href="#" data-toggle="modal" data-target="#showRegister">
                            <i class="fa fa-plus" aria-hidden="true"></i> Sign up
                        </a>
                        <li style="display: none;"><a href="https://www.halongbaycruisedeals.com/"
                                                      title="Halong Bay Cruise">Halong Bay Cruise</a></li>
                    </ul>
                </div>
            </div>
            <div class="right_head">
                <div class="top_head">
                    <div class="user">
                        @guest
                        <a class="login hidden_mobile" href="#" data-toggle="modal" data-target="#showLogin">
                            <i class="fa fa-lock" aria-hidden="true"></i> Login </a>
                        <a class="register hidden_mobile" href="#" data-toggle="modal" data-target="#showRegister">
                            <i class="fa fa-plus" aria-hidden="true"></i> Sign up
                        </a>
                        @else
                        <a class="login hidden_mobile infomation" href="{{ route('profile') }}">
                            <i class="fa fa-user" aria-hidden="true"></i>  Hi <span>{{ Auth::user()->email }}</span>
                        </a>
                        <span>|</span>
                        <a href="{{ route('post.user.logout') }}" class="logout">Log out</a>
                        @endguest
                        <a href="https://vietnamvisavoa.com/en/apply-online" class="btn_apply">Apply Online</a>
                    </div>

                </div>

            </div>
        </div>
    </div>
</section>
