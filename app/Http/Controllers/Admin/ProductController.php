<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Catergory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\SubCategory;
use App\Models\SubSubCategory;

class ProductController extends Controller
{
    public function index()
    {
        $product = Product::orderBy('id', 'DESC')->paginate(5);
        return view('admin.products.index', compact('product'));
    }



    public function create()
    {
        $categories = Catergory::get();
        return view('admin.products.create', compact('categories'));
    }

    public function store(StoreProductRequest $request)
    {
        $validatedData = $request->validated();
        $product = new  Product();
        $product->name = $validatedData['name'];
        $product->price = $validatedData['price'];
        $product->category_id = $validatedData['category_id'];
        $product->sub_category_id = $validatedData['sub_category_id'];
        $product->sub_sub_category_id = $validatedData['sub_sub_category_id'];
        if ($request->hasFile('Image')) {
            $file = $request->file('Image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('uploads/Product', $filename);
            $validateData['Image'] = "uploads/Product/$filename";
        }
        if ($filename) {
            $product->Image = "uploads/Product/$filename";
        }
        $product->description = $validatedData['description'];
        $product->status = $request->status == true ? '1' : '0';
        // dd($product);
        $product->save();
        return redirect()->route('product.index')->with('massage', 'Product added success');
    }


    public function edit($id)
    {
        $categories = Catergory::get();
        $products = Product::findOrFail($id);
        $subCategories = SubCategory::all();
        $subSubCategories = SubSubCategory::all();
        return view('admin.products.edit', compact('products', 'subCategories', 'categories', 'subSubCategories'));
    }

    public function update(UpdateProductRequest $request, $id)
    {
        $validatedData = $request->validated();
        $product = Product::findOrFail($id);
        $product->name = $validatedData['name'];
        $product->price = $validatedData['price'];
        $product->category_id = $validatedData['category_id'];
        $product->sub_category_id = $validatedData['sub_category_id'];
        $product->sub_sub_category_id = $validatedData['sub_sub_category_id'];
        $product->description = $validatedData['description'];
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('uploads/Product', $filename);
        }
        if ($filename) {
            $product->Image = "uploads/Product/$filename";
        }
        $product->status = $request->status == true ? '1' : '0';
        $product->update();
        return redirect()->route('product.index')->with('massage', 'product Update success');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('product.index')->with('massage', 'product  delete');
    }


    public function getSubcategories(Request $request)
    {
        $category_id = $request->category_id;
        $subcategories = SubCategory::where('category_id', $category_id)->pluck('name', 'id');
        return response()->json($subcategories);
    }
    public function getSubSubcategories(Request $request)
    {
        $sub_category_id = $request->sub_category_id;
        $subSubCategories = SubSubCategory::where('sub_category_id', $sub_category_id)->pluck('name', 'id');
        return response()->json($subSubCategories);
    }
}
