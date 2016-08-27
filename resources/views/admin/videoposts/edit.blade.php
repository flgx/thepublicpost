@extends('layouts.admin')
@section('title')
    Edit Video
@endsection

@section('content')
        <div class="row">
            <div class="col-lg-6 col-md-6">
                {!! Form::open(['route' => ['admin.videoposts.update',$videopost->id],'method' => 'PUT','files'=>'true']) !!}

                    <div class="form-group">
                        {!! Form::label('title','Title') !!}
                        {!! Form::text('title', $videopost->title,['class'=> 'form-control','placeholder'=>'Type a title','required']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('video_link','Video Link') !!}
                        {!! Form::text('video_link', $videopost->video_link,['class'=> 'form-control','placeholder'=>'Type a video link','required']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('category_id','Category') !!}
                        {!! Form::select('category_id', $categories,$videopost->category->id,['class'=> 'form-control select-category','required']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('content','Content') !!}
                        {!! Form::textarea('content', $videopost->content,['class' => 'textarea-content','required']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('featured','Featured') !!}
                        {!! Form::checkbox('featured',$videopost->featured,['class' => 'form-control','required']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('tags','Tags') !!}
                        {!! Form::select('tags[]', $tags,$myTags,['class'=> 'form-control select-tag','multiple','required']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('images','Images') !!}
                        {!! Form::file('images[]', array('multiple'=>true)) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::submit('Edit Video',['class'=>'btn btn-primary']) !!}
                    </div>

                {!! Form::close() !!}
            </div>
            
            <!-- VideoPost Images -->
            <div class="col-md-6">
                <h1>Images</h1>
                <hr>
                @if(count($videopost->images) > 0)  
                    <?php
                        $i=0;
                    ?>
                    @foreach($videopost->images as $image)
                    <div class="col-xs-12">
                        <?php if($i==0){echo '<h1>Featured Image:</h1> <hr>';} ?>
                        {{ HTML::image('img/videoposts/thumbs/thumb_'.$image->name, '$videopost->title') }}
                        
                        <p class="col-xs-12" style="padding-left:0px; margin-top:10px;">
                            <a href="#" class="btn-delete btn btn-danger"  data-horse="{{$image->id}}"><i class="fa fa-trash fa-2x"></i></a>
                        </p>
                    </div>
                    <hr>
                    <?php $i++; ?>
                    @endforeach
                @else
                    <p>Not images found. Please add a new image.</p>  
                @endif      
            </div>
        </div>
        <!-- /.row -->
        </div>
        <!-- /.row -->


@endsection

@section('js')
    <script>
        $(".select-tag").chosen({
            placeholder_text_multiple: "Select your tags"
        });
        $(".select-category").chosen({
            placeholder_text_single: "Select a category"
        });

        $('.textarea-content').trumbowyg({
            
        });
    </script>
@endsection