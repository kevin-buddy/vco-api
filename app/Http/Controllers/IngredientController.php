<?php

namespace App\Http\Controllers;

use App\Http\Resources\IngredientResource;
use App\Models\Ingredient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class IngredientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'limit' => 'required|numeric|min:0',
            'offset' => 'required|numeric|min:0'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }
        return IngredientResource::collection(
            Ingredient::offset($request->offset)
                ->limit($request->limit)
                ->get()
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|alpha|max:20',
            'description' => 'required|alpha_num|max:225',
            'image' => 'required|max:225',
            'ref_benefit' => 'required',
        ]);
        $new_ingredient = new Ingredient;
        $new_ingredient->name = $request->name;
        $new_ingredient->description = $request->description;
        $new_ingredient->image = $request->image;
        $new_ingredient->ref_benefit = $request->ref_benefit;
        $new_ingredient->save();
        return response("New Ingredient Created", 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return IngredientResource::make(Ingredient::findOrFail($id));
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
        $request->validate([
            'name' => 'required|alpha|max:20',
            'description' => 'required|alpha_num|max:225',
            'image' => 'required|max:225',
            'ref_benefit' => 'required',
        ]);
        $update_ingredient = Ingredient::findOrFail(1);
        $update_ingredient->name = $request->name;
        $update_ingredient->description = $request->description;
        $update_ingredient->image = $request->image;
        $update_ingredient->ref_benefit = $request->ref_benefit;
        $update_ingredient->save();
        return response("Ingredient Updated", 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Ingredient::where('id', '=', $id)->delete();
        return response("Ingredient Deleted", 200);
    }
}
