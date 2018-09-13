<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use DB;
use App\Model\Admin\Customer;
use App\Model\Admin\Company;
use App\User;
use Auth;

class CustomerController extends Controller
{
    public function __construct() {
    	$this->middleware('auth');
    }
    
    function getIndex() {
        $customer = Customer::with('Company', 'UserCreated')->paginate(25);
        $data = array(
            'data'=>$customer,
        );
        return view('Admin/Customer/Customer')->with($data);
    }

    function MyCustomer($id) {
        if(Auth::id() == $id) {
            $customer = Customer::with('Company', 'UserCreated')->where('user_assign', '=', $id)->paginate(25);
            $data = array(
                'data'=>$customer,
            );
            return view('Admin/Customer/Customer')->with($data);
        } else {
            return redirect()->back();
        }
    }

    function postCustomer(Request $request) {
        //dd($request->all());
        $name = [
            'cus_name'  => 'Tên khách hàng',   
            'cus_email' => 'Email của khách hàng',
        ];

        $messages = [
            'cus_name.required' => ':attribute là bắt buộc nhập.',
            'cus_email.email' => ':attribute chưa đúng định dạng.',
            'cus_email.required' => ':attribute chưa được nhập.',
            'cus_email.unique' => ':attribute đã tồn tại. Kiểm tra lại. Công ty đã tồn tại trên hệ thống',
        ];
        $validator = Validator::make($request->all(), [
            'cus_name'     => 'required',
            'cus_email'    => 'required|email|unique:customer',
        ], $messages, $name);

        if ($validator->fails()) {
            return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
        } else {
            // Lưu thông tin vào database
            $customer=new Customer();
            $customer->cus_name=$request->input('cus_name');
            $customer->cus_email=$request->input('cus_email');
            $customer->cus_phone=$request->input('cus_phone');
            $customer->co_id=$request->input('co_id');
            // $customer->user_assign=$request->input('user_created');
            $customer->user_created=$request->input('user_created');
            // $customer->note=$request->input('note');
            $customer->save();

            return redirect()->back()
                        ->with($messages, 'Liên hệ '.$request->input('cus_name').' vừa được thêm vào !');
        }
    }

    function getEdit($id) {
        $customer = Customer::with('Company', 'UserCreated', 'UserAssign')->find($id);
        $company = Company::all();
        $user = User::all();
        $data = array(
            'data' => $customer,
            'company' => $company,
            'user'  => $user
        );
        return view('Admin/Customer/Edit')->with($data);
    }

    function postEdit(Request $request, $id) {
        $name = [
            'cus_name'  => 'Tên khách hàng',  
            'cus_email' => 'Email của khách hàng',
        ];

        $messages = [
            'cus_name.required' => ':attribute là bắt buộc nhập.',
            'cus_email.email' => ':attribute chưa đúng định dạng.',
            'cus_email.required' => ':attribute chưa được nhập.',
        ];
        $validator = Validator::make($request->all(), [
            'cus_name'     => 'required',
            'cus_email'    => 'required|email',
        ], $messages, $name);

        if ($validator->fails()) {
            return redirect('admin/customer/edit/'.$id)
                    ->withErrors($validator)
                    ->withInput();
        } else {
            $getcompany = explode('|', $request->input('co_id')); 
            $customer = Customer::find($id);
            $customer->cus_name=$request->input('cus_name');
            $customer->cus_email=$request->input('cus_email');
            $customer->cus_phone=$request->input('cus_phone');
            $customer->user_assign=$getcompany[1];
            $customer->co_id=$getcompany[0];
            $customer->note=$request->input('note');
            $customer->save();

            return redirect('admin/customer')
                            ->with('message', 'Thông tin khách hàng vừa được thay đổi thành công.');
        }
    }
}
