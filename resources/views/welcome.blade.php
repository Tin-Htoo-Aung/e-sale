@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @guest
        <br> <br>
            <div class="col-md-4" style="float:left;" width="100%" height="200px;">
                <a href="https://ooredoo.com.mm/portal/en/index"> <img src="/images/ad1.jpg"> </a> 
            </div>
            <div class="col-md-4">
                <a href="https://tgb.qq.com/en/games/pubg.html"> <img src="/images/ad2.jpeg" style="float:left;" width="100%" height="200px;"> </a>
            </div>
            <div class="col-md-4">
                <a href="https://www.carsdb.com/en"> <img src="/images/ad3.jpg" width="100%" height="200px;"> </a>
            </div>
        </div>

        <hr>
        <div class="row justify-content-center">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/yezLC1aNT6o" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
        @else
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="background-color:#696969; color:white;">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <font color="black"> You are logged in! Go To Your Dashboard </font>
                    
                    <a href="{{route('customers.index')}}">
                        <button type="submit" class="btn btn-primary" style="color:white; background-color:#696969;">
                            {{ __('Enter') }}
                        </button>
                    </a>
                </div>
            </div>
        </div>
        @endguest
    </div>
    <div class="row justify-content-center" style="background-color:white; color:#696969;">
                <div class="col-md-5" style="padding-top:10px; padding-left:50px;">
                    <b> Address: </b> <br>
                    Room 146, Excel Tower, Tarmwe, Yangon, Myanmar.
                    <br> <br>
                    <b> Phone: </b> <br>
                    01665888 <br>
                    09786150334 <br>
                    09786150335
                    <br> <br>
                    <b> Email: </b> <br>
                    contact@esale.com.mm <br>
                    customersupport@esale.com.mm 
                    <br> <br>
                </div>
                <br>
                <div class="col-md-7">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3819.375195385258!2d96.15275711434573!3d16.807732923688317!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30c1eca7ce820ac5%3A0x45c1cce36ac7aa62!2sExcel%20Hotel!5e0!3m2!1sen!2smm!4v1570169967855!5m2!1sen!2smm" width="100%" height="300" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                </div>
            </div>
        </div>
</div>
@endsection
