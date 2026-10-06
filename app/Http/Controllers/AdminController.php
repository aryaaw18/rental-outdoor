<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Category;
use App\Models\Equipment;
use App\Models\Reservation;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalUsers = User::count();
        $totalCategories = Category::count();
        $totalEquipment = Equipment::count();
        $totalReservations = Reservation::count();

        return view('admin.dashboard', compact(
            'totalUsers',
            'totalCategories',
            'totalEquipment',
            'totalReservations'
        ));
    }
}