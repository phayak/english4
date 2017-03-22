<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use DB;
use App\User;
use Carbon\Carbon;
use App\Package;
use Datatables;
class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        
    }
    public function index()
    {
        $user = Auth::User();
        if($user->status != 1) { return redirect('/profile'); }

        $datas = User::where('status',0)->orderBy('id', 'DESC')->paginate(10);

        return view('admin.users.index',compact('datas'));
    }

    public function create()
    {

        return view('admin.users.create');
    }

    public function store(Request $request)
    {

        $input = $request->except('img');

        if($request->hasFile('img')){

            $file = $request->file('img');
            $destinationPath = '/uploads/profile/';
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
            $customer->line = $request->line;
            $customer->company_id = $request->company_id;
            $customer->trial = $request->trial;
            $customer->makeup = $request->makeup;
            $customer->save();

            // User::create([
            //     'fname' => $input['fname'],
            //     'lname' => $input['lname'],
            //     'name' => $input['name'],
            //     'email' => $input['email'],
            //     'img_path' => $path,
            //     'password' => bcrypt($input['password']),
            //     'password_see' => $input['password'],
            //     'birth_date' => $input['birth_date'],
            //     'sex'=> $input['sex'],
            //     'tel'=> $input['tel'],
            //     'line'=> $input['line'],
            //     'company_id'=> $input['company_id'],
            //     'trial'=> $input['trial'],
            //     'makeup'=> $input['makeup'],
            // ]);

            return redirect('es4p/user');

        }else{
            User::create($input);
            return redirect('es4p/user');
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.users.edit',compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = Auth::User();

        $input = $request->except('_token','_method','img');

        if($request->hasFile('img')){

            // มีรุปเก่าอยู่ ลบรูปเก่าก่อน
            // unlink(base_path('public'.$user->img_path));

            $file = $request->file('img');
            $destinationPath = '/uploads/profile/';
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
            $customer->img_path = $path;
            $customer->birth_date = $request->birth_date;
            $customer->sex = $request->sex;
            $customer->tel = $request->tel;
            $customer->line = $request->line;
            $customer->company_id = $request->company_id;
            $customer->trial = $request->trial;
            $customer->makeup = $request->makeup;
            $customer->save();

            return redirect('es4p/user/'.$id.'/edit');

        }else{
            $customer = User::find($id);

            $customer->fname = $request->fname;
            $customer->lname = $request->lname;
            $customer->name = $request->name;
            $customer->birth_date = $request->birth_date;
            $customer->sex = $request->sex;
            $customer->tel = $request->tel;
            $customer->line = $request->line;
            $customer->company_id = $request->company_id;
            $customer->trial = $request->trial;
            $customer->makeup = $request->makeup;
            $customer->save();

            return redirect('es4p/user/'.$id.'/edit');
        }



    }

    public function destroy($id)
    {
        //
    }
}
