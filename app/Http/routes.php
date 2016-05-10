<?php

Route::get('/', 'HomeController@index');

Route::post('/loginorjoin', [
    'as' => 'loginorjoin', 'uses' => 'LoginOrJoinController@index'
]);

Route::post('/complete/submit', [
    'as' => 'completedata', 'uses' => 'UserDataController@submit'
]);

Route::get('/dashboard/{action}', 'UserDataController@dashboardaction');
// Route::post('/dashboard/changepassword/submit', function() {
// 	if(Request::ajax()) {
// 		return var_dump(Response::json(Request::all()));
// 	}
// });
Route::post('/dashboard/changepassword/submit','UserDataController@changepassword');
Route::post('/dashboard/jsuploadformdata/submit','UploadController@jsuploadformdata');
Route::post('/dashboard/uploadfileajax/submit','UploadController@ajaxupload');

// Route::post('/dashboard/uploadfileajax/submit', function() {
// 	if(Input::hasFile('files')) return "ada";

// 	return "gak ada";
// });
Route::post('/dashboard/multipleupload', [
    'as' => 'multipleupload', 'uses' => 'UploadController@multipleupload'
]);

Route::get('/dashboard','LoginOrJoinController@loginflag');
Route::get('/logout',function() {
	Session::flush();
	return redirect('/');
});

Route::get('/getmoreuser/{skip}','HomeController@getmoreuser');
Route::get('/getuser/{userid}','UserDataController@getuserbyid');

