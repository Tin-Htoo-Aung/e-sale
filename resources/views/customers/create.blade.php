@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row" style="padding-left:50px; background-color:white;">
        <font color="red"> <b> You have to regiser a credit/debit card to access the dashboard... </b> </font>
        
    </div>
    <div class="row" style="padding-left:50px; background-color:white;">        
            <form method="POST" action="{{ route('customers.store') }}" enctype="multipart/form-data">
                @csrf
                <br>
                <div class="col-md-12 div-col-sm-12">
                    <h4 style="color:black;"> Register Payment: </h4>
                </div>
                <br>
                <div class="col-md-12 div-col-sm-12">
                    Card Number: <input id="cardno" name="cardno" type="text" class="form-control" placeholder="1111 1111 1111 1111">
                </div>
                <br>
                <div class="col-md-12 div-col-sm-12">
                    CVV: <input id="cvv" name="cvv" type="text" class="form-control" placeholder="123">
                </div>
                <br>
                <div class="col-md-12 div-col-sm-12">
                    Exp Date: <input id="exp" name="exp" type="text" class="form-control" placeholder="11/21">
                </div>
                <br>
                <div class="col-md-12 div-col-sm-12">                    
                    <button type="submit" class="btn btn-primary" style="color:white; background-color:#696969;">
                        Register
                    </button>
                </div>
                <br>
            </form>
    </div>
</div>
@endsection