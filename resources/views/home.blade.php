<!DOCTYPE html>
<html lang="en">
<head>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <h1>User registration</h1>
    <form action="{{url('/add_user')}}" method="post" class="m-5">

        @csrf
        <div class="form-group">
            First name :
            <input type="text" name="first_name" value="{{old('first_name')}}" class="m-3 form-control">
            @if($errors->has('phone_number'))
                <span class="small text-danger">{{ $errors->first('first_name') }}</span><br>
            @endif
        </div>
        <div class="form-group">
            Last name :
            <input type="text" name="last_name" value="{{old('last_name')}}" class="m-3 form-control">
            @if($errors->has('last_name'))
                <span class="small text-danger">{{ $errors->first('last_name') }}</span><br>
            @endif
        </div>

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