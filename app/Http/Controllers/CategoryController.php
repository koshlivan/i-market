<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Ramsey\Uuid\Type\Integer;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return array
     */
    public function index()
    {
        //todo separate functionality. return only categories
        return Category::with('products')->get()->toArray();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Category
     */
    public function store(Request $request)
    {
        //todo validate request before saving
        //todo show errors
        $new_category = Category::create($request->all());

        return $new_category;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        //todo add native laravel validation
        $category = Category::findOrFail($id);
        if($request->name!='') {
            $category->name = $request->name;
        }

        $category->update();

        return Category::find($id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        //show errors
        Category::find($id)->delete();

        return response(null, '204');
    }
}
