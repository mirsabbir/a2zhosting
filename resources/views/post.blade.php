@extends('layouts.app')

@push('js')
<script src="{{asset('js/app.js')}}"></script>
@endpush


@push('css')
<link rel="stylesheet" href="{{asset('css/app.css')}}">
@endpush


@push('title')
<title>{{ $post->title }}</title>
@endpush



@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-8">
            <section class="blog_single">
                <div class="content_heading">
                    <h4>{{$post->title}}</h4>
                </div>
                <div class="blog_single_content">
                    <figure>
                        <a href=""><img src="{{asset($post->image)}}" alt="image"></a>
                        <figcaption>
                            <i>Admin • {{$post->created_at}}</i>
                        </figcaption>
                    </figure>
                    {!! $post->body !!}
                    
                </div>
                
                @include('layouts.related')

            </section>
        </div>

        @include('layouts.aside')

        @if(\Auth::check())
            <form action="/posts/{{$post->slug}}/edit" method="get" style="margin:5px;">
                @csrf
                <input type="submit" class="btn btn-primary" value="Edit">
            </form>
            <form action="/posts/{{$post->slug}}" method="post" style="margin:5px;">
                @csrf
                @method('DELETE')
                <input type="submit" class="btn btn-danger" value="Delete">
            </form>
        @endif
    </div>
    </div>

@endsection

