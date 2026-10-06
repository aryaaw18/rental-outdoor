<?php

namespace App\Http\Controllers;

use App\Models\Equipment;

class HomeController extends Controller
{
    public function index()
    {
        $equipments = Equipment::with('category')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('home', [
            'equipments' => $equipments
        ]);
    }

    public function detail($id)
    {
        $equipment = Equipment::with('category')
            ->findOrFail($id);

        return view('equipment.detail', [
            'equipment' => $equipment
        ]);
    }
}