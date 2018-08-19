@extends('layouts.app')

@push('js')
<script src="{{asset('js/app.js')}}"></script>
@endpush


@push('css')
<link rel="stylesheet" href="{{asset('css/app.css')}}">
@endpush


@push('title')
<title>All posts</title>
@endpush




@section('content')


<!-- main body -->
<div class="container">
    <div class="row">
        <div class="col-lg-8">
            <section class="blog">
                <div class="content_heading">
                    <h2>Recent posts</h2>
                </div>
                <div class="search_blog">
                    @if(!sizeof($results))
                        <div>
                            <h3 class="alert-success text-center">No results</h3>
                        </div>
                    @endif
                    @foreach($results as $result)
                    <div class="blog_content">
                        <div class="latest_result_all">
                            <div class="row">
                                <div class="col-3">
                                    <a href="{{'/'.$result->category->name.'/'.$result->slug}}"><img src="{{asset($result->image)}}" alt=""></a>
                                </div>
                                <div class="col-9">
                                    <a href="{{'/'.$result->category->name.'/'.$result->slug}}"><h5>{{$result->title}}</h5></a>
                                    <p>{!! substr(strip_tags($result->body),0,90) !!}<a href="single-blog.html"><span>read more &rarr;</span></a> </p>
                                    <i>Admin • {{$result->created_at}}</i>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <div class="row">
                        <div style="margin:0 auto">
                            {{$results->links()}}
                        </div>
                    </div>
                </div>

            </section>
        </div>

        @include('layouts.aside')
    </div>
    </div>





@endsection
