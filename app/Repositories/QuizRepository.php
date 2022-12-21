<?php

namespace App\Repositories;

use App\Interfaces\QuizRepositoryInterface;
use App\Models\Quiz;

class QuizRepository implements QuizRepositoryInterface 
{
    
    public function getAll() 
    {
        return Quiz::with('exam')->paginate(10);
    }

    public function getById($Id) 
    {
        return Quiz::findOrFail($Id);
    }

    public function delete($Id) 
    {
        Quiz::destroy($Id);
    }

    public function create(array $Details) 
    {
        return Quiz::create($Details);
    }

    public function update($Id, array $newDetails) 
    {
        return Quiz::whereId($Id)->update($newDetails);
    }

    // public function getFulfilledOrders() 
    // {
    //     return Order::where('is_fulfilled', true);
    // }
}
