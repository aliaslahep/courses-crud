<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    @section('content')
        <h1>Registration Form</h1><hr>
        <h3>Please insert the informations bellow:</h3>
        <form action="{{ route('register')}}" method="post">

            @csrf

            <input type="text" name="email" placeholder="email"><br><br>
            <input type="text" name="username" placeholder="username"><br><br>
            <input type="password" name="password" placeholder="password"><br><br>
            <input type="submit" value="REGISTER">
        </form>
        
</body>
</html>