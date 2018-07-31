@extends('layouts.app')

@push('js')
<script src="{{asset('js/app.js')}}"></script>
@endpush


@push('css')
<link rel="stylesheet" href="{{asset('css/app.css')}}">
@endpush


@push('title')
<title>{{ $category->name }} - A2Z hosting</title>
@endpush




@section('content')



<!-- main body -->
<div class="container">
    <div class="row">
        <div class="col-lg-8">
            <section class="blog">
                <div class="content_heading">
                    <h2>Review Blog</h2>
                </div>
                <div class="row">
                    @foreach($posts as $post)
                    <div class="col-lg-6">
                        <div class="blog_content">
                            <figure>
                                <a href="{{'/'.$category->name.'/'.$post->slug}}"><img src="{{asset($post->image)}}" alt="image"></a>
                                <figcaption>
                                    <a href="{{'/'.$category->name.'/'.$post->slug}}"><h4>{{$post->title}}</h4></a>
                                    <p>{!!substr(strip_tags($post->body),0,120)!!}
                                    <a href="{{'/'.$category->name.'/'.$post->slug}}"><span>read more &rarr;</span></a> </p>
                                    <i>Admin • {{$post->created_at}}</i>
                                </figcaption>
                            </figure>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="row ">
                    <div style="margin:0 auto;">
                        {{$posts->links()}}
                    </div>
                </div> 

            </section>
        </div>

        @include('layouts.aside')
    </div>
    </div>



@endsection
