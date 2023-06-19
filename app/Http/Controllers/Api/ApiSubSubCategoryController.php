<?php

namespace App\Http\Controllers\Api;

use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Models\SubSubCategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateSubCategoryRequest;
use App\Http\Requests\StoreSubSubCategoryRequest;
use App\Http\Requests\UpdateSubSubCategroryRequest;

class ApiSubSubCategoryController extends Controller
{
    public function index()
    {
        $subSubCategory = SubSubCategory::orderBy('id', 'DESC')->paginate(5);
        return response()->json([
            'message' => 'Found',
            'data' => $subSubCategory,
        ], 200);
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

        return response()->json([
            'message' => 'Successfully Store',
            'data' => $subSubCategory,
        ], 200);
    }


    public function edit($id)
    {
        $record = SubSubCategory::findOrFail($id);
        $subCategories = SubCategory::all();
        return response()->json([
            'message' => 'Found',
            'data' => $record,
            'subCategories' => $subCategories,
        ], 200);
    }

    public function update(UpdateSubSubCategroryRequest $request, $id)
    {
        $validatedData = $request->validated();
        $subSubCategory = SubSubCategory::findOrFail($id);
        $subSubCategory->name = $validatedData['name'];
        $subSubCategory->sub_category_id = $validatedData['sub_category_id'];
        $subSubCategory->description = $validatedData['description'];
        $subSubCategory->status = $request->status == true ? '1' : '0';
        $subSubCategory->update();

        return response()->json([
            'message' => 'Successfully update',
            'data' => $subSubCategory,
        ], 200);
    }

    public function destroy($id)
    {
        $subSubCategory = SubSubCategory::findOrFail($id);
        $subSubCategory->delete();
        return response()->json([
            'message' => 'Successfully delete',
            'data' => $subSubCategory,
        ], 200);
    }
}
