<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductCategoryResource;
use App\Models\Categories;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    //
    public function index(Request $request)
    {

        $categories = Categories::latest()->paginate(10);
        return new ProductCategoryResource(true, 'List Data Product Category', $categories);
    }
}
