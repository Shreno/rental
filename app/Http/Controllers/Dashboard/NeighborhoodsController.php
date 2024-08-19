<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Neighborhood;
use App\Models\City;
use Illuminate\Http\Request;

class NeighborhoodsController extends Controller
{
    public function index()
    {
        $neighborhoods = Neighborhood::with('city')->orderBy('created_at', 'desc')->paginate(100);
        return view('dashboard.neighborhoods.index', compact('neighborhoods'));
    }

    public function create()
    {
        $cities = City::all();
        return view('dashboard.neighborhoods.create', compact('cities'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name.ar' => 'unique:neighborhoods,name->ar,NULL,id,city_id,' . $request->city_id,
            'name.en' => 'unique:neighborhoods,name->en,NULL,id,city_id,' . $request->city_id,
            'city_id' => 'required|exists:cities,id',
            'image'   => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);

       

        Neighborhood::create($data);

        return response()->json(['message' => 'Neighborhood created successfully']);
    }

    public function edit($id)
    {
        $neighborhood = Neighborhood::findOrFail($id);
        $cities = City::all();
        return view('dashboard.neighborhoods.create', compact('neighborhood', 'cities'));
    }

    public function update(Request $request, $id)
    {
        $neighborhood = Neighborhood::findOrFail($id);
        $data = $request->validate([
            'name.ar' => 'unique:neighborhoods,name->ar,' . $id . ',id,city_id,' . $request->city_id,
            'name.en' => 'unique:neighborhoods,name->en,' . $id . ',id,city_id,' . $request->city_id,
            'city_id' => 'required|exists:cities,id',
            'image'   => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]); 



        $neighborhood->update($data);

        return response()->json(['message' => 'Neighborhood updated successfully']);
    }

    public function destroy($id)
    {
        $neighborhood = Neighborhood::findOrFail($id);
        $neighborhood->delete();
        return response()->json();
    }

    public function deleteAll(Request $request)
    {
        $requestIds = json_decode($request->data);
        foreach ($requestIds as $id) {
            $ids[] = $id->id;
        }
        if (Neighborhood::whereIn('id', $ids)->delete()) {
            return response()->json('success');
        } else {
            return response()->json('failed');
        }
    }
}
