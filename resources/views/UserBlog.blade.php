@extends('layouts.dashboard')
@section('content')
@php
use Illuminate\Support\Facades\Auth;
use App\Models\post;
@endphp
<div class="container">
    <div class="row">
        <div class="col-md-3"></div>            
        <div class="col-md-6">
            @foreach($blog as $blogdata)
                <?php
                    $user=Auth::user()->id;
                    $blogs=post::all()->where('id',$blogdata->id);
                    $count=collect($blogs)->count();
                    if($count == 0){
                        echo "No blog found !";
                    }else{
                ?>
                    <div class="card">
                        <div class="card-header bg-success text-white">{{$blogdata->title}}</div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <img src="{{URL::to('/')}}/images/blog/{{$blogdata->image}}" style="width:50px;length:50px;"><br>
                                
                                    </div>
                                    <div class="col-md-6">
                                        {{$blogdata->content}}      
                                    </div>
                                </div>

                                <br>

                                <div class="row">
                                    <div class="col-md-12">
                                        <form action="{{ route('like.post', $blogdata->id) }}" method="post">
                                            @csrf
                                            <button  class="{{ $blogdata->liked() ? '' : '' }} bg-success text-white btn">Like</button>&nbsp;&nbsp;<span class="badge badge-info"> {{ $blogdata->likeCount }}</span>
                                        </form>
                                    </div>
                                </div>

                            </div>
                    </div>
                        <br>
                    <?php
                    }
                    ?>
            @endforeach

        </div>      
        <div class="col-md-3"></div>            
    </div>
</div>
@endsection