@extends('layouts.app')

@push('js')
<script src="{{asset('js/app.js')}}"></script>
@endpush


@push('css')
<link rel="stylesheet" href="{{asset('css/app.css')}}">
@endpush


@push('title')
<title>Edit Draft</title>
@endpush



@section('content')
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>

<script>
  var editor_config = {
    path_absolute : "/",
    selector: "textarea.my-editor",
    plugins: [
      "advlist autolink lists link image charmap print preview hr anchor pagebreak",
      "searchreplace wordcount visualblocks visualchars code fullscreen",
      "insertdatetime media nonbreaking save table contextmenu directionality",
      "emoticons template paste textcolor colorpicker textpattern"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media | template forecolor backcolor |",
    templates: [
        {title: 'Some title 1', description: 'Some desc 1', content: 'tsdfnsj'},
        //{title: 'Some title 2', description: 'Some desc 2', url: 'development.html'}
    ],
    relative_urls: false,
    file_browser_callback : function(field_name, url, type, win) {
      var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
      var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

      var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
      if (type == 'image') {
        cmsURL = cmsURL + "&type=Images";
      } else {
        cmsURL = cmsURL + "&type=Files";
      }

      tinyMCE.activeEditor.windowManager.open({
        file : cmsURL,
        title : 'Filemanager',
        width : x * 0.8,
        height : y * 0.8,
        resizable : "yes",
        close_previous : "no"
      });
    }
  };

  tinymce.init(editor_config);
</script>
<section class="blog">
    <div class="row" style="margin:20px;">
        <div class="col-md-8 mr-auto ml-auto">
            @if(session()->has('saved'))
                <h3 class="text-center alert-success">Draft saved</h3>
            @endif

            <h3 class="text-center">Edit Draft</h3>
            <form action="/drafts/{{$post->slug}}/all" method="post" enctype="multipart/form-data">
                @csrf
                


                <div class="form-group">
                    <label >Title</label>
                    <input type="text" class="form-control" placeholder="Enter a title for the post" name="title" value="{{$post->title}}">
                    @if ($errors->has('title'))
                        <span class="alert-danger" >
                            <strong>{{ $errors->first('title') }}</strong>
                        </span>
                    @endif
                </div>
                
                <div class="form-group">
                    <label>Slug</label>
                    <input type="text" class="form-control" placeholder="Enter a unique slug (a-z,-,0-9)" name="slug" value="{{$post->slug}}" >
                    @if ($errors->has('slug'))
                        <span class="alert-danger" >
                            <strong>{{ $errors->first('slug') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Select a category</label>
                    <select class="form-control" name="category_id">
                        @foreach($latests as $latest)
                        <option value="{{$latest->id}}">{{$latest->name}}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('category_id'))
                        <span class="alert-danger" >
                            <strong>{{ $errors->first('category_id') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label>Select an image for the post</label>
                    <input type="file" class="form-control-file" name="image">
                    @if ($errors->has('image'))
                        <span class="alert-danger" >
                            <strong>{{ $errors->first('image') }}</strong>
                        </span>
                    @endif
                </div>
                <!-- <style>
                    #mceu_38{
                        display:none;
                    }
                </style> -->
                <div class="form-group">
                    <label>Post body</label>
                    <textarea name="content" rows="30" class="form-control my-editor">{!! $post->body !!}</textarea>
                    @if ($errors->has('content'))
                        <span class="alert-danger" >
                            <strong>{{ $errors->first('content') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="row ">
                    
                    <input type="submit" class="btn btn-primary" style="margin:0 auto;" value="Publish" name="publish">
                    
                    <input type="submit" class="btn btn-primary" style="margin:0 auto;" value="Update" name="update">
                </div>
            </form>
            
        </div>
    </div>


</section>

@endsection
