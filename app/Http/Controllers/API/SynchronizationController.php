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

class SynchronizationController extends Controller
{
    public $itemsWithErrors;
    public $executedItemsId;

    /**
     * SynchronizationController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth:api');

        $this->itemsWithErrors = collect();
        $this->executedItemsId = [];
    }


    public function store(Request $request)
    {
        $data = json_decode($request->get('data'), true);

        $this->createFarmer($data);

        return response()->json([
            'status' => 'success',
            'message' => 'Synchronizations finished.',
            'data' => $this->itemsWithErrors
        ]);
    }

    private function createFarmer($data)
    {
        $currentItem = null;

        try {
            foreach ($data as $item) {

                if (!in_array($item['id'], $this->executedItemsId)) {

                    $farmer = Farmer::where('identifier', $item['identifier'])->first();
                    $currentItem = $item;

                    if ($farmer == null) {
                        Farmer::create($this->formatFarmerData($item));
                    } else {
                        $farmer->update($this->formatFarmerData($item));
                    }

                    array_push($this->executedItemsId, $currentItem['id']);
                }
            }
        } catch (\Exception $e) {
            $this->itemsWithErrors->push((object) [
                'id' => $currentItem['id'],
                'error' => $e->getMessage(),
            ]);

            array_push($this->executedItemsId, $currentItem['id']);

            $items = array_filter($data, function ($item) {
                return !in_array($item['id'], $this->executedItemsId);
            });

            $this->createFarmer($items);
        }
    }

    private function formatFarmerData($row)
    {
        return [
            'picture' => array_key_exists('picture', $row) && !is_null($row['picture']) ? storeBase64ToImage($row['picture']) : null,
            'gps_code' => array_key_exists('gpsCode', $row) && !is_null($row['gpsCode']) ? $row['gpsCode'] : null,
            'identifier' => $row['identifier'],
            'fullname' => $row['name'],
            'sexe' => $row['gender'],
            'phone' => $row['phone'],
            'manager_fullname' => $row['managerName'],
            'manager_sexe' => $row['managerGender'],
            'manager_phone' => $row['managerPhone'],
            'locality' => $row['section'],
            'number_of_plots' => (int) $row['numberOfPlots'],
            'number_of_children' => (int) $row['numberOfChildren'],
            'number_of_dependants' => (int) $row['numberOfDependants'],
            'marital_status' => $row['maritalStatus'],
            'number_of_women' => $row['numberOfWomen'],
            'born_date' => $row['birthDate'],
            'born_place' => $row['birthPlace'],
            'agribusiness_id' => \request()->user() ? request()->user()->agribusiness_id : null,
        ];
    }
}
