<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rate;

class RateController extends Controller
{
    public function index()
    {
        $rates = Rate::all();
        return view('rates.index', compact('rates'));
    }

    public function create()
    {
        return view('rates.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'booking_id' => 'required|exists:bookings,id',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string',
        ]);

        Rate::create($request->all());

        return redirect()->route('rates.index')->with('success', 'Rate created successfully.');
    }

    public function show($id)
    {
        $rate = Rate::findOrFail($id);
        return view('rates.show', compact('rate'));
    }

    public function edit($id)
    {
        $rate = Rate::findOrFail($id);
        return view('rates.edit', compact('rate'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'booking_id' => 'required|exists:bookings,id',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string',
        ]);

        $rate = Rate::findOrFail($id);
        $rate->update($request->all());

        return redirect()->route('rates.index')->with('success', 'Rate updated successfully.');
    }

    public function destroy($id)
    {
        $rate = Rate::findOrFail($id);
        $rate->delete();

        return redirect()->route('rates.index')->with('success', 'Rate deleted successfully.');
    }
}
