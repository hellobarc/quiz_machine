<?php

namespace App\Repositories;

use App\Interfaces\MockRepositoryInterface;
use App\Models\Mock;

class MockRepository implements MockRepositoryInterface 
{
    
    public function getAll() 
    {
        return Mock::all();
    }

    public function getById($Id) 
    {
        return Mock::findOrFail($Id);
    }

    public function delete($Id) 
    {
        Mock::destroy($Id);
    }

    public function create(array $Details) 
    {
        return Mock::create($Details);
    }

    public function update($Id, array $newDetails) 
    {
        return Mock::whereId($Id)->update($newDetails);
    }

    // public function getFulfilledOrders() 
    // {
    //     return Order::where('is_fulfilled', true);
    // }
}
