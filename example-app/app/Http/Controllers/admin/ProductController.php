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
        return view('Admin.add', compact('page', 'product','manus', 'cates'));
    }
    public function add_handler(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'image' =>  'nullable|image|mimes:png,jpg,jpeg|max:2048',
            'intro' => 'required',
            'description' => 'required',
            'price' => 'required|numeric|min:0|not_in:0',
        ]);
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();

        $product = new Products([
            'name' => $request['name'],
            'image' => $imageName,
            'category_id'=>$request['cate'],
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
}
