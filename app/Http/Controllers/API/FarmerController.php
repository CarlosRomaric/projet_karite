<?php
/**
 * Created by PhpStorm.
 * User: salioudiabate
 * Date: 16/11/2019
 * Time: 22:33
 */

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Farmer;
use Illuminate\Http\Request;

class FarmerController extends Controller
{

    /**
     * FarmerController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index(Request $request)
    {
        $total = Farmer::where('agribusiness_id', $request->user()->agribusiness_id)->count();
        return response()->json([
            'status' => 'success',
            'message' => 'Farmer list retrieving successfully.',
            'data' =>  $this->getFarmersByAgribusiness($request),
            'meta' => [
                'total' => $total,
                'per_page' => (int) $request->get('per_page', 10),
                'page' => (int) $request->get('page', 1),
                'total_page' => ceil($total / $request->get('per_page', 10))
            ]
        ]);
    }



    private function getFarmersByAgribusiness($request)
    {
        $skip = $request->get('per_page', 10) * ($request->get('page', 1) - 1);
        return Farmer::query()
            ->where('agribusiness_id', $request->user()->agribusiness_id)
            ->orderBy('fullname')
            ->take($request->get('per_page', 10))
            ->skip($skip)
            ->with('plots')
            ->get()
            ->transform(function ($farmer) {
                return [
                    'id' => $farmer->id,
                    'identifier' => $farmer->identifier,
                    'gps_code' => $farmer->gps_code,
                    'fullname' => $farmer->fullname,
                    'born_date' => $farmer->born_date,
                    'born_place' => $farmer->born_place,
                    'locality' => $farmer->locality,
                    'phone' => $farmer->phone,
                    'sexe' => $farmer->sexe,
                    'number_of_children' => $farmer->number_of_children,
                    'number_of_dependants' => $farmer->number_of_dependants,
                    'marital_status' => $farmer->marital_status,
                    'number_of_women' => $farmer->number_of_women,
                    'number_of_plots' => $farmer->number_of_plots,
                    'manager_fullname' => $farmer->manager_fullname,
                    'manager_sexe' => $farmer->manager_sexe,
                    'manager_phone' => $farmer->manager_phone,
                    'picture' => $farmer->picture ? base64_encode(file_get_contents(asset('storage/'.$farmer->picture))) : null,
                    'agribusiness_id' => $farmer->agribusiness_id,
                    'created_at' => $farmer->created_at,
                    'updated_at' => $farmer->updated_at
                ];
            });
    }
}
