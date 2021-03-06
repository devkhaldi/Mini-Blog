@extends('layouts.theme') 
@section('content')
    
<div class="container">
    <form action="{{route('posts.store')}}" method="POST" class="col-md-6 offset-3" enctype="multipart/form-data">
        @csrf
        @if (count($errors))
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="form-group">
            <label for="title">Enter post title</label>
            <input name="title" id="title" type="text" class="form-control">
        </div>
        <div class="form-group">
            <label for="content">Enter post content</label>
            <textarea name="content" id="content" class="form-control" rows="10"></textarea>
        </div>
        <div class="form-group">
            <label for="file">Choose Main post photo</label>
            <input type="file" name="photo" class="form-control" id="file">
        </div>
        <div class="form-group">
            <label for="category">Select post category</label>
            <select name="category_id" class="form-control" id="category">
                @foreach ($categories as $category)
                    <option value="{{$category->id}}"> {{$category->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="file">Chose post Medias</label>
            <input type="file" name="postFiles[]" class="form-control" id="file" multiple>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-success btn-sm"/>
            <input type="reset"  class="btn btn-warning btn-sm"/>
        </div>
        
    </form>
</div>

@endsection