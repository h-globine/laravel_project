@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Post</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @foreach($posts as $post)
                            <h1>{{$post->post_title}}</h1>
                            <h3>{{$post->post_body}}</h3>
                            <p>{{$post->category->category}}</p>
                            <img src="{{$post->post_image}}">
                        @endforeach

                            <form method="POST" action="{{ url('/addPost') }}">
                                @csrf
                                @if(count($errors) > 0)
                                    @foreach($errors->all as $error)
                                        <div class="alert alert-danger">{{$error}}</div>
                                    @endforeach
                                @endif

                                @if(session('response'))
                                    <div class="alert alert-success">{{session('response')}}</div>
                                @endif

                                <div class="form-group row">
                                    <label for="post_title" class="col-md-4 col-form-label text-md-right"> Post title</label>
                                    <div class="col-md-6">
                                        <input id="post_title" type="text" class="form-control @error('post_title') is-invalid @enderror" name="post_title" value="{{ old('post_title') }}" required autocomplete="post_title" autofocus>

                                        @error('post_title')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="post_body" class="col-md-4 col-form-label text-md-right"> Post body</label>
                                    <div class="col-md-6">
                                        <input id="post_body" type="text" class="form-control @error('post_body') is-invalid @enderror" name="post_body" value="{{ old('post_body') }}" required autocomplete="post_body" autofocus>

                                        @error('post_title')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="category_id" class="col-md-4 col-form-label text-md-right"> Post body</label>
                                    <div class="col-md-6">
                                        <select id="category_id" class="form-control @error('category_id') is-invalid @enderror" name="category_id" value="{{ old('category_id') }}" required autocomplete="category_id" autofocus>
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}">{{$category->category}}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="form-group row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            Add
                                        </button>
                                    </div>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
