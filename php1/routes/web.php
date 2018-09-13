<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* Trang khách hàng
 * Khách hàng kiểm tra */
Route::get('/',['uses'=>'Customer\ContractController@ContractSearch', 'as'=>'CustomerHome']); 
/*Xử lý code khách hàng gửi vào */
Route::post('c',['uses'=>'Customer\ContractController@ContractSearchget', 'as'=>'ContractGetSearch']);

////////// LOGIN AND LOGOUT ROUTE ///////////
Route::get('login', [ 'uses'=>'LoginController@getLogin',  'as'=>'login']);  
Route::post('login',[ 'uses'=>'LoginController@postLogin', 'as'=>'logout']);
Route::get('logout',[ 'uses'=>'LoginController@getLogout', 'as'=>'logout']);


//////// ADMIN ROUTE ////////
Route::group(['prefix'=>'admin'],function() {
    Route::get('', ['uses'=>'Admin\HomeController@getIndex', 'as'=>'Admin']); //Trang chủ quản lý   
    Route::get('file', 'Admin\UserController@FileManager');                   //Trang quản lý file

    ////////// COMPANY ROUTE GROUP ///////////
    Route::group(['prefix'=>'company'],function()  {
        /////////// COMPNAY LIST //////////
        Route::get('/', 'Admin\CompanyController@getIndex'); //Danh sách tát cả công ty
        Route::get('/assign-{id}', 'Admin\CompanyController@MyCompany'); //Danh sách công ty của nhân viên

        //////// CREATED COMPANY /////////
        Route::get('/add', ['uses'=>'Admin\CompanyController@getCompany',  'as'=>'getAddCompany']);   //Thêm công ty
        Route::post('/add',['uses'=>'Admin\CompanyController@postCompany', 'as'=>'postAddCompany']);  //Xử lý ghi dữ liệu công ty vào CSDL

        //////// EDIT COMPNAY /////////
        Route::get('/edit/{id}', ['uses' => 'Admin\CompanyController@getEdit',  'as'  => 'getEditCompany']);  //Sửa công ty
        Route::post('/edit/{id}',['uses' => 'Admin\CompanyController@postEdit', 'as'  => 'postEditCompany']); ////Xử lý sửa dữ liệu công ty vào CSDL

        //////// INFO PAGE COMPANY //////
        Route::get('/info/{id}', 'Admin\CompanyController@getInfo'); //Show thông tin chi tiết của công ty

        ///////// SEARCH COMPANY ///////
        Route::get('search', ['uses'=>'Admin\CompanyController@search', 'as' => 'search']); //Tìm kiếm công ty
    });

    ////////// CONTACT ROUTE //////////
    Route::group(['prefix'=>'customer'],function() {

        //////// CONTACT LIST /////////
        Route::get('/', 'Admin\CustomerController@getIndex'); //Danh sách liên hệ
        Route::get('assign-{id}', 'Admin\CustomerController@MyCustomer'); //Danh sách liên hệ của nhân viên

        //////// CREATED CONTACT /////////
        Route::post('/add', ['uses'=>'Admin\CustomerController@postCustomer', 'as'=>'postCustomer']); //Tạo liên hệ

        ///////// EDIT CONTACT //////////
        Route::get('/edit/{id}', 'Admin\CustomerController@getEdit'); //Sửa thông tin liên hệ
        Route::post('/edit/{id}', 'Admin\CustomerController@postEdit'); //Xử lý sửa thông tin liên hệ

    });

    ///////// CONTRACT ROUTE /////////
    Route::group(['prefix'=>'contract'],function() {
        Route::post('add',['uses'=>'Admin\ContractController@postAddContract', 'as'=>'postAddContract']); //Thêm hợp đồng
        Route::get('expired', 'Admin\ContractController@expiredContract'); //Hết hạn
        Route::get('delContract-{id}', ['uses'=>'Admin\ContractController@deleteContract', 'as'=>'DeleteContract']); //Xóa hợp đồng
        Route::get('',['uses'=>'Admin\ContractController@getContract', 'as'=>'getContract'])->middleware('role:1'); //Show Full hợp đồng
        Route::get('show-{id}', 'Admin\ContractController@ContractProcessing'); //Show hợp đồng theo tình trạng
        Route::get('contractwork', 'Admin\ContractController@ContractWork'); //Show hợp đồng theo tình trạng
        Route::get('mycontract-{id}', 'Admin\ContractController@MyContract')->middleware('role:2'); //Show hợp đồng của user


        //////// INFO CONTRACT /////////
        Route::get('/info/{id}', ['uses'=>'Admin\ContractController@ContractInfo', 'as'=>'infoContract']);
        Route::post('/info/{id}',['uses'=>'Admin\ContractController@ContractEdit', 'as'=>'postEditContract']);
        Route::post('/info/{id}/note',['uses'=>'Admin\ContractController@ContractNote', 'as'=>'postContractNote']);
        Route::post('/info/{id}/userwork',['uses'=>'Admin\ContractController@UserWork', 'as'=>'postContractWork']);
        Route::post('/action/add',['uses'=>'Admin\ContractController@ContractAction', 'as'=>'postActionContract']); ///Contract Action
    });

    ////////// SETTING ROUTE /////////
    Route::group(['prefix'=>'setting', 'middleware'=>'role:1'],function(){
        Route::get('/', ['uses'=>'Admin\SettingController@Setting', 'as'=>'Setting']);
        ////////// CITY ROUTE /////////
        Route::get('city', 'Admin\SettingController@City');
        Route::post('city', 'Admin\SettingController@postCity');
        Route::post('editcity', ['uses' => 'Admin\SettingController@editCity', 'as' => 'editCity']);
        Route::get('city/{id}/delete', ['uses'=>'Admin\SettingController@deleteCity', 'as'=>'deleteCity']);

        ///////// COMPANY TYPE ROUTE /////////
        Route::get('cotype', 'Admin\SettingController@CoType');
        Route::post('cotype', 'Admin\SettingController@postCoType');
        Route::post('editcotype', ['uses'=>'Admin\SettingController@editCoType', 'as'=>'editCotype']);
        Route::get('cotype/{id}/delete', ['uses'=>'Admin\SettingController@deleteCotype', 'as'=>'deleteCotype']);

        ///////// CONTRACT TYPE ROUTE /////////
        Route::get('cttype', 'Admin\SettingController@ContractType');
        Route::post('cttype', 'Admin\SettingController@postContractType');
        Route::post('editcttype', ['uses'=>'Admin\SettingController@editContractType', 'as'=>'editContractType']);

        ///////// USER MANAGER ROUTE /////////
        Route::get('user', ['uses'=>'Admin\UserController@User', 'as'=>'getUser']);
        Route::post('user', ['uses'=>'Admin\UserController@postUser', 'as'=>'postUser']);
        Route::get('user/{id}/delete', ['uses'=>'Admin\UserController@deleteUser', 'as'=>'deleteUser']);
        // Route::post('user', ['uses'=>'Auth\RegisterController@register', 'as'=>'postUser']);
        Route::get('user/edit/{id}', ['uses'=>'Admin\UserController@getEditUser', 'as'=>'getEditUser']);
        Route::post('user/edit/{id}', ['uses'=>'Admin\UserController@postEditUser', 'as'=>'postEditUser']);

        ////////// FORM ROUTE /////////
        Route::get('form', ['uses'=>'Admin\SettingController@Form', 'as'=>'Form']);
        Route::get('formview/{id}', 'Admin\SettingController@formView');
        Route::get('addform', ['uses'=>'Admin\SettingController@getForm', 'as'=>'addForm']);
        Route::post('addform', ['uses'=>'Admin\SettingController@postForm', 'as'=>'postForm']);
        Route::get('editform/{id}', ['uses'=>'Admin\SettingController@getEditForm', 'as'=>'editForm']);
        Route::post('editform/{id}', ['uses'=>'Admin\SettingController@postEditForm', 'as'=>'postEditForm']);

    });

    ////////// PROFILE ROUTE /////////
    Route::group(['prefix'=>'profile'],function(){
        Route::get('{id}',['uses'=>'Admin\UserController@getProfile', 'as'=>'profile']);
        Route::post('/avatar-{id}', ['uses'=>'Admin\UserController@postAvatarCover', 'as'=>'UpdateAvatarCover']);
    });

    

    ///////// CALENDAR ROUTE ////////////////
    Route::get('calendar', ['uses'=>'Admin\CalendarController@getIndex', 'as'=>'Calendar']);
});

/////// CUSTOMER ROUTE ///////
Route::get('contract/{code}', ['uses'=>'Customer\ContractController@ContractTimeline', 'as'=>'ContractRoute']);