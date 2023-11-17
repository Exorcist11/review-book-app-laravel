<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\CategoryServices;

use function Laravel\Prompts\error;

class CategoryController extends Controller
{
    protected $categoryService;

    public function __construct(CategoryServices $categoryService)
    {
        $this->categoryService = $categoryService;
    }
    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        $result = $this->categoryService->create($request);

        return redirect()->back();
    }

    public function index()
    {
        $categories = $this->categoryService->getAll();
        return view('admin.category', compact('categories'));
    }

    public function detail($id)
    {
        $category = $this->categoryService->getCategoryByID($id);
        return view('admin.category.detail', compact('category'));
    }

    public function edit(string $id)
    {
        $category = $this->categoryService->getCategoryByID($id);
        return view('admin.category.edit', compact('category'));
    }

    public function update(string $id, Request $request)
    {
        $category = $this->categoryService->getCategoryByID($id);

        $success = $this->categoryService->updateCategory($id, $request);

        return redirect('admin/category');
    }

    public function destroy($id)
    {
        $success = $this->categoryService->deleteCategory($id);
        return redirect('admin/category');
    }
}
