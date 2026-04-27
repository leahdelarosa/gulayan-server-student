<?php

namespace App\Http\Controllers;

use App\Models\PlantModel;
use Illuminate\Http\Request;
use \Illuminate\Validation\ValidationException;
use Carbon\Carbon;

class PlantController extends Controller
{
// ✅ LOAD + SEARCH + PAGINATION
    public function index(Request $request)
    {
        $query = PlantModel::query();

        // search (para sa frontend search bar)
        if ($request->search) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        // pagination (IMPORTANT sa frontend)
        $plants = $query->paginate(10);

        return response()->json($plants);
    }

   // ✅ ADD RECORD
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'type' => 'required|string',
            'price' => 'required|numeric'
        ]);

        $plant = PlantModel::create($request->all());

        return response()->json([
            'message' => 'Plant added successfully',
            'data' => $plant
        ]);
    }

  /**
   * Display the specified resource.
   */
  public function show(PlantModel $plantController)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, PlantModel $plantController)
  {
    //TODO : implement update record functionality
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(PlantModel $plant)
  {
    //TODO : implement delete record functionality
  }
}
