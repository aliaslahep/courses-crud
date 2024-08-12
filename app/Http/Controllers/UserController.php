<?php

    namespace App\Http\Controllers;

    use App\Models\Users;
    use App\Models\Courses;


    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Validator;
    use Illuminate\Support\Facades\Hash;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Storage;

    class UserController extends Controller
    {

        public function register_page() {

            return view("register");

        }

        public function add_user(Request $request) {

            $validator = Validator::make($request->all(), [

            "first_name"=> ['required'],
            "last_name"=> 'nullable|min:2',
            "phone_number"=> 'required|unique:users,phone_number|integer|regex:/^[0-9]{10}$/',
            "email"=> 'required|email|unique:users,email',
            "username"=> 'required|unique:users,username',
            "password"=> 'required|min:6|regex:/^(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*[@$!%*?&])[A-Za-z0-9_@#$%&*]{6,}$/',
            "confirm_password"=> 'required_with:password|same:password'
        ],[
            'password.required' => 'Please enter your password.',
            'password.min' => 'Password must be atleast 6 characters',
            'password.regex' => 'Your password must have capital letter,small latter,digits and special characters.',
            'confirm_password'=> 'Password mismatch',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } 


        $user = new Users();

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->phone_number = $request->phone_number;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password =  Hash::make($request->password);

        $user->save();  

        return redirect()->intended('/login')->with('success','Entered Successfully');

    }

    
    public function login() {

        return view("login");

    }

    public function users_login(Request $request) {

        $username = $request->input('username');
        $password = $request->input('password');

        $checkLogin = DB::table('users')->where(['username'=>$username,'password'=>$password])->first();

        if(!empty($checkLogin)) {
            session(['user' => $checkLogin]);
            return view('home')->with(['username'=>$checkLogin->username]);

        }

        else {
    
            echo "unsuccess";
    
        }
    }


    public function courses_create(){

        return view("courses-create");
    }

    public function add_course(Request $request){
        

        $validator = Validator::make($request->all(), [
            "title"=>'required',
            "content"=>'required',
            "category"=>'required',
            "thumbnail"=>'required|mimes:png,jpg,jpeg'
        ]);


        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $courses = new Courses();
        $courses->title = $request->title;
        $courses->content = $request->content;
        $courses->category = $request->category;
        
        $image = $request->thumbnail;
        $year = date('Y');
        $month = date('m');
        $day = date('d');
        if(!file_exists("images/$year/$month/$day")){

            mkdir("images/$year/$month/$day",0777,true);

        }
        
        $request->thumbnail->move("image/$year/$month/$day",$image);

        $courses->thumbnail = $image;

        $courses->save();

        return redirect()->intended('/home')->with("success","enetered successfully");

    }

    public function home(){

        return view('home');
    }
}
?>