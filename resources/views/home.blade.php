@extends('layouts.dashboard')
@section('content')
@php
use Illuminate\Support\Facades\Auth;
use App\Models\follow;
@endphp
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8" style="">
            <div class="text-center" style="overflow:auto;font-size:25px;"><strong>All users</strong></div><br>
                @foreach($users as $blogdata)

                    <div class="card text-center" style="float:left;border:2px solid skyblue;">
                    <a href="{{route('UserBlog',Crypt::encryptString($blogdata->id))}}" title="click to view blog">
                        <div class="card-body bg-info">
                            <img src="{{URL::to('/')}}/images/user/{{$blogdata->image}}" class="img-circle elevation-2" alt="User Image" style="width:120px;height:120px;border-radius:50%;border:4px solid skyblue;">
                        </div>
                    </a>
                        <div>
                            <b style="font-size:20px;">{{$blogdata->name}}</b>
                        <br>
                            <!-- <p><i class="fa fa-facebook fw" ></i>&nbsp;<i class="fa fa-instagram"></i>&nbsp;<i class="fa fa-linkdin"></i></p> -->
                        <br>
                            <?php
                                $user=Auth::user()->id;
                                $flw=follow::all()->where('user',$user)->where('following',$blogdata->id)->where('follow',1);
                                $count=collect($flw)->count();
                                if($count == 0){
                                ?>
                                    <a href='Follow/{{$blogdata->id}}'><button class="btn btn-primary">Follow</button></a>
                                <?php
                                }else{
                                ?>
                                    <a href="{{route('delete',$blogdata->id)}}"><button class="btn btn-danger">Unfollow</button></a>
                                <?php
                                }
                            ?> 
                            <br><br>
                        </div>
                    </div>
                    <div style="float:left;width:30px;">&nbsp;&nbsp;</div>

                @endforeach
                @foreach($users as $blogdata)
                <div style="background-color:#777;width:400px;height:200px;visibility:hidden"></div>
                @endforeach
                <!-- <table> -->
             
        </div>
    </div>
</div>
@endsection