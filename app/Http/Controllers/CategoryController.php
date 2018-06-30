<?php

namespace Furbook\Http\Controllers;

use Furbook\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response = array(
            'categories' => array()
        );
        $categories = Category::all();
        foreach ($categories as $category){
            array_push(
                $response['categories'], 
                array(
                    'id' => (int) $category->id,
                    'name' => $category->name
                )
            );
        }
        return response($response, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'name' =>' required|string|max:255'
            ],
            [
                'required' => 'Cột :attribute là bắt buộc',
                'string' => 'Cột :attribute phải là kí tự',
                'max' => 'Cột :attribute vui lòng không nhập quá :max kí tự',
            ]);
        if($validator->fails()){
            return response([
                'error' => $validator->errors()
            ], 400);
        }
        $category = Category::create($request->all());

        $response = array(
            'category' => array(
                'id' => (int) $category->id,
                'name' => $category->name,
            )
        );
        return response($response, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::findOrFail($id);
        $response = array(
            'category' => array(
                'id' => (int) $category->id,
                'name' => $category->name
            )
        );
        return response($response, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
