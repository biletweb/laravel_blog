<?php

namespace App\Service\Admin\Category;

use App\Models\Category;

class CategoryService
{
    public function store($data)
    {
        Category::firstOrCreate($data);
    }

    public function update($data, $category)
    {
        $category->update($data);
        return $category;
    }

    public  function destroy($category)
    {
        $category->delete();
    }
}
