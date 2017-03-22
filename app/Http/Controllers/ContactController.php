<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Contact;
use Carbon\Carbon;
use Validator;

class ContactController extends Controller
{

    public function ip()
    {
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }

    public function index()
    {   
        return view('contact');
    }
    public function create()
    {
        //
    }
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name'  => 'required',
            'email' => 'required',
            'subject' => 'required',
            'msg' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/contact')
                        ->withErrors($validator)
                        ->withInput();
        } else {
            $input = $request->all();
            $data['date'] = Carbon::now()->format('Y-m-d');
            $data['ip'] =  $this->ip();
            $data['name'] = $input['name'];
            $data['email'] = $input['email'];
            $data['subject'] = $input['subject'];
            $data['msg'] = $input['msg'];
            $data['view'] = 0;
            Contact::create($data);

            flash('ท่านได้ส่งการติดต่อเรียบร้อยแล้ว', 'success');

            return redirect('/contact');
        }
        
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
