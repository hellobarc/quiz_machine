<?php

namespace App\Repositories;

use App\Interfaces\CategoryRepositoryInterface;
use App\Models\Category;

class CategoryRepository implements CategoryRepositoryInterface 
{
    
    public function getAll() 
    {
        return Category::all();
    }

    public function getById($Id) 
    {
        return Category::findOrFail($Id);
    }

    public function delete($Id) 
    {
        Category::destroy($Id);
    }

    public function create(array $Details) 
    {
        return Category::create($Details);
    }

    public function update($Id, array $newDetails) 
    {
        return Category::whereId($Id)->update($newDetails);
    }

    // public function getFulfilledOrders() 
    // {
    //     return Order::where('is_fulfilled', true);
    // }
}
