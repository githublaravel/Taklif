@extends('admin.layout.master')
@section('style')
    <style>
        form {
            margin-top: 40px;
            margin: auto;
            width: 30%;
        }

        .input-group {
            margin-top: 30px;

        }
        .card{
            margin-top:10px;
        }
    </style>
@endsection
@section('body')
    <div class="container">
        <form action="/admin/category/image/{{ $id }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                </div>
                <div class="custom-file">
                    <input type="file" name="image" class="custom-file-input" id="inputGroupFile01"
                        aria-describedby="inputGroupFileAddon01">
                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-block">save</button>
        </form>
        <div class="row">
            @foreach ($images as $image)
                <div class="col-md-4">
                    <div class="card">
                        <img class="card-img-top" src="{{ asset($image->image) }}" alt="">
                        <div class="card-body">
                            <h5 class="card-title">Title</h5>
                            <p class="card-text">Content</p>
                        </div>
                    </div>
                </div>
            @endforeach
                
        </div>

    </div>
@endsection
