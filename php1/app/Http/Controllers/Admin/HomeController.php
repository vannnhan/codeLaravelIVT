<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use DB;
use Auth;
use App\Model\Admin\Contract;

class HomeController extends Controller
{
    //
    public function __construct() {
    	$this->middleware('auth');
    }
    
    function getIndex() {
        $countCo            = DB::table('company')->count();                                            
        //Số lượng công ty

        //$myCountCo          = DB::table('company')->where('user_assign', '=', Auth::id())->count();     
        //Số lượng công ty của nhân viên

        $countCus           = DB::table('customer')->count();                                           
        //Số lượng khách hàng

        //$myCuuntCus         = DB::table('customer')->where('user_assign', '=', Auth::id())->count();    
        //Số lượng khách hàng của nhân viên

        $thisMonth          = date("m",strtotime(Carbon::now()));
        $today              = date("Y-m-d",strtotime(Carbon::now()));
        $addDay             = date("Y-m-d",strtotime(Carbon::now()->addDays(5)));
        //Tháng này

        $countContract      = DB::table('contract')->where('created_month', '=', $thisMonth)->count();  
        //Số lượng hợp đồng trong tháng

        $TotalValueCont     = DB::table('contract')->where('created_month', '=', $thisMonth)->sum('value');  
        //Số lượng hợp đồng trong tháng

        $myCountContract    = DB::table('contract')->where('user_created', '=', Auth::id())->where('created_month', '=', $thisMonth)->count();
        //Số lượng hợp đồng trong tháng của nhân viên

        $expiredContract    = Contract::with('Contracttype', 'Company')->whereBetween('day_end', [$today, $addDay])->get();
        //Hợp đồng sắp hết hạn

        $contractProgress   = Contract::with('Contracttype', 'Company')->where('status', '=', '3')->orderBy('updated_at', 'desc')->Paginate(5);
        //Show danh sách hợp đồng đang tiến hành

        $countContPro       = $contractProgress->count();
        //Đến tổng số lượng hợp đồng đang tiến hành

        $myContractProgress   = Contract::with('Contracttype', 'Company')->where('status', '=', '3')->where('user_created', '=', Auth::id())->orderBy('updated_at', 'desc')->Paginate(5);
        //Show danh sách hợp đồng đang tiến hành của user

        $data = array(
            'countCo'           => $countCo, //Tổng số công ty
            //'myCountCo'         => $myCountCo, //Tổng số công ty của user
            'countCus'          => $countCus, //Tổng số khách hàng
            //'myCountCus'        => $myCuuntCus, //Tổng số khách hàng của user
            'contract'          => $countContract, //Tổng số hợp đồng trong tháng
            'myCountContract'   => $myCountContract, //Tổng số hợp đồng trong tháng của user
            'expiredContract'   => $expiredContract, //Danh sách hợp đồng sắp hết hạn
            'contractProgress'  => $contractProgress, //Danh sahcs hợp đồng đang thực hiện
            'myContractProgress'=> $myContractProgress, //Danh sách hợp đồng đang thực hiện cưa user
            'TotalValueCont'    => $TotalValueCont, //Tổng doanh thu tháng

        );
        return view('Admin/Home')->with($data);
    }
}
