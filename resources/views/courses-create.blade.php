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

        Last name :
        <input type="text" name="last_name" value="{{old('last_name')}}" class="m-3 form-control">
        @if($errors->has('last_name'))
            <span class="small text-danger">{{ $errors->first('last_name') }}</span><br>
        @endif

        Phone Number :
        <input type="text" name="phone_number" value="{{old('phone_number')}}" class="m-3 form-control">
        @if($errors->has('phone_number'))
            <span class="small text-danger">{{ $errors->first('phone_number') }}</span><br>
        @endif

        Username :
        <input type="text" name="username" value="{{old('username')}}" class="m-3 form-control">
        @if($errors->has('username'))
            <span class="small text-danger">{{ $errors->first('username') }}</span><br>
        @endif

        Email:
        <input type="text" name="email" value="{{old('email')}}" class="m-3 form-control">
        @if($errors->has('email'))
            <span class="small text-danger">{{ $errors->first('email') }}</span><br>
        @endif
        
        
        Password:
        <input type="password" name="password" class="m-3 form-control">
        @if($errors->has('password'))
            <span class="small text-danger">{{ $errors->first('password') }}</span><br>
        @endif
        
        Confirm Password:
        <input type="password" name="confirm_password" class="m-3 form-control  ">
        @if($errors->has('confirm_password'))
            <span class="small text-danger">{{ $errors->first('confirm_password') }}</span><br>
        @endif
    <center>
        <input type="submit" name="" class="btn btn-primary m-5" >
    </center>
    </form>
       
</body>
</html>