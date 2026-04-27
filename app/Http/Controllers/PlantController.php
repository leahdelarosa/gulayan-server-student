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

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    //TODO: implement save record functionality
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
