<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\PropertyFeature;
use Illuminate\Http\Request;

class PropertyFeaturesController extends Controller
{
    public function index()
    {
        $propertyfeatures = PropertyFeature::orderBy('created_at', 'desc')->get();
        return view('dashboard.propertyfeatures.index', compact('propertyfeatures'));
    }

    public function create()
    {
        return view('dashboard.propertyfeatures.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name.ar' => 'required|string|max:191|unique:primary_amenities,name->ar',
            'name.en' => 'required|string|max:191|unique:primary_amenities,name->en',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);


        PropertyFeature::create($data);
        return response()->json();
    }

    public function edit($id)
    {
        $row = PropertyFeature::findOrFail($id);
        return view('dashboard.propertyfeatures.create', compact('row'));
    }

    public function show($id)
    {
        $PropertyFeature = PropertyFeature::with(['subAmenities.options'])->findOrFail($id);
        return view('dashboard.primary_amenities.show', compact('PropertyFeature'));
    }

    public function update(Request $request, $id)
    {
        $attachment = PropertyFeature::findOrFail($id);
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
        $attachment = PropertyFeature::findOrFail($id);
        $attachment->delete();
        return response()->json();
    }

    public function deleteAll(Request $request)
    {
        $requestIds = json_decode($request->data);
        foreach ($requestIds as $id) {
            $ids[] = $id->id;
        }
        if (PropertyFeature::whereIn('id', $ids)->delete()) {
            return response()->json('success');
        } else {
            return response()->json('failed');
        }
    }
}
