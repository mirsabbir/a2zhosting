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
    <div class="row" id="rep">
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
                <!-- add comment -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                add a comment
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Add a comment</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Name:</label>
                            <input type="text" class= "form-control" name="name" v-model="name">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">email:</label>
                            <input type="email"  class= "form-control" name="email" v-model="email">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Comment:</label>
                            <textarea class="form-control" id="message-text" name="comment" v-model="comment"></textarea>
                        </div>
                    </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" data-dismiss="modal"  @click="send()">Comment</button>
                    </div>
                    </div>
                </div>
                </div>
                <!-- Modal -->
                <!-- Modal -->
                <div class="modal fade" id="exampleModalCenter8" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Comment posted
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal -->
                <!-- Modal -->
                <div class="modal fade" id="exampleModalCenterR" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Add a reply</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">Name:</label>
                                <input type="text" class= "form-control" name="name" v-model='name'>
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">email:</label>
                                <input type="email"  class= "form-control" name="email" v-model='email'>
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">Comment:</label>
                                <textarea class="form-control" id="message-text" name="comment" v-model='comment'></textarea>
                            </div>
                        </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" data-dismiss="modal" @click="send()">Reply</button>
                        </div>
                        </div>
                    </div>
                </div>
                <!-- Modal -->
                <!-- Modal -->
                <div class="modal fade" id="exampleModalCenter8R" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Reply posted
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal -->
                <!-- Modal -->
                <div class="modal fade" id="exampleModalCenterErr1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Enter a name
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal -->
                <!-- Modal -->
                <div class="modal fade" id="exampleModalCenterErr2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Enter a email
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal -->
                <!-- Modal -->
                <div class="modal fade" id="exampleModalCenterErr3" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Enter a comment
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal -->



               
                
                <!-- comments -->
                <hr>
                <h5 class="mb-3 bg-light">comments</h5>
                <div id="commenting">
                    <div v-for="comment in comments">
                    
                    <div class="comment border p-2 mb-3">
                        <div class="row">
                            <div class="col-2 col-md-1 pr-0">
                                <img :src="comment.pic" alt="" class="rounded-circle">
                            </div>
                            
                            <div class="col-10 col-md-11" >
                                
                                <div class="d-flex justify-content-between">
                                    <h5>@{{comment.name}}</h5>
                                    <span class="text-right">Aug 22, 2018 &nbsp;  <i class="ion-android-time">  <b>21:30</b></i> </span>
                                </div>
                                <p>@{{comment.body}}</p>
                                
                                @if(\Auth::check())
                                <div v-if="comment.published">
                                    <form :action="comment.hidelink">
                                    <button type="submit" class="btn btn-primary">hide</button>
                                    </form>
                                </div>
                                <div v-else>
                                    <form :action="comment.showlink">
                                        <button type="submit" class="btn btn-warning">show</button>
                                    </form>
                                </div>

                                <form :action="comment.deletelink">
                                    <button type="submit" class="btn btn-danger">delete</button>
                                </form>
                                @endif
                                

                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenterR" @click="set(comment.id)" >
                                reply
                                </button>

                            </div>
                        
                            
                        </div>
                        
                        <div v-for="reply in comment.replies">

                        <!-- Reply -->
                        <div class="row mt-3">
                            <div class="col-2 col-md-1 offset-1 pr-0">
                                
                                <img :src="reply.pic" alt="" class="rounded-circle">
                            </div>
                            <div class="col-9 col-md-10">
                                <div class="d-flex justify-content-between">
                                    <h5>@{{reply.name}}</h5>
                                    <span class="text-right">Aug 22, 2018 &nbsp;  <i class="ion-android-time">  <b>21:30</b></i> </span>
                                </div>
                                <p>@{{reply.body}}</p>


                                @if(\Auth::check())
                                <div v-if="reply.published">
                                    <form :action="reply.hidelink">
                                    <button type="submit" class="btn btn-primary">hide</button>
                                    </form>
                                </div>
                                <div v-else>
                                    <form :action="reply.showlink">
                                        <button type="submit" class="btn btn-warning">show</button>
                                    </form>
                                </div>

                                <form :action="reply.deletelink">
                                    <button type="submit" class="btn btn-danger">delete</button>
                                </form>
                                @endif



                                
                            </div>
                        </div>
                        <!-- reply -->
                        </div>
                    </div>
                    <!-- comments end-->
                    
                    </div>
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
    <script src="{{asset('js/app.js')}}"></script>
    <script>
                        
    
    var x = new Vue({
        el: '#exampleModalCenter',
        data: {
            name: '',
            email: '',
            comment: ''
        },
        methods:{
            send(){
                console.log(x.name);
                axios.post('/api/comment/{{$post->slug}}', {
                    body: x.comment,
                    email: x.email,
                    name: x.name
                })
                .then(function (response) {
                    console.log(response.data);
                })
                .catch(function (error) {
                    console.log(error);
                });
                
            },
            
        },
        mounted(){
            
        }
    });
    var g;
    var y = new Vue({
        el: '#commenting',
        data: {
            comments: [],
        },
        methods:{
           set(r){
               g = r;
           }
        },
        mounted(){
            console.log(541);
            this.comments = <?php echo json_encode($post->comments) ?>;
            var comments = this.comments;
            for(var i=0;i<comments.length;i++){
                comments[i].pic = gravatar.url(comments[i].email);
                comments[i].hidelink = '/comments/hidelink/'+comments[i].id;
                comments[i].showlink = '/comments/showlink/'+comments[i].id;
                comments[i].deletelink = '/comments/deletelink/'+comments[i].id;
                if(comments[i].replies)
                for(var j=0;j<comments[i].replies.length;j++){
                    comments[i].replies[j].pic = gravatar.url(comments[i].replies[j].email);
                    comments[i].replies[j].hidelink = '/replies/hidelink/'+comments[i].replies[j].id;
                    comments[i].replies[j].showlink = '/replies/showlink/'+comments[i].replies[j].id;
                    comments[i].replies[j].deletelink = '/replies/deletelink/'+comments[i].replies[j].id;
                }
            }
            //console.log(gravatar.url("sxsx"));
            
        }
    });
    var z = new Vue({
        el:'#exampleModalCenterR',
        data:{
            name: '',
            email: '',
            comment: ''
        },
        methods:{
            send(){
                console.log(this.comment);
                axios.post('/api/reply/'+g, {
                    body: z.comment,
                    email: z.email,
                    name: z.name
                })
                .then(function (response) {
                    console.log(response.data);
                })
                .catch(function (error) {
                    console.log(error);
                });
                
            }
        }
    });


    </script>

@endsection

