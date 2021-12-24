<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JsonUtility;
use App\Models\CdProduct;
use App\Models\GameProduct;
use App\Models\ShopProduct;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jsonString = file_get_contents(base_path('public/products.json'));
        $datas = json_decode($jsonString, true);
        $bookproducts   = [];
        $cdproducts = [];

        foreach ($datas as $product) {
            if($product['type'] == 'cd') $cdproducts[] = $product;
            if($product['type'] == 'book') $bookproducts[] = $product;
        } 
        return view('index', compact('bookproducts', 'cdproducts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'type' => 'required',
            'title' => 'required|max:225',
            'firstname' => 'required|max:225',
            'sname' => 'required|max:225',
            'price' => 'required|between:0,99.99',
            'pageslenths' => 'required|integer',
            ]);
            
        $type = $request->input('type');
        $title = $request->input('title');
        $f_name = $request->input('firstname');
        $sname = $request->input('sname');
        $price = $request->input('price');
        $pages = $request->input('pageslenths');
        
        $json_model = new JsonUtility;
        $create_status = $json_model->addNewProduct('products.json', $type,$title,$f_name,$sname,$price,$pages);
        if($create_status){
            return redirect('/')->with('success','product inserted successfully');
        }else{
            return back()->with('error','error while inserting a creatain product');
        } 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $shopproduct = JsonUtility::getProductWithId('products.json', $id);
        return view('edit', compact('shopproduct'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'sname' => 'required|max:255',
            'firstname' => 'required|max:255',
            'price' => 'required|between:0,99.99',
            'pagelengths' => 'required|integer',
        ]);
        // dd($request->all());
        // assigning to a variable to pass it to jsonutility model
        $type = $request->input('type');
        $title = $request->input('title');
        $fname = $request->input('firstname');
        $sname = $request->input('sname');
        $price = $request->input('price');
        $pages = $request->input('pagelengths');
        
        $update_status = JsonUtility::updateProductWithId('products.json',$id,$title,$fname,$sname,$price,$pages);
        if($update_status){
            return redirect('/')->with('success','product updated successfully');
        }else{
            return back()->with('error','error while updated a product');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete_status = JsonUtility::deleteProductWithId('products.json',$id);
        if($delete_status){
            return redirect('/')->with('success','product deleted successfully');
        }else{
            return back()->with('error','error while deleting a product');
        }
    }
}
