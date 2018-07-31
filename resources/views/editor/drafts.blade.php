@extends('layouts.app')

@push('js')
<script src="{{asset('js/app.js')}}"></script>
@endpush


@push('css')
<link rel="stylesheet" href="{{asset('css/app.css')}}">
@endpush


@push('title')
<title>Drafts</title>
@endpush




@section('content')


<!-- main body -->
<div class="container">
    <div class="row">
        <div class="col-lg-8">
            <section class="blog">
                <div class="content_heading">
                    <h2>Drafts</h2>
                </div>
                <div class="search_blog">
                    @if(!sizeof($drafts))
                        <div>
                            <h3 class="alert-success text-center">No drafts</h3>
                            <a href="/drafts/create">new draft</a>
                        </div>
                    @else
                    <a href="/drafts/create">new draft</a>
                    @foreach($drafts as $draft)
                    <div class="blog_content">
                        <div class="latest_draft_all">
                            <div class="row">
                                <div class="col-3">
                                    <a href="{{'/'.'drafts/'.$draft->slug}}"><img src="{{asset($draft->image)}}" alt=""></a>
                                </div>
                                <div class="col-9">
                                    <a href="{{'/'.'drafts/'.$draft->slug}}"><h5>{{$draft->title}}</h5></a>
                                    <p>{!! substr(strip_tags($draft->body),0,90) !!}<a href="single-blog.html"><span>read more &rarr;</span></a> </p>
                                    <i>Admin • {{$draft->created_at}}</i>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif
                    <div class="row">
                        <div style="margin:0 auto">
                            {{$drafts->links()}}
                        </div>
                    </div>
                </div>

            </section>
        </div>

        @include('layouts.aside')
    </div>
    </div>





@endsection
