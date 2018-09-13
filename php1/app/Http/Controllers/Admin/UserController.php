<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use App\User;
use DB;
use Auth;
use Validator;
use Hash;
use Mail;

class UserController extends Controller
{
    public function __construct() {
    	$this->middleware('auth');
    }
    ////////////// USER MANAGER ////////////
    function User() {
        $user = User::all();
        $data = array(
            'data'=>$user,
        );
        return view('Admin.User.User')->with($data);
    }

    function postUser(Request $request) {
        $name = [
            'name'      => 'Tên nhân viên', 
            'user'      => 'Tên đăng nhập (Username)', 
            'password'  => 'Mật khẩu',
            'email'     => 'Email', 
            'role'      => 'Quyền hạn',
            'avatar'    => 'Ảnh đại diện',

        ];
        $messages = [
            'user.required'         => ':attribute không được để trống.',
            'user.unique'           => ':attribute đã tốn tại.',
            'email.required'        => ':attribute không được để trống.',
            'email.unique'          => ':attribute đã tốn tại.',
            'password.required'     => ':attribute không được để trống',
            'name.required'         => ':attribute không được để trống',
            'role.required'         => ':attribute chưa được chọn',
            'avatar.mimes'          => ':attribute phải là định dạng ảnh JPG, JPEG, PNG, BMP'
        ];
        $validator = Validator::make($request->all(), [
            'user'         => 'required|max:50|unique:users',
            'email'        => 'required|unique:users',
            'password'     => 'required',
            'name'         => 'required', 
            'role'         => 'required',
            'avatar'       => 'mimes:jpg,jpeg,bmp,png', 
        ], $messages, $name);


        if ($validator->fails()) {
            return redirect('admin/setting/user')
                    ->withErrors($validator)
                    ->withInput();
        } else {
            if($request->hasFile('avatar')){
                $avatar_path = $request->input('user');
                $avatar = $request->file('avatar');
                $avatar_name = time() . '-' . $avatar->getClientOriginalName();
                $avatar->move('upload/user/'.$avatar_path.'/avatar/', $avatar_name);
            } else {
                $avatar_name = 'avatar.png';
            }
            // Lưu thông tin vào database
            $user=new User;
            $user->name=$request->name;
            $user->user=$request->user;
            $user->email=$request->email;
            $user->password=Hash::make($request->password);
            $user->avatar=$avatar_name;
            $user->phone=$request->phone;
            $user->sex=$request->sex;
            $user->role=$request->role;
            $user->sub_role=$request->sub_role;
            $user->save();

            $input = $request->all();
            Mail::send('Admin.Mail.CreatedUser', [   
                            'name'=>$request->name,
                            'email'=>$request->email, 
                            'pass'=>$request->password
                        ],
                    function($message) use ($request) {
                        $message->from('thongbao@vanlienhoa.com', "Vạn Liên Hoa System");
                        $message->subject('Vạn Liên Hoa System - Chào mừng nhân viên');
                        $message->to($request->email);
                    }
                );

            return redirect('admin/setting/user')
                        ->with('message', 'THÊM THÀNH CÔNG.');
        }
    }

    function getEditUser($id) {
        $user = User::with('Role')->find($id);
        $data = array(
            'data' => $user,
        );
        if(!isset($user)) {
            return redirect()->route('getEditUser')->with('message', 'Không tồn tại nhân viên');
        } else {
            return view('Admin.User.EditUser')->with($data);
        }
    }

    function postEditUser(Request $request, $id) {
        $user= User::find($id);
        $name = [
            'name'      => 'Tên nhân viên', 
            'email'     => 'Email', 
            'role'      => 'Quyền hạn',
            'avatar'    => 'Ảnh đại diện',
        ];
        $messages = [
            'email.required'        => ':attribute không được để trống.',
            'email.unique'          => ':attribute đã tốn tại.',
            'name.required'         => ':attribute không được để trống',
            'role.required'         => ':attribute chưa được chọn',
            'avatar.mimes'          => ':attribute phải là định dạng ảnh JPG, JPEG, PNG, BMP',
        ];
        $validator = Validator::make($request->all(), [
            'email'        => 'required|email|'.Rule::unique('users')->ignore($user->id),
            'name'         => 'required', 
            'role'         => 'required',
            'avatar'       => 'mimes:jpg,jpeg,bmp,png', 
        ], $messages, $name);

               

        if ($validator->fails()) {
            return redirect('admin/setting/user/edit/'.$id)
                    ->withErrors($validator)
                    ->withInput();
        } else {
            if($request->hasFile('avatar')){
                $avatar_path = $request->input('old_user');
                $avatar = $request->file('avatar');
                $avatar_name = time() . '-' . $avatar->getClientOriginalName();
                $avatar->move('upload/user/'.$avatar_path.'/avatar/', $avatar_name);
            } else {
                $avatar_name = $request->input('old_avatar');
            } 
            // Lưu thông tin vào database
            $user->name=$request->name;
            $user->email=$request->email;
            if(isset($request->password)) {
                $user->password = Hash::make($request->password);
            }
            $user->avatar=$avatar_name;
            $user->phone=$request->phone;
            $user->sex=$request->sex;
            $user->role=$request->role;
            $user->sub_role=$request->sub_role;
            $user->save();

            return redirect('admin/setting/user')
                        ->with('message', 'SỬA THÀNH CÔNG.');
        }
    }

    function deleteUser($id) {
        $city = User::where('id', '=', $id)->delete();
        return redirect()->route('getUser')->with('message', 'ĐÃ XÓA.');
    }

    function getProfile($id) {
        $user = User::with('Role')->find($id);
        $data = array(
            'data' => $user,
        );
        if(!isset($user)) {
            return redirect()->route('getUser')->with('message', 'Không tồn tại nhân viên');
        } elseif(Auth::id()!=$id) {
            return redirect()->route('getUser')->with('message', 'Bạn không phải nhân viên này');
        } else {
            return view('Admin.User.Profile')->with($data);
        }
    }

    function postAvatarCover(Request $request, $id) {
        $user= User::find($id);
        $name = [
            'avatar'    => 'Ảnh đại diện',
            'Cover'    => 'Ảnh bìa',
        ];
        $messages = [
            'avatar.mimes'          => ':attribute phải là định dạng ảnh JPG, JPEG, PNG, BMP',
            'cover.mimes'          => ':attribute phải là định dạng ảnh JPG, JPEG, PNG, BMP',
        ];
        $validator = Validator::make($request->all(), [
            'avatar'       => 'mimes:jpg,jpeg,bmp,png', 
            'cover'       => 'mimes:jpg,jpeg,bmp,png',
        ], $messages, $name);

               

        if ($validator->fails()) {
            return redirect('admin/profile/'.$id)
                    ->withErrors($validator)
                    ->withInput();
        } else {
            //// Upload Ảnh avatar /////
            if($request->hasFile('profile_avatar')){
                $avatar_path = $request->input('old_user');
                $avatar = $request->file('profile_avatar');
                $avatar_name = time() . '-' . $avatar->getClientOriginalName();
                $avatar->move('upload/user/'.$avatar_path.'/avatar/', $avatar_name);
            } else {
                $avatar_name = $request->input('old_avatar');
            }

            /// Upload ảnh Cover ////
            if($request->hasFile('profile_cover')){
                $cover_path = $request->input('old_user');
                $cover = $request->file('profile_cover');
                $cover_name = time() . '-' . $cover->getClientOriginalName();
                $cover->move('upload/user/'.$cover_path.'/cover/', $cover_name);
            } else {
                $cover_name = $request->input('old_cover');
            } 
            
            // Lưu thông tin vào database
            $user->cover=$cover_name;
            $user->avatar=$avatar_name;
            $user->save();

            return redirect()->back()
                        ->with('message', 'SỬA THÀNH CÔNG.');
        }
    }


    function FileManager() {
        return view('Admin.User.FileManager');
    }
}
