<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\MessageBag;
use Validator;
use DB;
use Auth;
use Illuminate\Validation\Rule;
use App\Model\Admin\Company;
use App\Model\Admin\Customer;
use App\Model\Admin\Setting\Contracttype;
use App\Model\Admin\Contract;

class CompanyController extends Controller
{   
    public function __construct() {
    	$this->middleware('auth');
    }

    //Danh sách Công ty
    function getIndex() {
        $company = Company::with('Customer', 'City', 'Type')->orderBy('id', 'desc')->paginate(25);
        $data = array(
            'data'=>$company,
        );
        return view('Admin/Company/Company')->with($data);
    }

    function MyCompany($id) {
        if(Auth::id() == $id) {
            $company = Company::with('Customer', 'City', 'Type')->where('user_assign', '=', $id)->orderBy('id', 'desc')->paginate(25);
            $data = array(
                'data'=>$company,
            );
            return view('Admin/Company/Company')->with($data);
        } else {
            return redirect()->back();
        }
    }

    //Tìm kiếm công ty
    public function search(Request $request) {
        $keyword = $request->input('key');
        $company = Company::with('Customer', 'City', 'Type')->orderBy('company.id','DESC')
                                       ->where("co_name", "LIKE","%$keyword%")
                                       ->orWhere("co_vat", "LIKE", "%$keyword%")
                                       ->get();

        $data = array(
            'data'=>$company,
        );
        return view('Admin/Company/Search')->with($data);
    }

    ////////////////////THÊM CÔNG TY//////////////////
    //Form Thêm công ty
    function getCompany() {
        $city = DB::table('city')->get();
        $type = DB::table('cotype')->get();
        $user = DB::table('users')->where('role', '=', '2')->get();
        $data = array(
            'city' => $city,
            'type' => $type,
            'user' => $user
        );
        return view('Admin/Company/Add')->with($data);
    }

    //Lưu công ty vào cơ sở dữ liệu
    function postCompany(Request $request) {
        //dd($request->all());
        $name = [
            'co_name'        => 'Tên công ty',
            'co_vat'         => 'Mã số thuế',  
            'co_localtion'   => 'Thành phố',  
            'co_type'        => 'Loại công ty',
            'logo'           => 'Logo công ty',
        ];

        $messages = [
            'co_name.required'           => ':attribute không được để trống.',
            'co_name.unique'             => ':attribute đã tồn tại trên hệ thống',
            'co_vat.required'            => ':attribute không được để trống.',
            'co_vat.unique'              => ':attribute đã tồn tại trên hệ thống',
            'co_localtion.required'      => ':attribute chưa được chọn.',
            'co_type.required'           => ':attribute chưa được chọn.',
            'logo.mimes'                 => ':attribute phải là định dạng ảnh',
        ];
        $validator = Validator::make($request->all(), [
            'co_name'       => 'required|max:255|unique:company',
            'co_vat'        => 'required|unique:company',
            'co_localtion'  => 'required',
            'co_type'       => 'required',
            'logo'          => 'mimes:jpg,jpeg,bmp,png'
        ], $messages, $name);


        if ($validator->fails()) {
            return redirect('admin/company/add')
                    ->withErrors($validator)
                    ->withInput();
            } else {

            if($request->hasFile('logo')){
                $logo_path = $request->input('co_vat');
                $logo = $request->file('logo');
                $logo_name = time() . '-' . $logo->getClientOriginalName();
                $logo->move('upload/company/'. $logo_path.'/logo/' , $logo_name);
            } else {
                $logo_name = 'logo.png';
            }
            // Lưu thông tin vào database
            $company=new Company();
            $company->co_name=$request->input('co_name');
            $company->co_vat=$request->input('co_vat');
            $company->co_logo=$logo_name;
            $company->co_folder=$request->input('co_vat');
            $company->co_address=$request->input('co_address');
            $company->co_address_vat=$request->input('co_address_vat');
            $company->co_phone=$request->input('co_phone');
            $company->co_fax=$request->input('co_fax');
            $company->co_mail=$request->input('co_email');
            $company->co_career=$request->input('co_career');
            $company->co_localtion=$request->input('co_localtion');
            $company->co_type=$request->input('co_type');
            $company->user_created=$request->input('user_created');
            $company->user_assign=$request->input('user_assign');
            $company->note=$request->input('co_note');
            $company->save();

            return redirect('admin/company/info/'.$company->id)
                        ->with('message', 'THÊM THÀNH CÔNG.');
        }

    }
    ////////////////////END THÊM CÔNG TY//////////////


    //Show thông tin công ty
    function getInfo($id) {
        $company = Company::with('Customer', 'City', 'Type', 'UserAssign', 'UserCreated','Contract.Contracttype')->find($id);
        $contracttype = Contracttype::all();
        $data = array(
            'data'=>$company,
            'cttype' => $contracttype,
        );
        if(!isset($company)) {
            return redirect()->back()->with('message', 'Công ty không tồn tại');
        } else {
            return view('Admin.Company.Info')->with($data);
        }
    }

    ///////////////START SỬA THÔNG TIN CÔNG TY/////////////
    //Sửa công ty: Lấy thông tin công ty cần sửa
    function getEdit($id) {
        $company = Company::with('Customer', 'City', 'Type', 'UserAssign', 'UserCreated')->find($id);
        $city = DB::table('city')->get();
        $type = DB::table('cotype')->get();
        $user = DB::table('users')->where('role', '=', '2')->get();
        $data = array(
            'data' => $company,
            'city' => $city,
            'type' => $type,
            'user' => $user
        );
        if(!isset($company)) {
            return redirect('admin/company')->with('message', 'CÔNG TY KHÔNG TỒN TẠI.');
        }
        else {
            return view('Admin/Company/Edit')->with($data);
        }
    }

    //Sửa công ty: Ghi lại vào cơ sở dữ liệu
    function postEdit(Request $request, $id) {
        $company = Company::find($id);
        $name = [
            'co_name'        => 'Tên công ty',
            'co_vat'         => 'Mã số thuế',  
            'co_localtion'   => 'Thành phố',  
            'co_type'        => 'Loại công ty',
            'logo'           => 'Logo công ty',
            'logo'           => 'Logo công ty',
        ];

        $messages = [
            'co_name.required'           => ':attribute không được để trống.',
            'co_name.unique'             => ':attribute đã tồn tại.',
            'co_vat.required'            => ':attribute không được để trống.',
            'co_vat.unique'              => ':attribute đã tồn tại.',
            'co_localtion.required'      => ':attribute chưa được chọn.',
            'co_type.required'           => ':attribute chưa được chọn.',
            'logo.mimes'                 => ':attribute phải là định dạng ảnh',
        ];
        $validator = Validator::make($request->all(), [
            'co_name'       => 'required|'.Rule::unique('company')->ignore($company->id),
            'co_vat'        => 'required|'.Rule::unique('company')->ignore($company->id),
            'co_localtion'  => 'required',
            'co_type'       => 'required',
            'logo'          => 'mimes:jpg,jpeg,bmp,png',
        ], $messages, $name);

        

        if ($validator->fails()) {
            return redirect('admin/company/edit/'.$id)
                    ->withErrors($validator)
                    ->withInput();
        } else {

            if($request->hasFile('logo')){
                $logo_path = $request->input('co_vat');
                $logo = $request->file('logo');
                $logo_name = time() . '-' . $logo->getClientOriginalName();
                $logo->move('upload/company/'. $logo_path.'/logo/' , $logo_name);
            } else {
                $logo_name = $request->input('old_logo');
            }
            // Lưu thông tin vào database
            $company->co_name=$request->input('co_name');
            $company->co_vat=$request->input('co_vat');
            $company->co_logo=$logo_name;
            $company->co_address=$request->input('co_address');
            $company->co_address_vat=$request->input('co_address_vat');
            $company->co_phone=$request->input('co_phone');
            $company->co_fax=$request->input('co_fax');
            $company->co_mail=$request->input('co_email');
            $company->co_career=$request->input('co_career');
            $company->co_localtion=$request->input('co_localtion');
            $company->user_assign=$request->input('user_assign');
            $company->co_type=$request->input('co_type');
            $company->note=$request->input('co_note');
            $company->save();

            $customer = Customer::where('co_id', '=', $id)->get();
            foreach($customer as $cus){
                $cus->user_assign = $request->input('user_assign');
                $cus->save();
            }


            return redirect('admin/company/info/'.$company->id)
                            ->with('message', 'SỬA THÀNH CÔNG.');
        }
    }
    ////////////////END. SỬA THÔNG TY CÔNG TY///////////////
}
