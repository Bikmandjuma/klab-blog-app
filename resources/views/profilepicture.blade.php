@extends('layouts.dashboard')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        @if (session('status'))
            <h6 class="alert alert-success">{{ session('status') }}</h6>
        @endif    
        <br>
            <div class="card" style="border:2px solid skyblue;">
                @foreach($profile as $info)
                    <div class="card-header bg-info text-white">Profile 's info</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6" style="width:200px;height:200px;">
                            <img src="{{URL::to('/')}}/images/user/{{Auth::user()->image}}" class="img-circle elevation-2" alt="User Image" style="width:150px;height:150px;border-radius:50%;border:4px solid skyblue;">
                            </div>
                            <div class="col-md-6" style="font-size:20px;">
                                <span class='float-left'><b>Name : </b>{{$info->name}}</span><br><br>
                                <span class='float-left'><b>Email : </b>{{$info->email}}</span>
                            </div>
                            <div class="card-body"><button class="btn btn-success"><a href="{{ url('edit-user/'.$info->id) }}" style="color:white;">Change info</button></div>
                        </div>             
                @endforeach
            </div>
            </div>
        </div>
    </div>
</div>
@endsection