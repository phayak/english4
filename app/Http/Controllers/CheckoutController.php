<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;

require_once dirname(__FILE__, 4).'/omise-php/lib/Omise.php';
use OmiseCustomer;
use OmiseCharge;
class CheckoutController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $user = Auth::User();
        if($user->status != 0) { return redirect('/admin/teacher'); }
    }

    public function create()
    {
        //
    }

    public static function store(Request $request)
    {


        define('OMISE_API_VERSION', '2015-11-17');
        define('OMISE_PUBLIC_KEY', 'pkey_test_56s5jfqoyw7ymnhmpce');
        define('OMISE_SECRET_KEY', 'skey_test_53xmvxy13deb7a2wqjm');

        // $omise = OmiseCustomer::create(array(
        //     'amount' => '320000',
        //     'currecy' => 'thb',
        //     'card' => $_POST['omiseToken'],
        // ));
        $input = $request->all();

        $omise = OmiseCharge::create(array(
            'amount' => $input['amount'].'00',
            'currency' => 'thb',
            'card' => $input['omiseToken'],
        ));

        if($omise['status'] == 'successful'){
            return '1';
        }else {
            return '0';
        }

        // echo '<pre>';
        // print_r($_POST);
        // echo '</pre>';
        // echo '<hr>';
        // echo '<pre>';
        // print_r($omise);
        // echo '</pre>';

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
