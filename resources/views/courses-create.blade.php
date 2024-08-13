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
            <option value="1" {{old('category')==1 ? "selected":""}}>Computer Science</option>
            <option value="2" {{old('category')==2 ? "selected":""}}>Information technology</option>
            <option value="3" {{old('category')==3 ? "selected":""}}>Electrical</option>
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
            <input type="checkbox" name="tag[]" value="1" class="m-3 form-control" {{ in_array(1, old('tag', [])) ? 'checked' : '' }}> <p style="margin: 20px 10px 10px -80px ">HTML</p>
            <input type="checkbox" name="tag[]" value="2" class="m-3 form-control" {{ in_array(2, old('tag', [])) ? 'checked' : '' }}> <p style="margin: 20px 10px 10px -80px ">CSS</p>
            <input type="checkbox" name="tag[]" value="3" class="m-3 form-control" {{ in_array(3, old('tag', [])) ? 'checked' : '' }}> <p style="margin: 20px 10px 10px -80px ">Javascript</p>
            <input type="checkbox" name="tag[]" value="4" class="m-3 form-control" {{ in_array(4, old('tag', [])) ? 'checked' : '' }}> <p style="margin: 20px 10px 10px -80px ">Malayalam</p>
            <input type="checkbox" name="tag[]" value="5" class="m-3 form-control" {{ in_array(5, old('tag', [])) ? 'checked' : '' }}> <p style="margin: 20px 10px 10px -80px ">English</p>
        </div>

        @if($errors->has('tag[]'))
            <span class="small text-danger">{{ $errors->first('tag[]') }}</span><br>
        @endif
        
        
        Pdf:
        <input type="file" name="file[]" class="m-3 form-control" multiple>
        @if($errors->has('file'))
            <span class="small text-danger">{{ $errors->first('file') }}</span><br>
        @endif
        
    <center>
        <input type="submit" name="" class="btn btn-primary m-5" >
    </center>
    </form>
       
</body>
</html>