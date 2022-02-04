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
     * @return array
     */
    public function index(Request $request)
    {
        //todo separate functionality. return only categories
        $query = Category::query();
        if( isset($request->products) ) {
            //return Category::with('products')->get()->toArray();
            $query->with('products');
        }
        if ( isset($request->sort) && isset($request->order) ) {
            $query->orderBy($request->sort, $request->order);
        }
        //return $query->paginate($request->per_page, ['*'], 'page', $request->page);
        //return Category::all()->toArray();
        return $query->get()->toArray();
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

        $request->validate([
            'name' => ['required', 'unique:categories']
        ]);

        $new_category = new Category();
        $new_category->name = $request->name;
        $new_category->save();

        return Category::find($new_category->id);
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
        $request->validate([
            'name' => ['required', 'unique:categories']
        ]);
        //todo add native laravel validation

        $category = Category::findOrFail($id);
        $category->name = $request->name;

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
        $category = Category::with('products')->find($id);
        $arr = $category->products->toArray();
        if ( count($arr) < 1 ) {
            Category::find($id)->delete();
            return response('', 204);
        } else {
            throw new Exception('Category has products');
        }
    }
}
