<?php

namespace App\Http\Services;

use App\Models\Category;
use Illuminate\Support\Facades\Session;

class CategoryServices
{
    public function create($request)
    {
        $validated = $request->validate([
            'categoryName' => 'required',
            'description' => 'required',
        ]);

        try {
            Category::create([
                'categoryName' => (string) $request->input('categoryName'),
                'description' => (string) $request->input('description')
            ]);

            Session::flash('success', 'Create category success');
        } catch (\Exception $err) {
            Session::flash('error', $err->getMessage());
            return false;
        }

        return true;
    }

    public function getAll()
    {
        try {
            return Category::all();
        } catch (\Exception $err) {
            Session::flash('error', $err->getMessage());
            return false;
        }
        return true;
    }

    public function getCategoryByID($id)
    {
        try {
            return Category::findOrFail($id);
        } catch (\Exception $err) {
            Session::flash('error', $err->getMessage());
            return false;
        }
        return true;
    }

    public function updateCategory($id, $request)
    {
        try {
            $category = $this->getCategoryByID($id);

            if (!$category) {
                throw new \Exception('Category not found');
            }

            $data = $request->only(['categoryName', 'description']);
            $category->update($data);

            return true;
        } catch (\Exception $err) {
            Session::flash('error', $err->getMessage());
            return false;
        }
    }

    public function deleteCategory($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return true;
    }
}
