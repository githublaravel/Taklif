@extends('admin.layout.master')
@section('style')
<style>
    form{
        margin-top: 40px;
        margin: auto;
        width: 30%;
    }
    .form-group{
        margin-top: 20px;
        
        }
</style>
@endsection
@section('body')
<div class="container">
    <form action="/admin/category/create" method="post">
        @csrf
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <h4>{{$error}}</h4>   
            @endforeach
        @endif
        <div class="form-group">
          <label for="category"><h6>Category Name:</h6></label>
          <input type="text"
            class="form-control" name="name" id="category" aria-describedby="helpId" placeholder="">
        </div>
        <button type="submit" class="btn btn-primary btn-block">Create</button>
    </form>
</div>
@endsection