<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Manufacturer;
use App\Models\Categories;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function table()
    {
        $page = "Product Table";
        $products = Products::with('category', 'manufacturer')->orderBy('created_at', 'desc')->paginate(10);
        return view('Admin.table', compact('products', 'page'));
    }
    public function add()
    {
        $manus = Manufacturer::all();
        $cates = Categories::all();
        $page = "Product Add";
        $product = 1;
        return view('Admin.add', compact('page', 'product', 'manus', 'cates'));
    }
    public function add_handler(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'image' =>  'nullable|image|mimes:png,jpg,jpeg|max:2048',
            'intro' => 'required',
            'description' => 'required',
            'price' => 'required|numeric|gt:0',
        ]);
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();

        $product = new Products([
            'name' => $request['name'],
            'image' => $imageName,
            'categories_id' => $request['cate'],
            'manufacturer_id' => $request['manu'],
            'intro' => $request['intro'],
            'description' => $request['description'],
            'price' => $request['price'],
        ]);
        if ($product->save()) {
            $image->move(public_path('images'), $imageName);
            return redirect()->route('product.table')->with('success', 'Thêm sản phẩm thành công');
        }
        return back();
    }
    //xóa  sản phẩm:
    function deleteproduct($id)
    {
        Products::find($id)->delete();
        return redirect()->back()->with('success', 'Xóa sản phẩm thành công'); //Quay lại trang trước đó
    }
    public function edit($id)
    {
        $product = Products::find($id);
        $manus = Manufacturer::all();
        $cates = Categories::all();
        $page = 'Product edit';
        return view('Admin.edit', compact('product', 'page', 'cates', 'manus'));
    }
    public function edit_handler($id, Request $request)
    {
        $product = Products::find($id);
        $request->validate([
            'name' => 'required|string',
            'image' =>  'nullable|image|mimes:png,jpg,jpeg|max:2048',
            'intro' => 'required',
            'description' => 'required',
            'price' => 'required|numeric|gt:0',
        ]);
        $product->name = $request->input('name');
        $product->category_id = $request->input('cate');
        $product->manufacturer_id = $request->input('manu');
        $product->intro = $request->input('intro');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $product->image = $imageName;
            $image->move(public_path('images'), $imageName);
        }

        if ($product->save()) {

            return redirect('admin/product/table')->with('success', 'Cập nhật thành công');
        }
        return back()->withErrors('Thay đổi không công');
    }
}
