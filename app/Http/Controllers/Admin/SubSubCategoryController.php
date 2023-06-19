<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSubCategoryRequest;
use App\Http\Requests\StoreSubSubCategoryRequest;
use App\Http\Requests\UpdateSubCategoryRequest;
use App\Http\Requests\UpdateSubSubCategroryRequest;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use Illuminate\Http\Request;

class SubSubCategoryController extends Controller
{
    public function index()
    {
        $subSubCategory = SubSubCategory::orderBy('id', 'DESC')->paginate(5);
        return view('admin.subSubCategories.index',compact('subSubCategory'));
    }

    public function create()
    {
        $subCategories = SubCategory::get();
        return view('admin.subSubCategories.create',compact('subCategories'));
    }

    public function store(StoreSubSubCategoryRequest $request)
    {
        $validatedData = $request->validated();
        $subSubCategory = new  SubSubCategory();
        $subSubCategory->name = $validatedData['name'];
        $subSubCategory->description = $validatedData['description'];
        $subSubCategory->sub_category_id = $validatedData['sub_category_id'];
        $subSubCategory->status = $request->status == true ? '1' : '0';
        $subSubCategory->save();
        return redirect()->route('subsub.index')->with('massage', 'Sub Sub Category added success');
    }


    public function edit($id)
    {
        $record = SubSubCategory::findOrFail($id);
        $subCategories = SubCategory::all();
        return view('admin.subSubCategories.edit', compact('record', 'subCategories'));
    }

    public function update(UpdateSubSubCategroryRequest $request ,$id)
    {
        $validatedData = $request->validated();
        $subSubCategory = SubSubCategory::findOrFail($id);
        $subSubCategory->name = $validatedData['name'];
        $subSubCategory->sub_category_id = $validatedData['sub_category_id'];
        $subSubCategory->description = $validatedData['description'];
        $subSubCategory->status = $request->status == true ? '1' : '0';
        $subSubCategory->update();
        return redirect()->route('subsub.index')->with('massage', 'Sub Sub Category Update success');
    }

    public function destroy($id){
        $subSubCategory = SubSubCategory::findOrFail($id);
        $subSubCategory->delete();
        return redirect()->route('subsub.index')->with('massage', 'Sub Sub Category delete');
    }
}
