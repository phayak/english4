<?php

namespace App\Http\Controllers\Teacher;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use Auth;
use App\User;
use App\Comment;
class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function comment()
    {
        $user = Auth::User();
        if($user->status != 2) { return redirect('/'); }

        $class_teacher_id = Input::get('class_teacher_id');
        $user_id = Input::get('userid');

        $data['class_teacher_id'] = $class_teacher_id;
        $data['teacher_id'] = $user->id;
        $data['user_id'] = $user_id;

        $student = User::where('id',$user_id)->first();
        $data['user_name'] = $student->name;

        return view('teacher.comment.comment',compact('data'));
    }
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $user = Auth::User();
        if($user->status != 2) { return redirect('/'); }

        $input = $request->all();

        $data['class_teacher_id'] = $input['class_teacher_id'];
        $data['teacher_id'] = $user->id;
        $data['user_id'] = $input['user_id'];
        $data['text'] = $input['text'];

        Comment::create($data);

        echo "<script>window.close();</script>";
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
