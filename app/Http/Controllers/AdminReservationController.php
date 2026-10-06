<?php

namespace App\Http\Controllers;

use App\Models\Reservation;

class AdminReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::with(['user', 'equipment'])
            ->latest()
            ->get();

        return view('admin.reservations.index', compact('reservations'));
    }

    public function approve($id)
    {
        $reservation = Reservation::findOrFail($id);

        $reservation->update([
            'status' => 'approved',
        ]);

        return redirect()->route('admin.reservations.index')
            ->with('success', 'Reservasi berhasil disetujui.');
    }

    public function reject($id)
    {
        $reservation = Reservation::findOrFail($id);

        $reservation->update([
            'status' => 'rejected',
        ]);

        return redirect()->route('admin.reservations.index')
            ->with('success', 'Reservasi berhasil ditolak.');
    }
}