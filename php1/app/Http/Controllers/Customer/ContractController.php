<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Contract;
use App\Model\Admin\Contractaction;
use App\Model\Admin\Setting\Contractstatus;
use App\Model\Admin\Compnay;

class ContractController extends Controller
{
    function ContractTimeline($code) {
        $contract = Contract::with('ContractAction', 'Contracttype', 'ContractStatus', 'UserCreated', 'Company', 'ContractAction.Contract.Company')->where('code', '=', $code)->first();
        $count = $contract->count();
        $data = [
            'data' => $contract,
        ];
        return view('Customer.Contract.ContractTimeline')->with($data);
    }

    function ContractSearch() {
        return view('Customer.SearchContract');
    }

    function ContractSearchget(Request $request) {
        $code = $request->input('code');
        $findcode = Contract::where('code', '=', $code)->first();
        if(!isset($findcode)){
            return redirect()->route('CustomerHome')->with('message', 'MÃ HỢP ĐỒNG KHÔNG TỒN TẠI');
        } else {
        return redirect()->route('ContractRoute', $code);
        }
    }
}
