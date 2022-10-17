<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function view()
    {
        return "product view page";
    }

    public function create()
    {
        return "product create form";
    }
}
