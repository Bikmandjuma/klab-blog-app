@extends('layouts.dashboard')
@section('content')
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
     
            <div class="card">
                <div class="card-header">
                    <h4>Edit & Update User</h4>
                </div>
                <div class="card-body">

                    <form action="{{route('user',$user->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="text" name="name" value="{{$user->id}}" hidden>
                        <div class="form-group mb-3">
                            <label for="">Name</label>
                            <input type="text" name="name" value="{{$user->name}}" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Email</label>
                            <input type="email" name="email" value="{{$user->email}}" class="form-control">
                        </div>
                     
                        <div class="form-group mb-3">
                            <label for="">picture</label>
                            <input type="file" name="Upload_image" value="{{$user->image}" class="form-control">
                            <button type="submit" class="btn btn-primary">Update User</button>
                        </div>
                    </form>
        </div>
        <div class="col-md-4"></div>
    </div>
@endsection
