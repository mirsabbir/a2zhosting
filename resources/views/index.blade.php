@extends('layouts.app')

@push('js')
<script src="{{asset('js/app.js')}}"></script>
@endpush


@push('css')
<link rel="stylesheet" href="{{asset('css/app.css')}}">
@endpush


@push('title')
<title>A2Z hosting </title>
@endpush




@section('content')
 <!-- header section start here -->
        <header>
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="header_text">
                            <h1>Lorem ipsum dolor sit amet </h1>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci harum vel animi maxime molestiae deleniti et doloremque, ad commodi saepe eius soluta tenetur facilis nulla exercitationem eum omnis.</p>
                            <button class="btn">Best Hosting Service</button>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="header_image">
                            <img src="images/header.png" alt="image">
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- header section end here -->




         <!-- slider section start here -->
         <section class="slider">
            <div class="container">
                <div id="demo" class="carousel slide" data-ride="carousel">

                    
                    <!-- The slideshow -->
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="row">
                                @for($i=0;$i<4;$i++)
                                <?php 
                                    $post = $populars[0]->posts[$i];
                                ?>
                                 
                                <div class="col-lg-3 col-6">
                                    <figure>
                                        <img src="{{asset($post->image)}}" alt="images">
                                        <p>{{$populars[0]->name}} post</p>
                                        <figcaption>
                                            <a href="{{'/'.$populars[0]->name.'/'.$post->slug}}"><h6>{{$post->title}}</h6></a>
                                        </figcaption>
                                    </figure>
                                </div>
                                @endfor
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row">
                                
                                @for($i=0;$i<4;$i++)
                                <?php 
                                    $post = $populars[1]->posts[$i];
                                ?>
                                
                                <div class="col-lg-3 col-6">
                                    <figure>
                                        <img src="{{asset($post->image)}}" alt="images">
                                        <p>{{$populars[1]->name}} post</p>
                                        <figcaption>
                                            <a href="{{'/'.$populars[1]->name.'/'.$post->slug}}"><h6>{{$post->title}}</h6></a>
                                        </figcaption>
                                    </figure>
                                </div>
                                @endfor
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row">
                                @for($i=0;$i<4;$i++)
                                <?php 
                                    $post = $populars[2]->posts[$i];
                                ?>
                                 
                                <div class="col-lg-3 col-6">
                                    <figure>
                                        <img src="{{asset($post->image)}}" alt="images">
                                        <p>{{$populars[2]->name}} post</p>
                                        <figcaption>
                                            <a href="{{'/'.$populars[2]->name.'/'.$post->slug}}"><h6>{{$post->title}}</h6></a>
                                        </figcaption>
                                    </figure>
                                </div>
                                @endfor
                                

                            </div>
                        </div>
                    </div>
                    
                    <!-- Indicators -->
                    <ul class="carousel-indicators">
                        <li data-target="#demo" data-slide-to="0" class="active"></li>
                        <li data-target="#demo" data-slide-to="1"></li>
                        <li data-target="#demo" data-slide-to="2"></li>
                    </ul> 
                        
                </div>
            </div>
         </section>
        <!-- slider section end here -->



        <!-- latest post section start here -->
        <section class="latest">
            <div class="container">
                <div class="row">
                    @for($i=0;$i<3;$i++)
                    <?php 
                        $latest = $latests[$i];
                    ?>
                    <div class="col-lg-4">
                        <div class="latest_post">
                            <div class="heading">
                                <h5>POPULAR {{$latest->name}}</h5>
                            </div>
                            @for($j=0;$j<4;$j++)
                            <?php 
                                $post = $latest->posts[$j];
                            ?>
                            <div class="latest_post_all">
                                <div class="row">
                                    <div class="col-3">
                                        <a href="{{'/'.$latest->name.'/'.$post->slug}}"><img src="{{asset($post->image)}}" alt="images"></a>
                                    </div>
                                    <div class="col-9">
                                        <a href="{{'/'.$latest->name.'/'.$post->slug}}"><h6>{{$post->title}}</h6></a>
                                        <i>Admin • {{$post->created_at}}</i>
                                    </div>
                                </div>
                            </div>
                            @endfor
                            <a href="{{'/'.$latest->name}}"><button>BROWSE MORE</button></a>
                        </div>
                    </div>
                    @endfor
                </div>
            </div>
        </section>
        <!-- latest blog section end here -->



        <!-- about section start-->
        <section class="about">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <h2>About Us</h2>
                        <p> <strong>Lorem ipsum dolor sit amet consectetur:</strong> adipisicing elit. Blanditiis cupiditate exercitationem at aut quia. Est recusandae aperiam doloribus ullam magnam eligendi voluptates earum, commodi iusto hic quas blanditiis, harum aspernatur!</p>
                        <p style="margin-bottom: 30px;"> <strong>Lorem ipsum dolor sit amet:</strong> consectetur adipisicing elit. Quibusdam alias eligendi quidem? Cumque facilis sed nemo corrupti assumenda porro consequuntur? Optio non voluptates itaque rerum eaque doloribus facilis nostrum adipisci?</p>
                    </div>
                    <div class="col-lg-6">
                        <div class="documentary">
                            <div class="container">
                                <iframe src="https://www.youtube.com/embed/ewrBalT_eBM" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- about section end-->



        <!-- counterup section start here -->
                <!-- Numbers -->
                <div class="numbers text-center">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-3 col-sm-6">
                                <div class="item">
                                    <h5 class="counter">258</h5>
                                    <h6>Review Post</h6>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <div class="item">
                                    <h5 class="counter">735</h5>
                                    <h6>Coupon Post</h6>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <div class="item">
                                    <h5 class="counter">3910</h5>
                                    <h6>Blog Post</h6>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <div class="item">
                                    <h5 class="counter">600000</h5>
                                    <h6>User Hit</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Numbers -->
            <!-- counterup section end here -->

@endsection
