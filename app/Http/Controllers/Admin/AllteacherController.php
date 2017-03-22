<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;
use App\User;
use Datatables;
use DB;
use Carbon\Carbon;
class AllteacherController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        
    }

    public function index()
    {
        $user = Auth::User();
        if($user->status != 1) { return redirect('/profile'); }

        $datas = User::where('status',2)->orderBy('id','DESC')->paginate(15);

        // $teacher_query_to_array = User::where('status',2)->select('id')->get()->toArray();
        $today = Carbon::now()->toDateString();

        $tech_all_count = DB::table('user_bookings')->count();
        $tech_today_count = DB::table('user_bookings')->where('date',$today)->count();
        $teacher_today_count = DB::table('teacher_bookings')->where('date_teacher',$today)->count();

        return view('admin.teacher.index',compact('datas','tech_all_count','tech_today_count','teacher_today_count'));
    }
    public function create()
    {
        return view('admin.teacher.create');
    }
    public function store(Request $request)
    {
        $input = $request->except('img');

        if($request->hasFile('img')){

            $file = $request->file('img');
            $destinationPath = '/uploads/teacher/';
            $now=date_format(Carbon::now(),'U');
            $filename=$now.'.'.$file->getClientOriginalExtension();

            $newfile['original_filename'] = $file->getClientOriginalName();
            $file =  $file->move(base_path().'/public'.$destinationPath,$filename);

            $path = $destinationPath.$filename;

            $customer = new User;
            $customer->fname = $request->fname;
            $customer->lname = $request->lname;
            $customer->name = $request->name;
            $customer->img_path = $path;
            $customer->password = bcrypt($request->password);
            $customer->password_see = $request->password;
            $customer->birth_date = $request->birth_date;
            $customer->sex = $request->sex;
            $customer->tel = $request->tel;
            $customer->status = 2;
            $customer->save();

            return redirect('es4p/teacher');

        }else{

            $customer = new User;
            $customer->fname = $request->fname;
            $customer->lname = $request->lname;
            $customer->name = $request->name;
            $customer->password = bcrypt($request->password);
            $customer->password_see = $request->password;
            $customer->birth_date = $request->birth_date;
            $customer->sex = $request->sex;
            $customer->tel = $request->tel;
            $customer->status = 2;
            $customer->save();

            return redirect('es4p/teacher');
        }
    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.teacher.edit',compact('user'));
    }
    public function update(Request $request, $id)
    {
        $user = Auth::User();

        $input = $request->except('_token','_method','img');

        if($request->hasFile('img')){

            // มีรุปเก่าอยู่ ลบรูปเก่าก่อน
            // unlink(base_path('public'.$user->img_path));

            $file = $request->file('img');
            $destinationPath = '/uploads/teacher/';
            $now=date_format(Carbon::now(),'U');
            $filename=$now.'.'.$file->getClientOriginalExtension();

            $newfile['original_filename'] = $file->getClientOriginalName();
            $file =  $file->move(base_path().'/public'.$destinationPath,$filename);

            $path = $destinationPath.$filename;
            // customer path
            $customer = User::find($id);
            $customer->fname = $request->fname;
            $customer->lname = $request->lname;
            $customer->name = $request->name;
            $customer->password = bcrypt($request->password);
            $customer->password_see = $request->password;
            $customer->img_path = $path;
            $customer->birth_date = $request->birth_date;
            $customer->sex = $request->sex;
            $customer->tel = $request->tel;
            $customer->status = 2;
            $customer->save();

            return redirect('es4p/teacher/'.$id.'/edit');

        }else{
            $customer = User::find($id);

            $customer->fname = $request->fname;
            $customer->lname = $request->lname;
            $customer->name = $request->name;
            $customer->password = bcrypt($request->password);
            $customer->password_see = $request->password;
            $customer->birth_date = $request->birth_date;
            $customer->sex = $request->sex;
            $customer->tel = $request->tel;
            $customer->status = 2;
            $customer->save();

            return redirect('es4p/teacher/'.$id.'/edit');
        }
    }
    public function destroy($id)
    {
        //
    }
}
