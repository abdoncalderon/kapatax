<?php

namespace App\Http\Controllers\Materials;

use App\Http\Controllers\Controller;
use App\Models\Material;
use Illuminate\Http\Request;

class StockMovementController extends Controller
{
    public function index(Material $material)
    {
        return view('materials.stockMovements.index', compact('material'));
    }
}
