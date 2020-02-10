<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function createProduct(Request $request)
    {
        $product = new Product;

        $product->name = $request->name;
        $product->user_id = $request->user_id;
        $product->quantity = $request->quantity;
        $product->priceKg = $request->priceKg;
        $product->type = $request->type;
        $product->save();

        return response()->json([$product]);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listProduct()
    {
        return Product::All();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showProduct($id)
    {
        $product = User::find($id);

        if($product){
            return response()->success($product);
        }else{
            $data = "Produto não encontrado, verifique o id novamente";
            return response()->error($data, 400);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editProduct(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        if($request->name)
            $product->name = $request->name;
        if($request->quantity)
            $product->quantity = $request->quantity;
        if($request->priceKg)
            $product->priceKg = $request->priceKg;
        if($request->type)
            $product->type = $request->type;
        $product->save();

        return response()->json([$product]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteProduct($id)
    {
        Product::destroy($id);

        return response()->json(['Produto deletado']);
    }
}
