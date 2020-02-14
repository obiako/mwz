@extends('layout.master')
@section('content')

    <!-- start banner Area -->
    <section class="banner-area" id="home">

        <div class="container">
            <div class="pull-right mt-100 ">
                <h1 class="badge badge-light"  style="font-size: 36px;" title="persons waiting">{{$waiting_list}}</h1>
            </div>

            <div class="row justify-content-end fullscreen align-items-center">
                <div class="col-lg-6 col-md-12 banner-left">
                    <h1 class="text-white">
                        The Best App <br>
                        in the Universe
                    </h1>

                    <div class="single-footer-widget newsletter">

                        <h4 style="color:#777777!important;font-size: 20px;">BECOME SMARTER IN JUST 5 MINUTES</h4>
                        <p style="font-size: 16px;">Get the daily email that makes reading the news actually enjoyable. Stay informed and entertained, for free.</p>


                        <div id="mc_embed_signup">
                            <form novalidate="true" action="{{url('subscribe')}}" method="post" class="form-inline">
                                @csrf
                                <div class="form-group row" style="width: 100%">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="input-group mb-2 mr-sm-2">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="fa fa-key fa-2x pr-2" style="color: #785a3e;"></i></div>
                                            </div>
                                            <input name="email" placeholder="Enter Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Email '" required="true" type="email" style="width: 100%;border-radius: 0px;">
                                            <div class="input-group-append">
                                                <button class="btn  "  style="color: #fff;
    background-color: #785a3e;
    border-color: #785a3e;border-radius: 0px;">Step Inside</button>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="info"></div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 no-padding banner-right">
                    <img class="img-fluid" src="{{asset('img/coffee2.png')}}" alt="">
                </div>
            </div>
        </div>
    </section>
    <!-- End banner Area -->
    @endsection
