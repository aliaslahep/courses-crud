<?php

    namespace App\Http\Controllers;

    use App\Models\CourseTags;
    use App\Models\Users;
    use App\Models\Courses;
    use App\Models\User;


    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Validator;
    use Illuminate\Support\Facades\Hash;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Storage;
    use Illuminate\Support\Facades\Auth;

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

        $check_login = DB::table('users')->where(['username'=>$username,'password'=>$password])->first();

        if(!empty($check_login)) {
            session(['user' => $check_login]);
            return view('home')->with(['username'=>$check_login->username]);

        }

        else {
    
            echo "unsuccess";
    
        }
    
    }


    public function courses_create(){

        $user = session()->get('user');

        $categories = \DB::table('categories')->get();

        $tags = \DB::table('tags')->get(); 

        return view("courses-create",compact('tags','categories','user'));
    }

    public function add_course(Request $request){
        

        $validator = Validator::make($request->all(), [
            "title"=>'required',
            "content"=>'required',
            "category"=>'required',
            "thumbnail"=>'required|mimes:png,jpg,jpeg|max:10240',
            'tag' => 'required|array',
            'tag.*' => 'required|string|max:255',
            "file" => "required|mimes:pdf|max:10240"
        ]);


        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = session()->get('user');

        $courses = new Courses();
        $courses->title = $request->title;
        $courses->content = $request->content;
        $courses->category = $request->category;
        $courses->user_id = $user->id;
        
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

        $course_id = $courses->id;  

        $tags = $request->input('tag');
        
        
        foreach($tags as $tag) {
        
            \DB::table('course_tags')->insert([
        
                'tag_id' => $tag,
        
                'course_id' => $course_id
        
            ]);
        
        }

        $file = $request->file;

        if(!file_exists("pdf/$year/$month/$day")){

            mkdir("pdf/$year/$month/$day",0777,true);

        }
        
        $request->file->move("pdf/$year/$month/$day",$file);

        \DB::table("course_files")->insert([

            'file' => $file,

            'course_id' => $course_id

        ]);


        return redirect()->intended('/home')->with("success","enetered successfully");

    }

    public function home(){

        return view('home');

    }

    public function courses_update(){

        return view('courses-update');
    }

    public function courses_display() {
        
        $get_table = DB::table('courses')->orderBy('id', 'asc')->Paginate(3,['*'],'users');

        return view('courses-display',compact('get_table'));
    }


}
?>