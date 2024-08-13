<!DOCTYPE html>
<html lang="en">

<head>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<body>
    <h1>Create course</h1>


    <form action="{{url('/add_course')}}" method="post" enctype="multipart/form-data" class="m-5">

        @csrf
        Title :
        <input type="text" name="title" value="{{old('title')}}" class="m-3 form-control">
        @if($errors->has('title'))
            <span class="small text-danger">{{ $errors->first('title') }}</span><br>
        @endif

        Content :
        <textarea name="content" class="m-3 form-control">{{old('content')}}</textarea>
        @if($errors->has('content'))
            <span class="small text-danger">{{ $errors->first('content') }}</span><br>
        @endif

       Category :
       <select name="category" value="{{old('category')}}" class="m-3 form-control">
            
            @foreach($categories as $category)

                <option value="{{ $category->id }}" {{old('category')==$category->id ? "selected":""}}>{{$category->category}}</option>

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

        Tags:
        <div class="checkbox_container" name="tags" id="tags" style="display:flex"> 
            
            @foreach($tags as $tag)
            
                <input type="checkbox" name="tag[]" value="{{ $tag->id }}" class="m-3 form-control" {{ in_array($tag->id, old('tag', [])) ? 'checked' : '' }}> 
                
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
        
    <center>
        <input type="submit" name="" class="btn btn-primary m-5" >
    </center>
    </form>
       
</body>
</html>