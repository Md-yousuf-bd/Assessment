<?php

namespace App\Http\Controllers\Api;

use App\Models\Catergory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class ApiCategoryController extends Controller
{
    public function index()
    {
        $categories = Catergory::orderBy('id', 'DESC')->paginate(5);

        return response()->json([
            'message' => 'Found Category',
            'data' => $categories,
        ], 200);
    }

    public function store(StoreCategoryRequest $request)
    {
        $validatedData = $request->validated();
        $category = new  Catergory();
        $category->name = $validatedData['name'];
        $category->description = $validatedData['description'];
        $category->status = $request->status == true ? '1' : '0';
        $category->save();
        return response()->json([
            'message' => 'Successfully Store',
            'data' => $category,
        ], 200);
    }


    public function edit($id)
    {
        $record = Catergory::findOrFail($id);
        return response()->json([
            'message' => 'Found',
            'data' => $record,
        ], 200);
    }

    public function update(UpdateCategoryRequest $request ,$id)
    {
        $validatedData = $request->validated();
        $category = Catergory::findOrFail($id);
        $category->name = $validatedData['name'];
        $category->description = $validatedData['description'];
        $category->status = $request->status == true ? '1' : '0';
        $category->update();
        return response()->json([
            'message' => 'Successfully update',
            'data' => $category,
        ], 200);
    }

    public function destroy($id){
        $category = Catergory::findOrFail($id);
        $category->delete();
        return response()->json([
            'message' => 'Successfully delete',
            'data' => $category,
        ], 200);
    }

}
