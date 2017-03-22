<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
class CancelClassController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function cancel(Request $request)
    {
    	
    }
}
