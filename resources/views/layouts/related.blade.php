<div class="blog_related">
    <div class="content_heading">
        <h2>Related Post</h2>
    </div>

    <div class="row">
        @foreach($populars as $popular)
            @for($i=0;$i<2;$i++)
            <?php 
                $post = $popular->posts[$i];
            ?>
            <div class="col-lg-4">
                <div class="blog_content">
                    <figure>
                        <a href="{{'/'.$popular->name.'/'.$post->slug}}"><img src="{{asset($post->image)}}" alt="image"></a>
                        <figcaption>
                            <a href=""><h5>{{$post->title}}</h5></a>
                            <i>Admin • {{$post->created_at}}</i>
                        </figcaption>
                    </figure>
                </div>
            </div>
            @endfor
        @endforeach
    </div>
</div>