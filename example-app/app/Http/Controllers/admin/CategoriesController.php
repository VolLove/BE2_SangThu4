<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

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
            'name' => 'required|string||max:255',
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
            $path = "images/" . $cate->image;
            if (File::exists($path)) {
                File::delete($path);
            }
            $cate->delete();
            //Quay lại trang trước đó
            return redirect('admin/categories/table')->with('success', 'Xóa danh mục thành công!');
        } else {
            return redirect()->back()->with('errors', 'Không thể xóa danh mục vì vẫn còn sản phẩm!');
        }
    }
    public function edit($id)
    {
        $category = Categories::find($id);
        $page = 'Manufacter edit';
        return view('Admin.edit', compact('category', 'page'));
    }
    public function edit_handler($id, Request $request)
    {
        $cate = Categories::find($id);
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $cate->name = $request->input('name');
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $cate->image = $imageName;
            $image->move(public_path('images'), $imageName);
        }
        if ($cate->save()) {

            return redirect('admin/categories/table')->with('success', 'Cập nhật thành công');
        }
        return back();
    }
}
