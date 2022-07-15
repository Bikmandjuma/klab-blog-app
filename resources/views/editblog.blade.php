@extends('layouts.dashboard')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8" style="">

            <div class="card" style="border:2px solid skyblue;">
                <div class="card-header bg-info text-white">
                    <h4>Edit & Update blog</h4>
                </div>
                <div class="card-body">

                    <form action="{{route('blog',$blog->id) }}" method="POST">
                        @csrf
                        <input type="text" name="name" value="{{$blog->id}}" hidden>
                        <div class="form-group mb-3">
                            <label for="">Title</label>
                            <input type="text" name="title" value="{{$blog->title}}" class="form-control" style="border:2px solid skyblue;">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Content</label>
                            <input type="text" name="content" value="{{$blog->content}}" class="form-control" style="border:2px solid skyblue;">
                        </div>
                        
                        <div class="form-group mb-3">
                            <label for="">Image</label>
                            <input type="file" name="Upload_image" value="{{$blog->image}" class="form-control" style="border:2px solid skyblue;">
                            <br>
                            <button type="submit" class="btn btn-primary">Save change</button>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
