<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ProductServices;
use App\Services\OrderProductServices;
use DB;
use Auth;

class ProductController extends Controller
{
    private $productServices;
    private $orderProductService;

    public function __construct(
        ProductServices $productServices,
        OrderProductServices $orderProductService        
    ){
        $this->productServices = $productServices; 
        $this->orderProductService = $orderProductService; 
    }

    public function index(){          
        return view('product');
    }

    public function save(Request $request){
        $request->validate([
            'product' => ['required', 'between:10,150'],
            'shipping_address' => ['required', 'between:10,150'],
            'price' => ['required','numeric'],
        ]);
        $data = [
            "product"=>$request->product,
            "price"=>$request->price,
            "shipping_address"=>$request->shipping_address
        ];
        
        DB::beginTransaction();
        try {
            $productData = $this->productServices->store($data);
            $orderProductData = $this->orderProductService->store($data);            
            DB::commit();
            $obj = new \stdClass();
            $obj->total = $orderProductData->total;
            $obj->order_no = $orderProductData->order_no;
            $obj->product = $productData->product;
            $obj->price = $productData->price;
            $obj->shipping_address = $productData->shipping_address;
            $obj->type = "product";                
            return redirect()->route('success.index')->with(['data'=>$obj]);
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
        }                            
    }
}
