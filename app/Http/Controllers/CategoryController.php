<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Http\Resources\CategoryCollection;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function categories() : CategoryCollection {
        return new CategoryCollection(Categories::all());
    }
}
