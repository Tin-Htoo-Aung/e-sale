@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row" style="background-color:white;">
        @foreach($sales as $sale)
        <div class="col-md-3 col-sm-12" style="float:left; padding-top:5px;">
            <h3> {{$sale->name}} </h3>
            <img src="{{Storage::url($sale->photo)}}" width="100%" height="100px;">
            <br>
            <b> Description: </b> <br>
            {{$sale->description}}
            <br>
            <b> Condition: </b> {{$sale->condition}}
            <br>
            <b> Price: </b> {{$sale->price}} Kyats
            <br>

            @if(($sale->user_id)==Auth::user()->id)                
                <font color="red"> <b> You Can't Buy Your Own Post! </b> </font>
            @else
                <form method="POST" action="{{ route('banks.store') }}" enctype="multipart/form-data">                    
                    @csrf
                    <button type="submit" class="btn btn-primary" style="color:white; background-color:#696969;">
                        Buy
                    </button>
                    <input type="text" name="seller" id="seller" hidden value="{{$sale->user_id}}">
                    <input type="text" name="itemprice" id="itemprice" hidden value="{{$sale->price}}">
                </form>
            @endif
        </div>
        @endforeach
    </div>
</div>
@endsection