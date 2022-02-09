<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Exception;
use Illuminate\Http\Request;
use Ramsey\Uuid\Type\Integer;
use function PHPUnit\Framework\isEmpty;
use function PHPUnit\Framework\isNull;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        //todo separate functionality. return only categories
        $query = Category::query();
        if( isset($request->products) ) {
            $query->with('products.options');
        }
        if ( isset($request->sort) && isset($request->order) ) {
            $query->orderBy($request->sort, $request->order);
        }
        return $query->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Category
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => ['required', 'unique:categories']
        ]);

        $new_category = new Category();
        $new_category->name = $request->name;
        $new_category->save();
        $new_category->refresh();


        return $new_category;
    }

    /**
     * Display the specified resource.
     * @param Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, int $id)
    {
        if ( isset($request->products) ) {
            return Category::with('products.options')->findOrFail($id);
        }

        return Category::findOrFail($id);
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
        $request->validate([
            'name' => ['required', 'unique:categories']
        ]);

        $category = Category::findOrFail($id);
        $category->name = $request->name;

        $category->save();

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
        $category = Category::with('products')->find($id);
        $arr = $category->products->toArray();
        if ( count($arr) < 1 ) {
            Category::find($id)->delete();
            return response('', 204);
        } else {
            throw new Exception('This category has products');
        }
    }
}
