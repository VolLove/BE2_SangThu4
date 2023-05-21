<?php

namespace App\Http\Controllers\Admin;

use App\Models\Manufacturer;
use App\Models\Products;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ManufacterController extends Controller
{
    public function table()
    {
        $page = "Manufacturer Table";
        $manufacturer = Manufacturer::with('products')->orderBy('created_at', 'desc')->paginate(10);
        return view('Admin.table', compact('manufacturer'), compact('page'));
    }
    public function add()
    {
        $page = "Manufacter Add";
        return view('Admin.add', ['manufacturer' => 1], compact('page'));
    }
    public function add_handel(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'image' =>  'nullable|image|mimes:png,jpg,jpeg|max:2048',
        ]);
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();

        $manu = new Manufacturer([
            'name' => $request['name'],
            'image' => $imageName,
        ]);
        if ($manu->save()) {
            $image->move(public_path('images'), $imageName);
            return redirect()->route('manufacter.table')->with('success', 'Thêm hãng thành công');
        }
        return back();
    }
    //xóa loại sản phẩm:
    function deletemanu($id)
    {
        $product = Products::where('manufacturer_id', $id)->get();
        if ($product->count() == 0) {
            Manufacturer::find($id)->delete();
            //Quay lại trang trước đó
            return redirect()->back()->with('success', 'Xóa danh mục thành công');
        } else {
            return redirect()->back()->with('error', 'Không thể xóa danh mục vì vẫn còn sản phẩm');
        }
    }
    public function edit($id)
    {
        $manu_edit = Manufacturer::find($id);
        $page = 'Manufacter edit';
        return view('Admin.edit', compact('manu_edit', 'page'));
    }
    public function edit_handler($id, Request $request)
    {
        $manu = Manufacturer::find($id);
        $request->validate([
            'name' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $manu->name = $request->input('name');
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $manu->image = $imageName;
            $image->move(public_path('images'), $imageName);
        }
        if ($manu->save()) {

            return redirect('admin/manufacter/table')->with('success', 'Cập nhật thành công');
        }
        return back()->withErrors('Thay đổi không công');
    }
}
