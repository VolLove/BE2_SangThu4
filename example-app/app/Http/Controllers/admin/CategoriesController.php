<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoriesController extends Controller
{
    public function table()
    {
        $page = "Categories table";
        $categories = DB::table('categories')->orderBy('created_at', 'desc')->paginate(10);
        return view('Admin.table', compact('page', 'categories'));
    }
    public function add()
    {
        $page = "Categories add";
        $category = 1;
        return view('Admin.add', compact('page', 'category'));
    }
    public function add_handler(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'image' =>  'nullable|image|mimes:png,jpg,jpeg|max:2048',
        ]);
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $imageName);

        $cate = new Categories([
            'name' => $request['name'],
            'image' => $imageName,
        ]);
        if ($cate->save()) {
            return redirect()->route('categories.table')->with('success', 'Thêm hãng thành công');
        }
        return back();
    }
    public function remove($id)
    {
        $product = Products::where('categories_id', $id)->get();
        if ($product->count() == 0) {
            $cate = Categories::find($id);
            $cate->delete();
            //Quay lại trang trước đó
            return redirect()->back()->with('success', 'Xóa danh mục thành công');
        } else {
            return redirect()->back()->with('error', 'Không thể xóa danh mục vì vẫn còn sản phẩm');
        }
    }
}
