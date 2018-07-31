<div class="col-lg-4">
    <section class="aside">
        @for($i=0;$i<3;$i++)
        <?php 
            $latest = $latests[$i];
        ?>
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
        @endfor
    </section>
</div>