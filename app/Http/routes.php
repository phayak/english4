<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/','IndexController@index');
Route::get('package','PackageController@index');
Route::resource('booking','BookingController');
Route::resource('teacher','TeacherController');
Route::get('club','ClubController@index');
Route::get('course','CourseController@index');
Route::get('aboutus','AboutusController@index');
Route::resource('contact','ContactController');

Route::group(['middleware' => 'web'], function () {
	Route::auth();

	//package buy 
	Route::get('package/{id}','PackageController@show');
	Route::post('package/coupon','PackageController@coupon');
	Route::post('package','PackageController@store');

	Route::post('package/checkout','CheckoutController@store');
	//student
	Route::resource('profile','User\ProfileController');
	Route::get('profile/book/class','User\BookClassController@bookingclass');
	// Route::get('profile/book/class','User\ProfileController@bookingclass');
	Route::get('profile/data/class','User\DataClassController@dataclass');
	Route::get('profile/msg/class','User\MsgClassController@msgclass');
	Route::get('profile/history/class','User\HistoryClassController@historyclass');
	Route::get('profile/payment/class','User\PaymentClassController@paymentclass');
	// Route::get('/home', 'HomeController@index');
	Route::post('profile/paymentinsert','PaymentController@store');

	Route::post('checktraildata','User\ProfileController@checktraildata');


	Route::post('user/booking','User\BookingController@ajaxstore');
	Route::post('user/bookingtrial','User\BookingController@bookingtrial');
	Route::post('user/bookingmakeup','User\BookingController@bookingmakeup');
	Route::post('profile/book/changedate','User\BookingController@change');
	//teacher
	// Route::resource('admin/teacher','Teacher\AddClassController');
	Route::resource('admin/teacher/class','Teacher\AddClassController');
	Route::get('admin/teacher','Teacher\DashboardController@index');
	Route::resource('admin/teacher/booked','Teacher\BookedController');
	Route::resource('admin/teacher/handled','Teacher\HandledController');
	Route::post('admin/teacher/handled/action','Teacher\HandledController@action');
	Route::resource('admin/teacher/trialclass','Teacher\TrialClassController');
	Route::resource('admin/teacher/regularclass','Teacher\RegularClassController');
	Route::get('admin/teacher/comment','Teacher\CommentController@comment');
	Route::post('admin/teacher/comment','Teacher\CommentController@store');
	// admin
	Route::get('es4p','Admin\DashboardController@index');
	Route::resource('es4p/user','Admin\UserController');

	Route::controller('datatables', 'DatatablesController', [
	    'anyData'  => 'datatables.data',
	    'getIndex' => 'datatables',
	    'anyDataTeacher' => 'datatables.anyDataTeacher',
	]);

	Route::get('es4p/test','DatatablesController@anyDataTeacher');

	Route::resource('es4p/teacher','Admin\AllteacherController');
	Route::resource('es4p/order','Admin\OrderController');
	Route::resource('es4p/payment','Admin\PaymentController');
	Route::resource('es4p/contact','Admin\ContactController');
	Route::resource('es4p/coupon','Admin\CouponController');
	Route::resource('es4p/bank','Admin\BankController');
	Route::resource('es4p/package','Admin\PackageController');
	Route::resource('es4p/article','Admin\ArtcleController');


});
