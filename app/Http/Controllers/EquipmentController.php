<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use App\Models\Category;
use Illuminate\Http\Request;

class EquipmentController extends Controller
{
    public function index()
    {
        $equipments = Equipment::with('category')->get();

        return view('admin.equipments.index', compact('equipments'));
    }

    public function create()
    {
        $categories = Category::all();

        return view('admin.equipments.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'rental_price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'description' => 'nullable|string',
        ]);

        Equipment::create([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'rental_price' => $request->rental_price,
            'stock' => $request->stock,
            'description' => $request->description,
        ]);

        return redirect()
            ->route('admin.equipments.index')
            ->with('success', 'Peralatan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $equipment = Equipment::findOrFail($id);
        $categories = Category::all();

        return view(
            'admin.equipments.edit',
            compact('equipment', 'categories')
        );
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'rental_price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'description' => 'nullable|string',
        ]);

        $equipment = Equipment::findOrFail($id);

        $equipment->update([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'rental_price' => $request->rental_price,
            'stock' => $request->stock,
            'description' => $request->description,
        ]);

        return redirect()
            ->route('admin.equipments.index')
            ->with('success', 'Peralatan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $equipment = Equipment::findOrFail($id);

        $equipment->delete();

        return redirect()
            ->route('admin.equipments.index')
            ->with('success', 'Peralatan berhasil dihapus.');
    }
}