<?php

namespace App\Services;

use App\Models\Category;
use Illuminate\Support\Facades\Auth;
class CategoryService
{
    public function __construct()
    {
    }

    public function getAll()
    {
        return Category::select(['name', 'user_id', 'type'])->where('user_id', auth()->user()->id)->get();
    }
}