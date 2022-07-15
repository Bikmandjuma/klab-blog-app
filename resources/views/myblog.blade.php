@extends('layouts.dashboard')
@section('content')

@php
use Illuminate\Support\Facades\Auth;
use App\Models\post;
@endphp

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (session('status'))
                <span class="alert alert-success" style="width:400px;">{{ session('status') }}</span>
            @endif  
            <div>
            <button style="margin-top:-20px;" class="btn btn-info text-white float-left" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i>&nbsp;Add blog</button> 
            </div>   
        <br>
            <div class="bg-success text-white text-center">My posted blog</div>
            <div class="card">
                <table class="table table-striped table-bordered">
                    
                    <tr>
                        <thead class="bg-info">
                            <th>image</th>
                            <th>Title</th>
                            <th>Content</th>
                            <th colspan="2">Action</th>
                        </thead>
                    </tr>
                    @php 
                        $id=Auth::user()->id;
                        $Count_Blog=post::all()->where('user_id','=',$id);
                        $count=collect($Count_Blog)->count();
                    @endphp

                    @if($count == 0)
                        <td colspan='4'>No posted blog found !</td>
                    @else
                        @foreach($Blog as $blogdata)
                            <tr>
                                <td><img src="{{URL::to('/')}}/images/blog/{{$blogdata->image}}" style="width:50px;height:50px;" class="img-circle"></td>
                                <td>{{$blogdata->title}}</td>
                                <td>{{$blogdata->content}}</td>
                                <td><button class="btn btn-primary"><a href="editblog/{{$blogdata->id}}" style="color:white;">Update</a></button> </td>
                                <td><button class="btn btn-danger"><a href="deleteblog/{{$blogdata->id}}" style="color:white;" onclick="return confirm('Are u sure !')">Delete</a></button> </td>
                            </tr>
                        @endforeach 
                    @endif                  
                      
                </table>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection
