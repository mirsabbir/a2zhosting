@extends('layouts.app')

@push('js')
<script src="{{asset('js/app.js')}}"></script>
@endpush


@push('css')
<link rel="stylesheet" href="{{asset('css/app.css')}}">
@endpush


@push('title')
<title>Editorial panel</title>
@endpush




@section('content')

<section class="blog">
<div class="container">
    <div class="row">
        <div class="col">
            <form action="/posts/create" >
                <input type="hidden" name="_rsr" value="p">
                <input type="submit" class="btn btn-primary" value="Create post">
            </form>
            
        </div>
        <div class="col">
            <form action="/drafts" >
                <input type="hidden" name="_rsr" value="p">
                <input type="submit" class="btn btn-primary" value="Drafts">
            </form>
        </div>
        <div class="col">
            <form action="/drafts/create" >
                <input type="hidden" name="_rsr" value="p">
                <input type="submit" class="btn btn-primary" value="New Draft">
            </form>
        </div>
    </div>
</div>
</section>




@endsection
