@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="text-align: center;">
                <div class="card-header" style="text-align: center; font-size: 40px ">ADDRESS </div>

                <div class="card-body" >
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
@if($add)
                 <div class="add" style="text-align: left;">
                    <h2>House NO.  ::<span style="font-size: 30px;">{{$add->id}}</span></h2>
                    <br>
                    <h2>Area/Colony  ::<span style="font-size: 30px;">{{$add->area}}</span></h2>
                    <br>
                    <h2>House/Flat NO.  ::<span style="font-size: 30px;">{{$add->colony}}</span></h2>
                    <br>
                    <h2>Full Adress  ::<span style="font-size: 30px;">{{$add->Mainadd}}</span></h2>
                    @else
                    <h3><a href="/update" > Enter Your Address </a></h3>
@endif
                


                 </div>
                   
                </div>
            </div>
        </div>
    </div>

@endsection
