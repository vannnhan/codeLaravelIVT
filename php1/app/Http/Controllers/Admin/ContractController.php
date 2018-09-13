<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Contract;
use App\Model\Admin\Contractaction;
use App\Model\Admin\Setting\Contractstatus;
use App\Model\Admin\Compnay;
use App\User;
use Carbon\Carbon;
use Auth;
use Mail;
use Validator;
use Illuminate\Validation\Rule;

class ContractController extends Controller
{
    public function __construct() {
    	$this->middleware('auth');
    }

    function getContract() {
        $contract = Contract::with('Company', 'UserCreated', 'ContractStatus')->orderBy('id', 'DESC')->paginate(25);
        $data = array(
            'data' => $contract,
        );
        return view('Admin.Contract.Contract')->with($data);
    }

    function ContractProcessing($id) {
        $contract = Contract::with('Company', 'UserCreated', 'ContractStatus')->where('status', '=', $id)->paginate(25);
        $data = array(
            'data' => $contract,
        );
        return view('Admin.Contract.Contract')->with($data);
    }

    function ContractWork() {
        $contract = Contract::with('Company', 'UserCreated', 'ContractStatus')->where('user_work', '=', Auth::id())->paginate(25);
        $data = array(
            'data' => $contract,
        );
        return view('Admin.Contract.Contract')->with($data);
    }

    function MyContract($id) {
        $contractAuth = Contract::with('Company', 'UserCreated', 'ContractStatus')->where('user_created', '=', $id)->paginate(25);
        $data = array(
            'data' => $contractAuth,
        );
        return view('Admin.Contract.Contract')->with($data);
    }

    function postAddContract(Request $request) {
        $name = [
            'contract_type'        => 'Loại hợp đồng',
            'contract_value'       => 'Giá trị hợp đồng' 
        ];

        $messages = [
            'contract_type.required'           => ':attribute không được để trống.',
            'contract_value.required'          => ':attribute không được để trống',
            'contract_value.numeric'          => ':attribute phải là số',
        ];
        $validator = Validator::make($request->all(), [
            'contract_type'       => 'required',
            'contract_value'      => 'required|numeric'  
        ], $messages, $name);
        if ($validator->fails()) {
            return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            } else {
                $contract=new Contract();
                $contract->type=$request->contract_type;
                $contract->value=$request->contract_value;
                $contract->day_begin=$request->contract_begin;
                $contract->day_end=$request->contract_end;
                $contract->co_id=$request->contract_co;
                $contract->user_created=$request->contract_user;
                $contract->status='1';
                $contract->created_month=date("m",strtotime(Carbon::now()));
                $contract->save();

            }
        return redirect()->back()
                    ->with('message', 'Hợp đồng vừa được thêm vào hệ thống thành công');
    }

    function ContractEdit(Request $request, $id) {
        $contract= Contract::find($id);
        $name = [
            'contract_value'       => 'Giá trị hợp đồng', 
            'code'                 => 'Mã hợp đồng' 
        ];

        $messages = [
            'contract_value.required' => ':attribute không được để trống',
            'code.required'           => ':attribute không được để trống',
            'code.unique'             => ':attribute đã tồn tại'
        ];
        $validator = Validator::make($request->all(), [
            'contract_value'      => 'required',
            'code'       => 'required|'.Rule::unique('contract')->ignore($contract->id),
        ], $messages, $name);
        
        if ($validator->fails()) {
            return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            } else {
                $contract->code      = $request->code;
                $contract->value     = $request->contract_value;
                $contract->day_begin = $request->contract_begin;
                $contract->day_end   = $request->contract_end;
                $contract->status    = $request->contract_status;   
                if($contract->status == '2' AND $request->input('mail_contact')!== null AND  $contract->send_email_confim==null) {
                    Mail::send('Admin.Mail.CreatedContract', [
                        'name_contract'=>$request->name_contract,
                        'name_company' =>$request->name_company,   
                        'code'         =>$contract->code,
                        'value'        =>$request->contract_value, 
                        'begin'        =>$request->contract_begin,
                        'end'          =>$request->contract_end,
                        'assign_name'  =>$request->assign_name,
                        'assign_phone' =>$request->assign_phone,
                        'assign_email' =>$request->assign_email,

                        ],
                        function($message) use ($request, $contract) {
                            $message->from('thongbao@vanlienhoa.com', "Vạn Liên Hoa System");
                            $message->subject('Hợp đồng #'.$contract->code.' đã được tạo trên hệ thống - Công ty Vạn Liên Hoa');
                            $message->to($request->input('mail_contact'));                 
                        }
                    );
                    $contract->send_email_confim = '1';
                }
                $contract->save();
                
            }

        
        return redirect()->back()
                    ->with('message', 'Thông tin hợp đồng vừa được thay đổi thành công.');
    }

    function ContractNote(Request $request, $id) {
        $contract= Contract::find($id);
        $contract->note= $request->contract_note;
        $contract->save();   

        return redirect()->back()
                    ->with('message', 'Ghi chú cho hợp đồng vừa được cập nhật');
    }

    function UserWork(Request $request, $id) {
        $contract= Contract::find($id);
        $contract->user_work= $request->contract_work;
        $contract->save();   

        return redirect()->back()
                    ->with('message', 'Giao công việc cho nhân viên hoàn tất');
    }

    function deleteContract($id) {  
        $contractName = Contract::where('id', '=', $id)->first();
        $contract = Contract::where('id', '=', $id)->delete();
        return redirect()->back()->with('redmessage', 'Đã xóa hợp đồng '.$contractName->code);
    }

    function expiredContract() {
        $today = date("Y-m-d",strtotime(Carbon::now()));
        $addDay = date("Y-m-d",strtotime(Carbon::now()->addDays(5)));
        $contract = Contract::with('Company', 'Company.Customer', 'Contracttype', 'Contracttype.Form', 'Company.UserAssign')->whereBetween('day_end', [$today, $addDay])->where('send_mail_5day', '=', null)->get();
        foreach($contract as $c){
            $contract_id         = $c->id;     
            $contract_name       = $c->Contracttype->name;
            $contract_code       = $c->code;
            $contract_end        = $c->day_end;
            $company_name        = $c->Company->co_name;
            $form                = $c->Contracttype->Form->content;
            $user_assign         = $c->Company->UserAssign->name;
            $user_assign_email   = $c->Company->UserAssign->email;
            $user_assign_phone   = $c->Company->UserAssign->phone;
            foreach($c->Company->Customer as $cus){
                $customer_name  = $cus->cus_name;
                $customer_email = $cus->cus_email;
                if($c!== null) {
                    Mail::send('Admin.Mail.ContractExpired', [
                        'contract_name'  =>$contract_name,
                        'contract_code'  =>$contract_code,   
                        'contract_end'   =>$contract_end,
                        'company_name'   =>$company_name, 
                        'customer_name'  =>$customer_name,
                        'customer_email' =>$customer_email,
                        'form'           =>$form,
                        'assign_name'    =>$user_assign,
                        'assign_email'   =>$user_assign_email, 
                        'assign_phone'   =>$user_assign_phone,    
                        ],
                        function($message) use ($contract_code, $customer_email) {
                            $message->from('thongbao@vanlienhoa.com', "Vạn Liên Hoa System");
                            $message->subject('Hợp đồng #'.$contract_code.' hết hạn - Công ty Vạn Liên Hoa');
                            $message->to($customer_email);                 
                        }
                    );
                    $update = Contract::find($contract_id);
                    $update->send_mail_5day = '1';
                    $update->save();
                } 
            }
        }

        $data = ['data' => $contract];
        return view('Admin.Contract.Expired')->with($data);
    }

    function ContractInfo($id) {
        $contract = Contract::with('ContractAction', 'Contracttype', 'ContractStatus', 'UserCreated', 'UserWork', 'Company', 'Company.Customer', 'Company.UserAssign')->orderBy('id','DESC')->find($id);
        $userWork = User::where('role', '=', '4')->get();
        $data = [
            'data' => $contract,
            'userWork' => $userWork,
        ];
        return view('Admin.Contract.infoContract')->with($data);
    }

    function ContractAction(Request $request) {
        $name = [
            'contract_name_action'       => 'Tên tiến độ', 
            'contract_progress'          => 'Đã hoàn thành',
        ];

        $messages = [
            'contract_name_action.required'          => ':attribute không được để trống',
            'contract_progress.numeric'          => ':attribute chỉ được nhập số',
        ];
        $validator = Validator::make($request->all(), [
            'contract_name_action'      => 'required',
            'contract_progress'         => 'numeric',
        ], $messages, $name);
        
        if ($validator->fails()) {
            return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            } else {
                $contractAction = new Contractaction;
                $contractAction->contract=$request->contract_id_action;
                $contractAction->name=$request->contract_name_action;
                $contractAction->note=$request->contract_name_note;
                $contractAction->images=$request->filepath;
                $contractAction->save();

                $contractProgress = Contract::find($request->contract_id_action);
                $contractProgress->progress = $request->contract_progress;
                $contractProgress->save();
            }

        return redirect()->back()
                    ->with('message', 'Tiến độ đã được thêm vào thành công.');
    }


}
