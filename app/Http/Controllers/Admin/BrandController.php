<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Http\Requests\BrandStoreRequest;
use App\Http\Requests\BrandUpdateRequest;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brand::OrderBy('brand')->get();
        return view('Admin.brands.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.brands.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BrandStoreRequest $request)
    {
        $brand = $request->only('brand');
        $brand['created_at'] = now();
        $brand['updated_at'] = now();

        Brand::create($brand);
        return redirect()->route('admin.brand.index');
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
    public function edit(Brand $brand)
    {
        return view('Admin.brands.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BrandUpdateRequest $request, Brand $brand)
    {
        $data = $request->only('brand');
        $data['updated_at'] = now();

        if($brand->update($data)){
            return redirect()->route('admin.brand.index')->with('success','Sửa thành công');
        }
        return redirect()->back()->with('error','Sửa thất bại');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        if ($brand->delete()) {
            return redirect()->back()->with('success','Xóa thành công');
        }
        return redirect()->back()->with('error','Xóa thất bại');
    }
}
