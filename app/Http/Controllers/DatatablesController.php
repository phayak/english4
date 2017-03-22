<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use Datatables;

class DatatablesController extends Controller
{
    public function getIndex()
	{
		$ddd = Datatables::of(User::query())->make(true);

	    return view('datatables.index');
	}

	public function anyData()
	{
		$data = Datatables::of(User::where('status',0))->make(true);
	    return $data;
	}
	public function anyDataTeacher()
	{

		// $data = Datatables::of(User::where('status',2))->make(true);

		$data = User::where('status',2)->get();
	    return $data;
	}
}
