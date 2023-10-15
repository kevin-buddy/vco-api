<?php

namespace App\Http\Controllers;

use App\Models\Ingredients;
use App\Http\Resources\IngredientCollection;
use Illuminate\Http\Request;

class IngredientController extends Controller
{
    public function ingredients() : IngredientCollection {
        return new IngredientCollection(Ingredients::all());
    }
}
