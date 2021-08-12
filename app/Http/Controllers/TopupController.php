<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\TopupServices;
use App\Services\OrderTopupServices;
use DB;
use Auth;

class TopupController extends Controller
{
    //

    private $topupService;
    private $orderTopupService;

    public function __construct(
        TopupServices $topupService,
        OrderTopupServices $orderTopupService        
    ){
        $this->topupService = $topupService; 
        $this->orderTopupService = $orderTopupService; 
    }

    public function index(){          
        return view('prepaid');
    }

    public function save(Request $request){
        $request->validate([
            'mobile_number' => ['required', 'regex:^(\+62|62|0)8[1-9][0-9]{6,9}$^', 'between:7,12'],
            'value' => ['required'],
        ]);
        $data = [
            "mobile_number"=>$request->mobile_number,
            "value"=>$request->value
        ];
        
        DB::beginTransaction();
        try {
            $topupData = $this->topupService->store($data);
            $orderTopUpData = $this->orderTopupService->store($data);            
            DB::commit();
            $obj = new \stdClass();
            $obj->total = $orderTopUpData->total;
            $obj->order_no = $orderTopUpData->order_no;
            $obj->mobile_number = $topupData->mobile_number;
            $obj->value = $data['value'];
            $obj->type = "topup";                
            return redirect()->route('success.index')->with(['data'=>$obj]);
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
        }                            
    }
}
