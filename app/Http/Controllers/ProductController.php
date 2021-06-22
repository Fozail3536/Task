<?php

namespace App\Http\Controllers;
use App\Domain;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Product;
class ProductController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    public function GetProductDetails($id){

        //getting product detail with product sizes from db
        $product_data = Product::where('id',$id)->with('productSizes')->first();
        
        //check if product object is not empty
        if($product_data)
        {
            //declaring empty array for sizes
            $sizes=array();
            foreach($product_data->productSizes as $single_size)
            {
                array_push($sizes,$single_size->size);
            }

            //Making data into proper formate 
            $response_data = array
            (
                'product_name' => $product_data->product_name,
                'product_price' => $product_data->product_price,
                'product_tenure' => $product_data->product_tenure,
                'product_image' => $product_data->product_image,
                'product_sizes'  => $sizes
            );
            return response()->json($response_data,200);
        }
        
    }

    


}
