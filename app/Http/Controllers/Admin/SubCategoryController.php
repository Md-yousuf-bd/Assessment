<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSubCategoryRequest;
use App\Http\Requests\UpdateSubCategoryRequest;
use App\Models\Catergory;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function index()
    {
        $subCategory = SubCategory::orderBy('id', 'DESC')->paginate(5);
        return view('admin.subCategories.index',compact('subCategory'));
    }

    public function create()
    {
        $categories = Catergory::get();
        return view('admin.subCategories.create',compact('categories'));
    }

    public function store(StoreSubCategoryRequest $request)
    {
        $validatedData = $request->validated();
        $subCategory = new  SubCategory();
        $subCategory->name = $validatedData['name'];
        $subCategory->description = $validatedData['description'];
        $subCategory->category_id = $validatedData['category_id'];
        $subCategory->status = $request->status == true ? '1' : '0';
        $subCategory->save();
        return redirect()->route('sub.index')->with('massage', 'Sub Category added success');
    }


    public function edit($id)
    {
        $record = SubCategory::findOrFail($id);
        $categories = Catergory::all();
        return view('admin.subCategories.edit', compact('record', 'categories'));
    }

    public function update(UpdateSubCategoryRequest $request ,$id)
    {
        $validatedData = $request->validated();
        $subCategory = SubCategory::findOrFail($id);
        $subCategory->name = $validatedData['name'];
        $subCategory->category_id = $validatedData['category_id'];
        $subCategory->description = $validatedData['description'];
        $subCategory->status = $request->status == true ? '1' : '0';
        $subCategory->update();
        return redirect()->route('sub.index')->with('massage', 'Sub Category Update success');
    }

    public function destroy($id){
        $subCategory = SubCategory::findOrFail($id);
        $subCategory->delete();
        return redirect()->route('sub.index')->with('massage', 'Sub Category delete');
    }
}
