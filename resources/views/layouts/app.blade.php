<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        @stack('title')

        <!-- Fonts -->
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:400,600" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,500" rel="stylesheet">
        
        <!-- Styles -->
        @stack('css')
        <!-- fonts -->


        <meta property="og:image" content="http://blog.debuggerlab.com/images/header.png">
        <meta property="og:image:type" content="image/png">
        <meta property="og:image:width" content="1129">
        <meta property="og:image:height" content="567">


        
        
        
    </head>
    <body>
        
        <nav class="navbar navbar-expand-lg nav_custom">
            <div class="container">
                <a class="navbar-brand" href="/">
                    <img src="/images/logo.png" alt="logo">
                </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
              <span class="ion-android-menu"></span>
            </button>
            
            
          
                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                        <!-- <li class="nav-item active">
                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                        </li> -->
                        @for($i=0;$i<3;$i++)
                        <?php 
                            $latest = $latests[$i];
                        ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle d-down" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ucfirst($latest->name)}} 
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <div class="menu_item">
                                    <div class="menu_heading">
                                        <h5>Latest {{$latest->name}} post</h5>
                                    </div>
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="menu_image">
                                                <a href="/{{$latest->name}}/{{$latest->posts[0]->slug}}"><img src="/{{$latest->posts[0]->image}}" alt="{{$latest->posts[0]->title}}"></a>
                                            </div>
                                        </div>
                                        <div class="col-9">
                                            <div class="menu_text">
                                                <a href="/{{$latest->name}}/{{$latest->posts[0]->slug}}">
                                                    <p> {{$latest->posts[0]->title}} &rarr;</p>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="dropdown-divider"></div>


                                <div class="menu_item">
                                    <div class="menu_link">
                                        <div class="menu_heading">
                                            <h5>Popular {{$latest->name}} post</h5>
                                        </div>
                                        @for($j=0;$j<2;$j++)
                                        <?php 
                                            $popularPost = $populars[$i]->posts[$j]; 
                                        ?>
                                        <a href="/{{$latest->name}}/{{$popularPost->slug}}">
                                            <p> &diams; {{$popularPost->title}} &rarr;</p>
                                        </a>
                                        @endfor
                                    </div>
                                </div>

                                    
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="/{{$latest->name}}">show more</a>
                            </div>
                        </li>
                        @endfor

                          
                    </ul>

                    <!-- admin routes -->
                    @if(Auth::check())
                    <a href="/editor" style="margin:0 auto;">Admin panel</a>
                    @endif

                    <!-- search box -->
                    <form action="/search" method="get">
                        <div class="search_box">
                            <input class="form-control" type="search" placeholder="Search" name="q">
                            <button class="search_button ion-android-search" type="submit"></button>
                        </div>
                    </form>
                </div>
                <!-- search box for responsive -->
                <form action="/search" method="get">
                    <div class="search_box_2">
                        <input class="form-control" type="search" placeholder="Search" name="q">
                        <button class="search_button ion-android-search" type="submit"></button>
                    </div>
                </form>
               
            </div>
            
        </nav>


        
        
        @yield('content')
       
       
        

        <!-- footer section start here -->
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <img src="/images/logo.png" alt="logo">
                        <p><strong>Our Mission:</strong> Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint aspernatur, id dicta nulla tempora enim expedita praesentium reiciendis? Quibusdam nemo a voluptate eos repudiandae maiores reprehenderit illum mollitia at ratione.</p>
                    </div>
                    <div class="col-lg-3">
                        <div class="heading">
                            <h6>Latest Advice</h6>
                        </div>
                        <div class="footer_select_option">
                            <select>
                                <option value="0">---Reviews---</option>
                                <option value="1">How to</option>
                                <option value="2">Popular</option>
                                <option value="3">Latest</option>
                                <option value="4">Hosting</option>
                                <option value="5">Blog</option>
                                <option value="6">How to</option>
                                <option value="7">Popular</option>
                                <option value="8">Latest</option>
                                <option value="9">Blog</option>
                                <option value="10">Hosting</option>
                                <option value="11">Latest</option>
                                <option value="12">Popular</option>
                            </select>
    
                            <select>
                                <option value="0">---Coupon---</option>
                                <option value="1">How to</option>
                                <option value="2">Popular</option>
                                <option value="3">Latest</option>
                                <option value="4">Hosting</option>
                                <option value="5">Blog</option>
                                <option value="6">How to</option>
                                <option value="7">Popular</option>
                                <option value="8">Latest</option>
                                <option value="9">Blog</option>
                                <option value="10">Hosting</option>
                                <option value="11">Latest</option>
                                <option value="12">Popular</option>
                            </select>
    
                            <select>
                                <option value="0">---Blog---</option>
                                <option value="1">How to</option>
                                <option value="2">Popular</option>
                                <option value="3">Latest</option>
                                <option value="4">Hosting</option>
                                <option value="5">Blog</option>
                                <option value="6">How to</option>
                                <option value="7">Popular</option>
                                <option value="8">Latest</option>
                                <option value="9">Blog</option>
                                <option value="10">Hosting</option>
                                <option value="11">Latest</option>
                                <option value="12">Popular</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="social">
                            <div class="heading">
                                <h6>Follow Us</h6>
                            </div>
                            <ul>
                                <li><a href="#" class="ion-social-facebook"></a></li>
                                <li><a href="#" class="ion-social-twitter"></a></li>
                                <li><a href="#" class="ion-social-googleplus-outline"></a></li>
                                <li><a href="#" class="ion-social-linkedin-outline"></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <span>© 2018 a2zhosting.com | Digital Brands | All Rights Reserved</span>
            </div>
        </footer>
        <!-- footer section end here -->
    


        @stack('js')
        
        
    </body>

</html>