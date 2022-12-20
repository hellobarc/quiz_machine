<?php

namespace App\Repositories;

use App\Interfaces\LevelRepositoryInterface;
use App\Models\Level;

class LevelRepository implements LevelRepositoryInterface 
{
    
    public function getAll() 
    {
        return Level::all();
    }

    public function getById($Id) 
    {
        return Level::findOrFail($Id);
    }

    public function delete($Id) 
    {
        Level::destroy($Id);
    }

    public function create(array $Details) 
    {
        return Level::create($Details);
    }

    public function update($Id, array $newDetails) 
    {
        return Level::whereId($Id)->update($newDetails);
    }

    // public function getFulfilledOrders() 
    // {
    //     return Order::where('is_fulfilled', true);
    // }
}
