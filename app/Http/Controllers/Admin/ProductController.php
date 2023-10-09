<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use Str;
use App\Models\Product;
use App\Models\Brand;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::OrderBy('created_at', 'DESC')->paginate(10);
        return view('Admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $brands=Brand::OrderBy('brand')->get();
        return view('Admin.products.create', compact('brands'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductStoreRequest $request)
    {

        $product = $request->only('nameProduct', 'brand', 'idProduct', 'sizeProduct', 'descriptionProduct', 'priceProduct', 'quantityProduct');
        $product['slug']  = Str::slug($product['nameProduct']);
        $product['created_at'] = now();
        $product['updated_at'] = now();
        //tạo tên file
        $fileName = $request->idProduct . '.' . rand(1,1000) . time() . '.' . $request->file('imgProduct')->extension();
        //lưu trữ vào storage
        $request->file('imgProduct')->storeAs('public/product', $fileName);
        //tạo đường dẫn lưu vào db
        $imgPath = 'storage/product/' . $fileName;
        $product['imgProduct']=$imgPath;
        // dd($product);
        Product::create($product);
        return redirect()->route('admin.product.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $brands=Brand::OrderBy('brand')->get();
        return view('Admin.products.edit', compact('product','brands'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductUpdateRequest $request, Product $product)
    {
        $data = $request->only('nameProduct', 'brandProduct', 'idProduct', 'sizeProduct', 'descriptionProduct', 'priceProduct', 'quantityProduct');
        $data['slug'] = Str::slug($data['nameProduct']);
        $data['updated_at'] = now();

        if($request->imgProduct){
            //xóa file img nếu sửa
            Storage::delete(Str::replace('storage', 'public', $product['imgProduct']));

            //tạo tên file
            $fileName = $request->idProduct . '.' . rand(1,1000) . time() . '.' . $request->file('imgProduct')->extension();
            //lưu trữ vào storage
            $request->file('imgProduct')->storeAs('public/product', $fileName);
            //tạo đường dẫn lưu vào db
            $imgPath = 'storage/product/' . $fileName;
            $data['imgProduct']=$imgPath;
        }

        if($product->update($data)){
            return redirect()->route('admin.product.index')->with('success','Sửa thành công');
        }
        return redirect()->back()->with('error','Sửa thất bại');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        if ($product->delete()) {
            Storage::delete(Str::replace('storage', 'public', $product['imgProduct']));
            return redirect()->back()->with('success','Xóa thành công');
        }
        return redirect()->back()->with('error','Xóa thất bại');
    }
}
