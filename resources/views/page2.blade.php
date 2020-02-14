@extends('layout.master')
@section('content')
<div style="background: #785a3e;" class="pt-10 pb-10">
    <h4 class="text-center text-white" >Thank You for Subscribing</h4>
</div>

    <div  style="padding: 60px; color:  #785a3e; background-image: -webkit-linear-gradient(0deg, #3ea7ff 0%, #42d1ff 100%);">

        <div class="container">

            <div class="row">

            <div class="col-md-6">
                <img src="{{asset('img/coffee.png')}}"  class=" mx-auto d-block" alt="">
            </div>
            <div class="col-md-6">
                <h3>DON'T LEAVE YOUR FRIENDS BEHIND</h3>
                <h1>INVITE FRIENDS AND EARN PRODUCT</h1>
                <p>Share your unique link via email, facebook or Twitter and earn goods for each friends who sign up</p>
                <input type="text" class="form-control" value="{{url('/?referral_code='.Auth::user()->referral_code)}}">
                <div class="text-center mt-10">



                </div>

            </div>

            </div>
        </div>
    </div>
    <section class="ps-timeline-sec">
        <div class="container">
            <h2 class="text-center mt-10">HERE'S HOW IT WORKS</h2>

            <div class="card-group">
                <div class="card text-white bg-dark mb-3">
                    <div class="card-header">People Ahead</div>
                    <div class="card-body">

                        <h5 class="card-title">{{$position}}</h5>


                    </div>
                </div>
                <div class="card text-white bg-dark mb-3">
                    <div class="card-header">Referrals</div>
                    <div class="card-body">
                        <h5 class="card-title">{{Auth::user()->children()->count()}}</h5>
                    </div>
                </div>
                <div class="card text-white bg-dark mb-3">
                    <div class="card-header">Referrals</div>
                    <div class="card-body">
                        <h5 class="card-title">{{Auth::user()->children()->count()}}</h5>

                    </div>
                </div>
            </div>

           <h4>Your Referrals: {{Auth::user()->children()->count()}}</h4>
            <ol class="ps-timeline">
                <li>

                    <div class="ps-bot text-center"  style="color: #0b0b0b;width: 100%;">
                        <p class="">Gift 1</p>
                    </div>
                    <span class="ps-sp-top">5</span>
                </li>
                <li>

                    <div class="ps-bot text-center"  style="color: #0b0b0b;width: 100%;">
                        <p>Gift 2</p>
                    </div>
                    <span class="ps-sp-top">10</span>
                </li>
                <li>

                    <div class="ps-bot text-center"  style="color: #0b0b0b;width: 100%;">
                        <p>Gift 3</p>
                    </div>
                    <span class="ps-sp-top">25</span>
                </li>
                <li>

                    <div class="ps-bot text-center"  style="color: #0b0b0b;width: 100%;">
                        <p>Gift 4</p>
                    </div>
                    <span class="ps-sp-top">50</span>
                </li>

            </ol>
        </div>
    </section>
    <script>
        function setCookie(cname, cvalue, exdays) {
            var d = new Date();
            d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
            var expires = "expires=" + d.toGMTString();
            document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
        }

        function getCookie(cname) {
            var name = cname + "=";
            var decodedCookie = decodeURIComponent(document.cookie);
            var ca = decodedCookie.split(';');
            for (var i = 0; i < ca.length; i++) {
                var c = ca[i];
                while (c.charAt(0) == ' ') {
                    c = c.substring(1);
                }
                if (c.indexOf(name) == 0) {
                    return c.substring(name.length, c.length);
                }
            }
            return "";
        }

        function checkCookie() {
            var user = getCookie("username");
            if (user != "") {
                alert("Welcome again " + user);
            } else {
                user = prompt("Please enter your name:", "");
                if (user != "" && user != null) {
                    setCookie("username", user, 30);
                }
            }
        }
    </script>
    <!-- Load Facebook SDK for JavaScript -->

@endsection
