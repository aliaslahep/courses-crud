@php


@endphp

<html lang="en">
<head>


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


</head>
<body>
    <div class="nav" style="display: flex;justify-content: space-between">
        <h1>Access Log</h1>
    </div>
    <form action="{{url('/filter_log')}}" method="post">
        <div class="">
            <div class="search-container mb-3 mt-3" style="display:flex;justify-content:space-around">
                <div class="user-search">
                    <b>Username</b>

                    <select name="user" value="{{old('user')}}">
                        
                        @foreach($get_username as $user)

                            
                            <option value="{{$user->id}}" {{old('user')==$user->id ? "selected":""}}>{{$user->username}}</option>
                        @endforeach
                    </select>

                </div>
                <div class="url-search">
                    <b>URL</b>
                    <select>
                        <option></option>
                        <option value="/home">Home</option>
                        <option value="/course-create">Course Create</option>
                        <option value="/course_update">Course Update</option>
                        <option value="/course_display">Course List</option>
                    </select>
                </div>
                <div class="from_date">
                    <b>From</b>
                    <input type="date" name="from">
                </div>
                <div class="to_date">
                    <b>To</b>
                    <input type="date" name="to">
                </div>
            
        
    
                <div class="search_btn" >
                        <a href=""><input type="button" value="search" name="search_btn" class="btn-primary"></a>
                </div>
            </div>
        </div>
    </form>
</div>
    <table class="table table-bordered">
        <thead class="thead-dark">
        <tr class="">
            <th>IP Address</th>
            <th>Username</th>
            <th>URL</th>
            <th>Access Log</th>
        </tr>
        </thead>

        @foreach($get_access_log as $get)
            
            @php
                
                $user = $get->username;

                $get_username = DB::table('users')->where(['id'=>$get->username])->first();

                $access_log = date('d M Y h:i a', strtotime($get->access_log));

            @endphp

                <tr>
                    <td>{{$get->ip_address}}</td>
                    <td>{{$get_username->username}}</td>
                    <td>{{$get->url}}</td>
                    <td>{{$access_log}}</td>
                
                </tr>
                
                
            @endforeach
            
                
        </table>

</body>
</html>