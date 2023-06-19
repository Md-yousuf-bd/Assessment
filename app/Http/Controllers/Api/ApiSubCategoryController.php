<?php

namespace App\Http\Controllers\Api;

use App\Models\Catergory;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSubCategoryRequest;
use App\Http\Requests\UpdateSubCategoryRequest;

class ApiSubCategoryController extends Controller
{
    public function index()
    {
        $subCategory = SubCategory::orderBy('id', 'DESC')->paginate(5);
        return response()->json([
            'message' => 'Found Sub Category',
            'data' => $subCategory,
        ], 200);
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
        return response()->json([
            'message' => 'Successfully Store',
            'data' => $subCategory,
        ], 200);
    }


    public function edit($id)
    {
        $record = SubCategory::findOrFail($id);
        $categories = Catergory::all();
        return response()->json([
            'message' => 'Found',
            'data' => $record,
            'categories' => $categories,
        ], 200);
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
        return response()->json([
            'message' => 'Successfully update',
            'data' => $subCategory,
        ], 200);
    }

    public function destroy($id){
        $subCategory = SubCategory::findOrFail($id);
        $subCategory->delete();
        return response()->json([
            'message' => 'Successfully delete',
            'data' => $subCategory,
        ], 200);
    }
}
