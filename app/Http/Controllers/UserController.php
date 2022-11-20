<?php
namespace App\Http\Controllers;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Support\Str;
class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');
    }
    public function index()
    {
        return view('teacher.index');
    }

    public function compelete(){
        return view('teacher.compelete');
    }
    public function create()
    {
        return view('auth.register');
    }

    public function edit(User $user)
    {
        return view('teacher.edit', compact('user'));
    }
    public function update(UserRequest $userRequest, User $user)
    {
        $data=$userRequest->validated();
        if ($userRequest->hasFile('image')) {
            // dd($employee->emp_image);
            if ($user->image != null) {
                // asset/upload/image
                $path = public_path('asset/upload/image/' . $user->image);
                if(file_exists($path)){
                    // dd("exists");
                   unlink($path);
                        $extension = $userRequest->file('image')->getClientOriginalExtension();
                        $imgname = Str::random() .'.'. $extension;
                        $userRequest->file('image')->move('asset/upload/image', $imgname);
                        $data['image'] = $imgname;
                        // dd("delete file done");
                   
                }else{

                    $extension = $userRequest->file('image')->getClientOriginalExtension();
                    $imgname = Str::random() .'.'. $extension;
                    $userRequest->file('image')->move('asset/upload/image', $imgname);
                    $data['image'] = $imgname;
                    // dd($data['image']);
                }
            } else {
                // dd("file exists");

                // dd("sdfjsd");
                $extension = $userRequest->file('image')->getClientOriginalExtension();
                $imgname = Str::random() . $extension;
                $userRequest->file('image')->move('asset/upload/image', $imgname);
                $data['image'] = $imgname;
            }
        }

        // dd( $data['image']);
        $user->update($data);
        if($user->role=='teacher'){
            return redirect(route('teacher.index'))->with('message','بروز رسانی معلومات حساب کاربری موفقانه بود');
            
        }
        else if($user->role=="employee"){
            return redirect(route('employee.index'))->with('message','بروز رسانی معلومات حساب کاربری موفقانه بود');
        }else{
            return redirect(route('home'))->with('message','بروز رسانی معلومات حساب کاربری موفقانه بود');
        }
    }

    public function show(User $user){
        $user=$user->load('teacherInfo');
        // dd($user);
        return view('teacher.show',compact('user'));
    }
}
