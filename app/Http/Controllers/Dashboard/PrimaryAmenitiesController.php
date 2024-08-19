<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\PrimaryAmenity;
use Illuminate\Http\Request;

class PrimaryAmenitiesController extends Controller
{
    public function index()
    {
        $rows = PrimaryAmenity::orderBy('created_at', 'desc')->get();
        return view('dashboard.primary_amenities.index', compact('rows'));
    }

    public function create()
    {
        return view('dashboard.primary_amenities.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name.ar' => 'required|string|max:191|unique:primary_amenities,name->ar',
            'name.en' => 'required|string|max:191|unique:primary_amenities,name->en',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);


        PrimaryAmenity::create($data);
        return response()->json();
    }

    public function edit($id)
    {
        $row = PrimaryAmenity::findOrFail($id);
        return view('dashboard.primary_amenities.create', compact('row'));
    }

    public function show($id)
    {
        $primaryAmenity = PrimaryAmenity::with(['subAmenities.options'])->findOrFail($id);
        return view('dashboard.primary_amenities.show', compact('primaryAmenity'));
    }

    public function update(Request $request, $id)
    {
        $attachment = PrimaryAmenity::findOrFail($id);
        $data = $request->validate([
            'name.ar' => 'unique:primary_amenities,name->ar,' . $id . ',id',
            'name.en' => 'unique:primary_amenities,name->en,' . $id . ',id',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);

        $attachment->update($data);
        return response()->json();
    }

    public function destroy($id)
    {
        $attachment = PrimaryAmenity::findOrFail($id);
        $attachment->delete();
        return response()->json();
    }

    public function deleteAll(Request $request)
    {
        $requestIds = json_decode($request->data);
        foreach ($requestIds as $id) {
            $ids[] = $id->id;
        }
        if (PrimaryAmenity::whereIn('id', $ids)->delete()) {
            return response()->json('success');
        } else {
            return response()->json('failed');
        }
    }
}
