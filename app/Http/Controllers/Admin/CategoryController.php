<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Catergory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Catergory::orderBy('id', 'DESC')->paginate(5);
        return view('admin.categories.index',compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(StoreCategoryRequest $request)
    {
        $validatedData = $request->validated();
        $category = new  Catergory();
        $category->name = $validatedData['name'];
        $category->description = $validatedData['description'];
        $category->status = $request->status == true ? '1' : '0';
        $category->save();
        return redirect()->route('category.index')->with('massage', 'Category added success');

        // return redirect('other/category')->with('massage', 'Category added success');
    }


    public function edit($id)
    {
        $record = Catergory::findOrFail($id);
        return view('admin.categories.edit', compact('record'));
    }

    public function update(UpdateCategoryRequest $request ,$id)
    {
        $validatedData = $request->validated();
        $category = Catergory::findOrFail($id);
        $category->name = $validatedData['name'];
        $category->description = $validatedData['description'];
        $category->status = $request->status == true ? '1' : '0';
        $category->update();
        return redirect()->route('category.index')->with('massage', 'Category Update success');
    }

    public function destroy($id){
        $category = Catergory::findOrFail($id);
        $category->delete();
        return redirect()->route('category.index')->with('massage', 'Category delete');
    }


}
