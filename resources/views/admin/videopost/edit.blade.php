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
                        {!! Form::submit('Edit Video',['class'=>'btn btn-primary']) !!}
                    </div>

                {!! Form::close() !!}
            </div>
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
