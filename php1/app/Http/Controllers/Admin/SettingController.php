<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Hash;
use Validator;
use DB;
use Auth;
use Illuminate\Validation\Rule;
use App\Model\Admin\Setting\City;
use App\Model\Admin\Setting\Cotype;
use App\Model\Admin\Setting\Contracttype;
use App\Model\Admin\Setting\Form;
use App\Model\Admin\Company;
use App\Model\Admin\Customer;
use App\User;

class SettingController extends Controller
{
    public function __construct() {
    	$this->middleware('auth');
    }
    ///////////////Page///////////////////
    function Setting() {
        return view('Admin.Setting.Setting');
    }

    ///////////////CITY///////////////////
    function City() {
        $city = City::all();
        $data = array(
            'data'=>$city,
        );
        return view('Admin.Setting.City')->with($data);
    }

    function postCity(Request $request) {
        $name = [
            'city_name' => 'Tên thành phố', 
        ];
        $messages = [
            'city_name.required' => ':attribute bắt buộc phải nhập.',
            'city_name.unique' => ':attribute đã tốn tại.',
        ];
        $validator = Validator::make($request->all(), [
            'city_name'     => 'required|max:255|unique:city',
        ], $messages, $name);

        if ($validator->fails()) {
            return redirect('admin/setting/city')
                    ->withErrors($validator)
                    ->withInput();
        } else {
            // Lưu thông tin vào database
            $city = new City();
            $city->city_name = $request->input('city_name');
            $city->save();

            return redirect('admin/setting/city')
                        ->with('message', 'Thành phố mới vừa được thêm vào hệ thống.');
        }
    }

    function editCity(Request $request) {
        $data = City::find($request->id_edit);
        $old_name = $data->city_name;
        $data->city_name = $request->city_name;
        $data->save();
        return redirect()->back()->with('message', 'Bạn đã sửa ('.$old_name.') thành ('.$request->city_name.')');
    }

    function deleteCity($id) {
        $nameCity = City::where('id', '=', $id)->first();
        $city = City::where('id', '=', $id)->delete();
        return redirect('admin/setting/city')->with('message', 'Đã xóa thành phố '.$nameCity->city_name.' thành công.');
    }

    function restoreCity($id) {
        $nameCity = City::where('id', '=', $id)->first();
        $city = City::where('id', '=', $id)->restore();
        return redirect('admin/setting/city')->with('message', 'Thanh phố '.$nameCity->city_name.' đã được khôi phục lại');
    }

    ////////////////COTYPE///////////////////
    function CoType() {
        $cotype = Cotype::all();
        $data = array(
            'data'=>$cotype,
        );
        return view('Admin.Setting.CoType')->with($data);
    }

    function postCoType(Request $request) {
        $name = [
            'cotype_name' => 'Tên thành phố', 
        ];
        $messages = [
            'cotype_name.required' => ':attribute bắt buộc phải nhập.',
            'cotype_name.unique' => ':attribute đã tốn tại.',
        ];
        $validator = Validator::make($request->all(), [
            'cotype_name'     => 'required|max:255|unique:cotype',
        ], $messages, $name);

        if ($validator->fails()) {
            return redirect('admin/setting/cotype')
                    ->withErrors($validator)
                    ->withInput();
        } else {
            // Lưu thông tin vào database
            $cotype = new Cotype;
            $cotype->cotype_name = $request->input('cotype_name');
            $cotype->save();

            return redirect('admin/setting/cotype')
                        ->with('message', 'Loại khách hàng '.$request->input('cotype_name').' vừa được thêm vào hệ thống.');
        }
    }

    function editCoType(Request $request) {
        $data = Cotype::find($request->id_edit);
        $old_name = $data->cotype_name;
        $data->cotype_name = $request->cotype_name;
        $data->save();
        return redirect()->back()->with('message', 'Bạn đã sửa ('.$old_name.') thành ('.$request->cotype_name.')');
    }

    function deleteCotype($id) {
        $cotypeName = Cotype::where('id', '=', $id)->first();
        $cotype = Cotype::where('id', '=', $id)->delete();
        return redirect('admin/setting/cotype')->with('message', 'Đã xóa '.$cotypeName->cotype_name.' thành công');
    }

    ////////////// CONTRACT TYPE ////////////
    function ContractType() {
        $contracttype = Contracttype::all();
        $form = Form::all();
        $data = array(
            'data' => $contracttype,
            'form' => $form,
        );
        return view('Admin.Setting.ContractType')->with($data);
    }

    function postContractType(Request $request) {
        $name = [
            'name' => 'Tên hợp đồng', 
        ];
        $messages = [
            'name.required' => ':attribute bắt buộc phải nhập.',
            'name.unique' => ':attribute đã tốn tại.',
        ];
        $validator = Validator::make($request->all(), [
            'name'     => 'required|max:255|unique:contract_type',
        ], $messages, $name);

        if ($validator->fails()) {
            return redirect('admin/setting/cttype')
                    ->withErrors($validator)
                    ->withInput();
        } else {
            // Lưu thông tin vào database
            $cttype = new Contracttype();
            $cttype->name = $request->input('name');
            $cttype->save();

            return redirect('admin/setting/cttype')
                        ->with('message', 'Thêm loại hợp đồng '.$request->input('name').' thành công.');
        }
    }

    function editContractType(Request $request) {
        $data = Contracttype::find($request->id_edit);
        $old_name = $data->name;
        $data->name = $request->name;
        $data->save();
        return redirect()->back()->with('message', 'Bạn đã sửa ('.$old_name.') thành ('.$request->name.')');
    }

    /////////////// FORM ///////////////////
    function Form() {
        $form = Form::all();
        $data = array(
            'data' => $form,
        );
        return view('Admin.Setting.Form')->with($data);
    }

    function getForm() {
        return view('Admin.Setting.addForm');
    }

    function postForm(Request $request) {
        $name = [
            'name' => 'Tên thành phố', 
            'code' => 'Mã form'
        ];
        $messages = [
            'name.required' => ':attribute bắt buộc phải nhập.',
            'code.required' => ':attribute bắt buộc nhập',
            'code.unique' => ':attribute đã tốn tại.',
        ];
        $validator = Validator::make($request->all(), [
            'name'     => 'required',
            'code'     => 'required|unique:form',
        ], $messages, $name);

        if ($validator->fails()) {
            return redirect('admin/setting/addform')
                    ->withErrors($validator)
                    ->withInput();
        } else {
            // Lưu thông tin vào database
            $form = new Form;
            $form->name = $request->name;
            $form->code = $request->code;
            $form->content = $request->form;
            $form->save();

            return redirect('admin/setting/form')
                        ->with('message', 'Form '.$request->code.' vừa được thêm');
        }
    }

    function getEditForm($id) {
        $form = Form::find($id);
        $data = array(
            'data' => $form,
        );
        return view('Admin.Setting.editForm')->with($data);
    }

    function postEditForm(Request $request, $id) {
        $form = Form::find($id);
        $name = [
            'name' => 'Tên thành phố', 
            'code' => 'Mã form'
        ];
        $messages = [
            'name.required' => ':attribute bắt buộc phải nhập.',
            'code.required' => ':attribute bắt buộc nhập',
            'code.unique' => ':attribute đã tốn tại.',
        ];
        $validator = Validator::make($request->all(), [
            'name'     => 'required',
            'code'     => 'required|'.Rule::unique('form')->ignore($form->id),
        ], $messages, $name);

        if ($validator->fails()) {
            return redirect('admin/setting/addform')
                    ->withErrors($validator)
                    ->withInput();
        } else {
            // Lưu thông tin vào database
            $form->name = $request->name;
            $form->code = $request->code;
            $form->content = $request->form;
            $form->save();

            return redirect('admin/setting/editform/'.$id)
                        ->with('message', 'Form '.$request->code.' vừa được sửa thành công');
        }
    }

    function formView($id) {
        $form = Form::find($id);
        $data = array(
            'data' => $form,
        );
        return view('Admin.Setting.FormView')->with($data);
    }

}
