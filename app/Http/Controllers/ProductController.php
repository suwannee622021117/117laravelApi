<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = [
            'name' => 'index',
            'payload' => Product::all(),
        ];
        return $result;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fields = $request -> validate([
            'pname' => 'required | string',
            'ptype' => 'required | integer',
            'price' => 'required',
        ]);
        $productt =new Product;
        $productt -> pname = $request ->pname;
        $productt -> ptype = $request ->ptype;
        $productt -> price = $request ->price;
        $productt -> save();

        $result =[
            'name' => 'store',
            'payload' => $productt,
        ];
        return $result;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $result =[
            'name' => 'show',
            'payload' => Product::find($id),
        ];
        return $result;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function update($id , Request $request)
    {
        $productt = Product::find($id);
        $productt -> update($request ->all());
        $result =[
            'name' => 'update',
            'payload' => $productt,
        ];
            return $result;
    //     $result = ['name' => 'update', 'payload' => $request->all()];
    //     return $result;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    { 
        Product::find($id) ->delete();
        $result =[
            'name' => 'destroy',
            'message' => 'data delete successfully',
            'id' => $id
        ];

            return $result;
        
        // $result = ['name' => 'destroy', 'payload' => $id()];
        // return $result;
    }
}
