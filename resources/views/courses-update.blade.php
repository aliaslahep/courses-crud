@php
    
    $files = DB::table('course_files')->where('course_id',$get_course->id)->get();

@endphp

<!DOCTYPE html>
<html lang="en">

<head>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


</head>

<body>
    <h1>Course Update</h1>

    <form action="{{url('/update_course',$get_course->id)}}" method="post" enctype="multipart/form-data" class="m-5">

        @csrf
        Title :
        <input type="text" name="title" value="{{$get_course->title}}" class="m-3 form-control">
        @if($errors->has('title'))
            <span class="small text-danger">{{ $errors->first('title') }}</span><br>
        @endif

        Content :
        <textarea name="content" class="m-3 form-control">{{$get_course->content}}</textarea>
        @if($errors->has('content'))
            <span class="small text-danger">{{ $errors->first('content') }}</span><br>
        @endif

       Category :
       <select name="category" class="m-3 form-control">
            
            @foreach($categories as $category)

                <option value="{{ $category->id }}" {{$get_course->category==$category->id ? "selected":""}}>{{$category->category}}</option>

            @endforeach

       </select>
        @if($errors->has('category'))
            <span class="small text-danger">{{ $errors->first('category') }}</span><br>
        @endif

        Thumbnail :
        <input type="file" name="thumbnail" class="m-3 form-control">
        
        @if($errors->has('thumbnail'))
            
            <span class="small text-danger">{{ $errors->first('thumbnail') }}</span><br>
        
        @endif

        <div class="image_container" id="image_container" style="color: blue;">
            
            <div style="display:flex;">
                <p id="image_name">{{$get_course->thumbnail}}</p>
                <input type="button" id="image_del" value="x" class="ml-2 btn-danger pt-0" style="height:30px">
            </div>                        

        </div>

        Tags:
        <div class="checkbox_container" name="tags" id="tags" style="display:flex"> 
            
            @php

                $tag_used = DB::table('course_tags')->where('course_id',$get_course->id)->get();

            @endphp

            @foreach($tags as $tag)
            
                <input type="checkbox" name="tag[]" value="{{ $tag->id }}" class="m-3 form-control" > 
                
                <p style="margin: 20px 10px 10px -70px">{{ $tag->tag }}</p>
            
            @endforeach
            
             </div>

        @if($errors->has('tag[]'))
        
            <span class="small text-danger">{{ $errors->first('tag[]') }}</span><br>
        
        @endif
        
        
        Pdf:
        <input type="file" name="file" class="m-3 form-control" multiple>

        @if($errors->has('file'))

            <span class="small text-danger">{{ $errors->first('file') }}</span><br>
        
        @endif
        <div class="file_container" id="file_container" style="color: blue;">
            
            @foreach($files as $file)
            
                <div style="display:flex;">
                    <p id="file_name">{{$file->file}}</p>
                    <input type="button" id="file_del" value="x" class="ml-2 btn-danger pt-0" style="height:30px">
                </div> 

            @endforeach                      

        </div>
    <center>
        <input type="submit" name="" value="Update" class="btn btn-primary m-5" >
    </center>
    </form>

</body>
</html>