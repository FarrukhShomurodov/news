<?php

namespace App\Service;

use App\Models\Category;


class CategoryService{
    public function store($validated)
    {
        $category = new Category;
        $category->category_name = $validated["category_name"];
        $category->save();
    }
    public function update($validated, $category)
    {
        $category->category_name = $validated["category_name"];
        $category->update();
    }
    public function destroy($category)
    {
        $category->delete();
    }
}
?>
