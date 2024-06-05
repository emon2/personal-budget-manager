<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Services\CategoryService;

class CategoryController extends Controller
{
    private $categoryService;
    
    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }
    
    public function index()
    {         
        return Inertia::render('Category/Index', [
            'categories' => $this->categoryService->getAll(),            
        ]); 
        //return 'categories.index';      
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return 'categories.create';
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //return 'categories.store';
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string',
        ]);

        Category::create($validated);

        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //return 'categories.show';
        {
            $category = Category::findOrFail($id);
            return view('categories.show', compact('category'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // return 'categories.edit';
        {
            $category = Category::findOrFail($id);
            return view('categories.edit', compact('category'));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string',
        ]);

        Category::where('id', $id)->update($validated);

        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {        
        {
        Category::destroy($id);
        return redirect()->route('categories.index');
    }    
    }
}
