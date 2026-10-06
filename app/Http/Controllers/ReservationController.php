<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ReservationController extends Controller
{
    public function create($equipment)
    {
        $equipment = Equipment::with('category')->findOrFail($equipment);

        return view('reservation.create', compact('equipment'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'equipment_id' => 'required|exists:equipment,id',
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after_or_equal:start_date',
            'quantity' => 'required|integer|min:1',
        ]);

        $equipment = Equipment::findOrFail($request->equipment_id);

        /*
        |--------------------------------------------------------------------------
        | Cek stok
        |--------------------------------------------------------------------------
        */

        if ($request->quantity > $equipment->stock) {
            return back()
                ->withErrors([
                    'quantity' => 'Jumlah yang disewa melebihi stok tersedia.'
                ])
                ->withInput();
        }

        /*
        |--------------------------------------------------------------------------
        | Cek bentrok tanggal reservasi
        |--------------------------------------------------------------------------
        */

        $overlappingReservations = Reservation::where('equipment_id', $equipment->id)
            ->whereIn('status', ['pending', 'approved'])
            ->where(function ($query) use ($request) {

                $query->whereBetween('start_date', [
                    $request->start_date,
                    $request->end_date
                ])

                ->orWhereBetween('end_date', [
                    $request->start_date,
                    $request->end_date
                ])

                ->orWhere(function ($query) use ($request) {
                    $query->where('start_date', '<=', $request->start_date)
                        ->where('end_date', '>=', $request->end_date);
                });

            })
            ->sum('quantity');

        /*
        |--------------------------------------------------------------------------
        | Cek apakah stok cukup pada tanggal tersebut
        |--------------------------------------------------------------------------
        */

        if (($overlappingReservations + $request->quantity) > $equipment->stock) {

            return back()
                ->withErrors([
                    'quantity' => 'Stok tidak mencukupi pada tanggal yang dipilih.'
                ])
                ->withInput();
        }

        /*
        |--------------------------------------------------------------------------
        | Hitung total harga
        |--------------------------------------------------------------------------
        */

        $days = Carbon::parse($request->start_date)
            ->diffInDays(Carbon::parse($request->end_date)) + 1;

        $totalPrice =
            $equipment->rental_price
            * $request->quantity
            * $days;

        /*
        |--------------------------------------------------------------------------
        | Simpan reservasi
        |--------------------------------------------------------------------------
        */

        Reservation::create([
            'user_id' => Auth::id(),
            'equipment_id' => $equipment->id,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'quantity' => $request->quantity,
            'total_price' => $totalPrice,
            'status' => 'pending',
        ]);

        return redirect()
            ->route('reservations.my')
            ->with('success', 'Reservasi berhasil dibuat dan menunggu persetujuan admin.');
    }

    public function myReservations()
    {
        $reservations = Reservation::with('equipment')
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('reservation.my', compact('reservations'));
    }
}