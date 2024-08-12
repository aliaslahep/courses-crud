<!DOCTYPE html>
<html lang="en">

<head>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<body>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <h1>User registration</h1>
    <form action="{{url('/users_login')}}" method="post" class="m-5 pl-5 pr-5">

        @csrf
        Username :
        <input type="text" name="username" value="{{old('username')}}" class="m-3 form-control">
        @if($errors)
            <span class="small text-danger">{{ $errors->first('username') }}</span><br>
        @endif

        Password:
        <input type="password" name="password" class="m-3 form-control">
        @if($errors->has('password'))
            <span class="small text-danger">{{ $errors->first('password') }}</span><br>
        @endif
        
        <center>
            <input type="submit" name="login" value="Login" class="btn btn-primary">
        </center>
</body>
</html>