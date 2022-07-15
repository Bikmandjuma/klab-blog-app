@extends('layouts.dashboard')
@section('content')
@php
use Illuminate\Support\Facades\Auth;
use App\Models\follow;
use App\Models\post;
@endphp
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        @if (session('status'))
            <h6 class="alert alert-success">{{ session('status') }}</h6>
        @endif    
        <br>
            <div class="card" style="border:2px solid skyblue;">
                    <div class="card-header text-white" style="background-color:teal; font-size:20px;">{{Auth::user()->name}}'s account</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                            <img src="{{URL::to('/')}}/images/user/{{Auth::user()->image}}" style="border:2px solid skyblue;width:200px;height:200px;border-radius:50%;" class="img-circle elevation-2" alt="User Image">
                            </div>
                            <div class="col-md-6" style="font-size:20px;">

                                <div class='row'>
                                    <div class='col-md-4'>
                                        
                                        <?php
                                            $user=Auth::user()->id;
                                            $posts=post::all()->where('user_id',$user);
                                            $count_post=collect($posts)->count();
                                        ?>
                                        <p><b>{{$count_post}}</b></p>
                                        <p>Posts</p>

                                    </div>
                                    <div class='col-md-4'>
                                        
                                        <?php
                                            $user=Auth::user()->id;
                                            $flw_user=follow::all()->where('following',$user)->where('follow',1);
                                            $count_user=collect($flw_user)->count();
                                        ?>
                                        <p><b>{{$count_user}}</b></p>
                                        <p>Followers</p>

                                    </div>
                                    <div class='col-md-4'>

                                         <?php
                                            $user=Auth::user()->id;
                                            $flw=follow::all()->where('user',$user)->where('follow',1);
                                            $count_follow=collect($flw)->count();
                                        ?>
                                        <p><b>{{$count_follow}}</b></p>
                                        <p>Following</p>

                                    </div>

                                </div>

                                <!--followed by -->
                                <div class='row'>
                                    <div class='col-md-4'></div>
                                    <div class='col-md-4'></div>
                                    <div class='col-md-4'></div>
                                </div>
                                <!--end followed by -->
                            
                            </div>
                            <div class="card-body"><button class="btn btn-danger"><a href="{{ url('deleteaccount/'.Auth::user()->id)}}" style="color:white;" onclick="return confirm('Do u want to delete your account ?')">Delete my Account </button></div>
                        </div>             
            </div>
            </div>
        </div>
    </div>
</div>
@endsection