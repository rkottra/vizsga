<?php

namespace App\Http\Controllers;

use App\Models\recipe;
use App\Http\Requests\StorerecipeRequest;
use App\Http\Requests\UpdaterecipeRequest;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return recipe::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorerecipeRequest $request)
    {
        if ($request->easyOfPrep <1 || $request->easyOfPrep > 5) {
            return response()->json("Nem megfelelő értéke", 400);
        }

        if (empty($request->imageURL)) {
            return response()->json("imageUrl mező megadása kötelező", 400);
        }

        if (empty($request->recipeName)) {
            return response()->json("Név megadása kötelező", 400);
        }
        
        $recipe = new recipe();
        $recipe->recipeName = $request->recipeName;
        $recipe->imageURL = $request->imageURL;
        $recipe->description = $request->description;
        $recipe->dateAdded = new \DateTime($request->dateAdded);
        $recipe->isGlutenFree = $request->isGlutenFree;
        $recipe->prepTime = $request->prepTime;
        $recipe->easyOfPrep = $request->easyOfPrep;
        $recipe->save();

        return response()->json("id:".$recipe->id, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(recipe $recipe)
    {
        return $recipe;
    }

    public function search(string $keyword, string $orderby, string $direction)
    {
        return recipe::where("recipeName", "LIKE", "%".$keyword."%")
                        ->orWhere('description',  "LIKE", "%".$keyword."%")
                        ->orderby($orderby, $direction=="asc"?"asc":"desc")->get();

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(recipe $recipe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdaterecipeRequest $request, recipe $recipe)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(recipe $recipe)
    {
        $recipe->delete();
        return response()->json("", 204);
    }
}
