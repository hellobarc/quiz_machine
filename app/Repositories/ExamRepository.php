<?php

namespace App\Repositories;

use App\Interfaces\ExamRepositoryInterface;
use App\Models\Exam;

class ExamRepository implements ExamRepositoryInterface 
{
    
    public function getAll() 
    {
        return Exam::with('category')->paginate(10);
    }

    public function getById($Id) 
    {
        return Exam::findOrFail($Id);
    }

    public function delete($Id) 
    {
        Exam::destroy($Id);
    }

    public function create(array $Details) 
    {
        return Exam::create($Details);
    }

    public function update($Id, array $newDetails) 
    {
        return Exam::whereId($Id)->update($newDetails);
    }

    // public function getFulfilledOrders() 
    // {
    //     return Order::where('is_fulfilled', true);
    // }
}
