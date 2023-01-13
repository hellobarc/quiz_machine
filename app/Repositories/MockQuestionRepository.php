<?php

namespace App\Repositories;

use App\Interfaces\MockQuestionRepositoryInterface;
use App\Models\MockQuestion;

class MockQuestionRepository implements MockQuestionRepositoryInterface 
{
    
    public function getAll() 
    {
        return MockQuestion::with('mock')->paginate(10);
    }

    public function getById($Id) 
    {
        return MockQuestion::findOrFail($Id);
    }

    public function delete($Id) 
    {
        MockQuestion::destroy($Id);
    }

    public function create(array $Details) 
    {
        return MockQuestion::create($Details);
    }

    public function update($Id, array $newDetails) 
    {
        return MockQuestion::whereId($Id)->update($newDetails);
    }

    // public function getFulfilledOrders() 
    // {
    //     return Order::where('is_fulfilled', true);
    // }
}
