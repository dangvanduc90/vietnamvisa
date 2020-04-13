@extends('frontend.layouts.default')

@section('title')
    {{ trans('title.home') }}
@endsection

@section('content')

    <section class="slide">
        <div class="slide_home">
            <div class="item">
                <img src="{{asset('frontend/images/slide-home2.jpg')}}" alt="vietnam visa on arrival">
                <div class="box_descript">
                    <h3>vietnam visa on arrival</h3>
                    <p>Make your trip easy</p>
                    <div class="button_slide">
                        <a href="/en/how-to-apply" class="btn_apply_now howtoapply">How to Apply</a>
                        <a href="/en/apply-online" class="btn_apply_now btnappslide">Apply now <i class="fa fa-play-circle"
                                                                                                  aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <img src="{{asset('frontend/images/slide-home2.jpg')}}" alt="vietnam visa on arrival">
                <div class="box_descript">
                    <h3>vietnam visa on arrival</h3>
                    <p>Make your trip easy</p>
                    <div class="button_slide">
                        <a href="/en/how-to-apply" class="btn_apply_now howtoapply">How to Apply</a>
                        <a href="/en/apply-online" class="btn_apply_now btnappslide">Apply now <i class="fa fa-play-circle"
                                                                                                  aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="apply">
        <div class="container">
            <div class="title_home">
                <h3>Apply visa online</h3>
                <p> 4 steps to get vietnam visa on arrival at the airports</p>
            </div>
            <div class="list_step row">
                <div class="col-md-3 col-sm-6 step1">
                    <img class="img-responsive" src="{{asset('frontend/uploads/fill-out-online-form.png')}}"
                         alt="Fill out online form">
                </div>

                <div class="col-md-3 col-sm-6 step2">
                    <img class="img-responsive" src="{{asset('frontend/uploads/confirm-and-pay.png')}}"
                         alt="Fill out online form">
                </div>

                <div class="col-md-3 col-sm-6 step3">
                    <img class="img-responsive" src="{{asset('frontend/uploads/get-your.png')}}" alt="Fill out online form">
                </div>

                <div class="col-md-3 col-sm-6 step4">
                    <img class="img-responsive" src="{{asset('frontend/uploads/get-your-visa.png')}}"
                         alt="Fill out online form">
                </div>
            </div>
            <div class="list-button">
                <a href="" class="btn_apply_now">Apply now <i class="fa fa-play-circle" aria-hidden="true"></i></a>
                <a href="#why_chose_us" class="btn_why_chose_us">Why choose us?</a>
            </div>
        </div>
    </section>

    <section class="check_country">
        <div class="container">
            <div class="bg_check">
                <h3>Do I need Vietnam visa?</h3>
                <select class="sl_country" id="checkCountry">
                    <option value="">Select Nationality</option>
                    <option value="Vietnam">Vietnam</option>
                    <option value="Virgin Islands">Virgin Islands</option>
                    <option value="Wales">Wales</option>
                </select>
                <a href="javascript:;" id="countryStatus" class="apply_now"><i class="fa fa-search" aria-hidden="true"></i></a>
            </div>
        </div>
    </section>

    <section class="why_chose_us" id="why_chose_us">
        <div class="bg_why_chose">
            <div class="container">
                <div class="title_home">
                    <h3>Why choose us?</h3>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="icon-why">
                            <img src="{{asset('frontend/img/fixed-price.png')}}" alt="Fixed price and no hidden costs">
                            <h4>Fixed price and no hidden costs</h4>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="icon-why">
                            <img src="{{asset('frontend/img/client.png')}}" alt="Client focused service">
                            <h4>Client focused service</h4>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="icon-why">
                            <img src="{{asset('frontend/img/high-success.png')}}" alt="High success rate">
                            <h4>High success rate</h4>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="icon-why">
                            <img src="{{asset('frontend/img/quick-response.png')}}" alt="Quick response">
                            <h4>Quick response</h4>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="icon-why">
                            <img src="{{asset('frontend/img/safe-security.png')}}" alt="Safe and security">
                            <h4>Safe and security</h4>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="icon-why">
                            <img src="{{asset('frontend/img/competitive.png')}}" alt="Competitive price">
                            <h4>Competitive price</h4>
                        </div>
                    </div>
                </div>
                <div class="list-button">
                    <a href="https://vietnamvisavoa.com/en/apply-online" class="btn_apply_now">Apply now <i
                            class="fa fa-play-circle" aria-hidden="true"></i></a>
                    <a href="https://vietnamvisavoa.com/en/about-us" class="btn_why_chose_us">About Us</a>
                </div>
            </div>
        </div>
    </section>

    <section class="sec_declaimer">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="img_declaimer">
                        <img src="{{asset('frontend/img/bg-vnvisavoa.png')}}" alt="VIETNAMVISAVOA.COM DECLAIMER?"
                             class="img-responsive">
                        <div class="list-button">
                            <a href="#" class="btn_apply_now" data-toggle="modal" data-target="#showVideos">Video Visavoa <i
                                    class="fa fa-play-circle" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="title_home">
                        <h3>VIETNAMVISAVOA.COM<p>DECLAIMER?</p></h3>
                    </div>
                    <div class="content_declaimer">
                        <p>Vietnamvisavoa.com is a commercial website. .We are not the Embassy/Consulate/High Commission or
                            the representative of any Government Department of Vietnam. We provide expert guidance on
                            Vietnam visa applications. If you prefer a non-guided service, you can visit the Vietnam
                            Government.</p>
                        <p>Visa on arrival is a convenient way to get a visa to Vietnam for travelers who fly to Vietnam.
                            You will need to obtain an approval letter to check in at the departure airport and to pick up
                            the stamped visa once you arrive in Vietnam Airport. In order to get the visa approval letter,
                            you will need to fill out an online visa application form, pay for service fee online to get
                            visa letter issued by Vietnam Immigration via email in 1- 2 working days. You fly into Vietnam
                            with this document, upon arrival, you pay for stamping fee with 2 passport photos to get stamped
                            visa at Vietnam International airports.</p>
                    </div>
                    <div class="list-button">
                        <a href="https://vietnamvisavoa.com/en/apply-online" class="btn_apply_now">Apply now <i
                                class="fa fa-play-circle" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="hot_sale">
        <div class="container">
            <div class="title_home">
                <h3><span>Hot</span> sales Today</h3>
                <p>Get the best promotion and special sales to save money</p>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="item_hot">
                        <div class="image_box">
                            <a href="https://vietnamvisavoa.com/en/summer-hotsales-a200" title="Summer hotsales">
                                <img src="{{asset('frontend/uploads/files/cat-ba-island.jpg')}}" alt="Summer hotsales">
                            </a>
                        </div>
                        <div class="description">
                            <!-- <h5>from <strong><span>$</span>30</strong></h5> -->
                            <p></p>
                            <p>Summer promotion&nbsp;</p>..
                            <p></p>
                            <div class="list-button">
                                <a href="https://vietnamvisavoa.com/en/apply-online" class="btn_apply_now">Apply now <i
                                        class="fa fa-play-circle" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="item_hot">
                        <div class="image_box">
                            <a href="https://vietnamvisavoa.com/en/free-walking-streetfood-tour-a199"
                               title="Free walking streetfood tour ">
                                <img src="{{asset('frontend/uploads/files/vietnma foood.jpg')}}"
                                     alt="Free walking streetfood tour">
                            </a>
                        </div>
                        <div class="description">
                            <!-- <h5>from <strong><span>$</span>30</strong></h5> -->
                            <p></p>
                            <p>Free walking streetfood tour&nbsp;</p>..
                            <p></p>
                            <div class="list-button">
                                <a href="https://vietnamvisavoa.com/en/apply-online" class="btn_apply_now">Apply now <i
                                        class="fa fa-play-circle" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="item_hot">
                        <div class="image_box">
                            <a href="https://vietnamvisavoa.com/en/ramadan-promotion-a198" title="Ramadan Promotion ">
                                <img src="{{asset('frontend/uploads/files/Ramadan\'s promotion(1).jpg')}}"
                                     alt="Ramadan Promotion">
                            </a>
                        </div>
                        <div class="description">
                            <!-- <h5>from <strong><span>$</span>30</strong></h5> -->
                            <p></p>
                            <p>Ramadan promotion 2018&nbsp;</p>..
                            <p></p>
                            <div class="list-button">
                                <a href="https://vietnamvisavoa.com/en/apply-online" class="btn_apply_now">Apply now <i
                                        class="fa fa-play-circle" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="what_client_say">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="ykienkhachhang">
                        <div class="title_home">
                            <h3>What client say?</h3>
                            <p>See what our clients are saying about working with us</p>
                        </div>
                        <div class="client_say">
                            <div class="item">
                                <img src="{{asset('frontend/img/vote-mark.png')}}" alt="icon" class="icon_star">
                                <img src="{{asset('frontend/img/quote.png')}}" alt="icon" class="icon_quote">
                                <p>Thuy, you have helped us more than you will ever realize! We will definitely be back to
                                    visit Vietnam again and then it will be priority to come and visit you!</p>
                                <div class="box_image">
                                    <img src="{{asset('frontend/uploads/files/reliable-Vietnam-visa-service-3.jpg')}}"
                                         alt="Andreas from South Africa">
                                    <h3>Andreas from South Africa</h3>
                                </div>
                            </div>
                            <div class="item">
                                <img src="{{asset('frontend/img/vote-mark.png')}}" alt="icon" class="icon_star">
                                <img src="{{asset('frontend/img/quote.png')}}" alt="icon" class="icon_quote">
                                <p>Thuy, you have helped us more than you will ever realize! We will definitely be back to
                                    visit Vietnam again and then it will be priority to come and visit you!</p>
                                <div class="box_image">
                                    <img src="{{asset('frontend/uploads/files/reliable-Vietnam-visa-service-3.jpg')}}"
                                         alt="Andreas from South Africa">
                                    <h3>Andreas from South Africa</h3>
                                </div>
                            </div>
                            <div class="item">
                                <img src="{{asset('frontend/img/vote-mark.png')}}" alt="icon" class="icon_star">
                                <img src="{{asset('frontend/img/quote.png')}}" alt="icon" class="icon_quote">
                                <p>Thuy, you have helped us more than you will ever realize! We will definitely be back to
                                    visit Vietnam again and then it will be priority to come and visit you!</p>
                                <div class="box_image">
                                    <img src="{{asset('frontend/uploads/files/reliable-Vietnam-visa-service-3.jpg')}}"
                                         alt="Andreas from South Africa">
                                    <h3>Andreas from South Africa</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="blog">
        <div class="container">
            <div class="title_home">
                <h3>Visa news and Travel blog</h3>
                <p>Informative articles about Vietnam visa and travelling</p>
            </div>
            <div class="row">
                <div class="tab-news hidden-xs">
                    <ul class="nav nav-pills" role="tablist" id="homePills">
                        <li role="presentation" class="active"><a href="#cattab54" aria-controls="cattab54" role="tab"
                                                                  data-toggle="tab" aria-expanded="false">Vietnam visa
                                application form</a></li>
                        <li role="presentation"><a href="#cattab38" aria-controls="cattab38" role="tab" data-toggle="tab"
                                                   aria-expanded="false">Free download</a></li>
                        <li role="presentation"><a href="#cattab33" aria-controls="cattab33" role="tab" data-toggle="tab"
                                                   aria-expanded="false">Useful Information</a></li>
                        <li role="presentation"><a href="#cattab29" aria-controls="cattab29" role="tab" data-toggle="tab"
                                                   aria-expanded="true">About us</a></li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane fade in active" id="cattab54">
                            <div class="col-md-6 col-sm-6 col-lg-6">
                                <div class="news-item">
                                    <a href="#" title="" class="news-image">
                                        <img src="{{asset('frontend/img/blog-news-2.png')}}" alt="">
                                    </a>
                                    <div class="news-summary">
                                        <h3>
                                            <a href="#" title="">Legal basis for Vietnam visa on arrival at international
                                                airports...</a>
                                        </h3>
                                        <p class="hidden-sm hidden-xs">
                                            Vietnamese agencies and organizations, Vietnam - based foreign agencies and
                                            organizations as well as international organizations, Vietnamese...
                                        </p>
                                        <p class="pull-right">
                                            <a href="#" class="read-more"><i class="fa fa fa-eye"></i></a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-lg-6">
                                <div class="news-item">
                                    <a href="#" title="" class="news-image">
                                        <img src="{{asset('frontend/img/blog-news-3.png')}}" alt="">
                                    </a>
                                    <div class="news-summary">
                                        <h3>
                                            <a href="#" title="">Legal basis for Vietnam visa on arrival at international
                                                airports...</a>
                                        </h3>
                                        <p class="hidden-sm hidden-xs">
                                            Vietnamese agencies and organizations, Vietnam - based foreign agencies and
                                            organizations as well as international organizations, Vietnamese...
                                        </p>
                                        <p class="pull-right">
                                            <a href="#" class="read-more"><i class="fa fa fa-eye"></i></a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-xs-12">
                                <p>
                                    <a href="https://vietnamvisavoa.com/en/vietnam-visa-application-form-c54"
                                       class="see-all">View more</a>
                                </p>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="cattab38">
                            <div class="col-md-6 col-sm-6 col-lg-6">
                                <div class="news-item">
                                    <a href="#" title="" class="news-image">
                                        <img src="{{asset('frontend/img/blog-news-1.png')}}" alt="">
                                    </a>
                                    <div class="news-summary">
                                        <h3>
                                            <a href="#" title="">Legal basis for Vietnam visa on arrival at international
                                                airports...</a>
                                        </h3>
                                        <p class="hidden-sm hidden-xs">
                                            Vietnamese agencies and organizations, Vietnam - based foreign agencies and
                                            organizations as well as international organizations, Vietnamese...
                                        </p>
                                        <p class="pull-right">
                                            <a href="#" class="read-more"><i class="fa fa fa-eye"></i></a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-xs-12">
                                <p>
                                    <a href="https://vietnamvisavoa.com/en/vietnam-visa-application-form-c54"
                                       class="see-all">View more</a>
                                </p>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="cattab33">
                            <div class="col-md-6 col-sm-6 col-lg-6">
                                <div class="news-item">
                                    <a href="#" title="" class="news-image">
                                        <img src="{{asset('frontend/img/blog-news-4.png')}}" alt="">
                                    </a>
                                    <div class="news-summary">
                                        <h3>
                                            <a href="#" title="">Legal basis for Vietnam visa on arrival at international
                                                airports...</a>
                                        </h3>
                                        <p class="hidden-sm hidden-xs">
                                            Vietnamese agencies and organizations, Vietnam - based foreign agencies and
                                            organizations as well as international organizations, Vietnamese...
                                        </p>
                                        <p class="pull-right">
                                            <a href="#" class="read-more"><i class="fa fa fa-eye"></i></a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-xs-12">
                                <p>
                                    <a href="https://vietnamvisavoa.com/en/vietnam-visa-application-form-c54"
                                       class="see-all">View more</a>
                                </p>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="cattab29">
                            <div class="col-md-6 col-sm-6 col-lg-6">
                                <div class="news-item">
                                    <a href="#" title="" class="news-image">
                                        <img src="{{asset('frontend/img/blog-news-1.png')}}" alt="">
                                    </a>
                                    <div class="news-summary">
                                        <h3>
                                            <a href="#" title="">Legal basis for Vietnam visa on arrival at international
                                                airports...</a>
                                        </h3>
                                        <p class="hidden-sm hidden-xs">
                                            Vietnamese agencies and organizations, Vietnam - based foreign agencies and
                                            organizations as well as international organizations, Vietnamese...
                                        </p>
                                        <p class="pull-right">
                                            <a href="#" class="read-more"><i class="fa fa fa-eye"></i></a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-xs-12">
                                <p>
                                    <a href="https://vietnamvisavoa.com/en/vietnam-visa-application-form-c54"
                                       class="see-all">View more</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- MOBILE -->

            </div>
        </div>
    </section>

    <section class="partner">
    <div class="container">
        <div class="title_home">
            <h3>Our Partner</h3>
        </div>
        <div class="list_partner">
            <a href="">
                <img src="{{asset('frontend/img/1.png')}}" alt="">
            </a>
            <a href="">
                <img src="{{asset('frontend/img/1.png')}}" alt="">
            </a>
            <a href="">
                <img src="{{asset('frontend/img/1.png')}}" alt="">
            </a>
            <a href="">
                <img src="{{asset('frontend/img/1.png')}}" alt="">
            </a>
            <a href="">
                <img src="{{asset('frontend/img/1.png')}}" alt="">
            </a>
            <a href="">
                <img src="{{asset('frontend/img/1.png')}}" alt="">
            </a>
        </div>
    </div>
</section>

@endsection
