<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\API\BaseController;
use App\Models\Offer;

class OfferController extends BaseController
{
    public function __construct(){
        $this->middleware('auth:api');
    }

    public function rules(){
        $rules = [
            'qte'=>'required',
            'certification'=>'required',
            'selling_price'=>'required',
            'type_packaging'=>'required',
            'farmer_id'=>'required',
            'user_id'=>'required'
        ];

        return $rules;
    }


    public function messages(){
        $messages = [
            'qte.required'=>'la quantité du produit est obligatoire',
            'certification.required'=>'le choix de la certification est obligatoire',
            'type_packaging.required'=>'le choix du type de conditionnement est obligatoire',
            'selling_price.required'=>'le prix unitaire est obligatoire',
            'farmer_id.required'=>'le choix du producetur est obligatoire',
            'user_id.required'=>'l\'identifiant de l\'utilisateur en cours est obligatoire'
            
        ];

        return $messages;
    }

    public function index(){

        $offers = Offer::orderBy('created_at','DESC')->get();
        return $this->sendResponse($offers,'liste des offres de produit');
    }


    public function store(Request $request){
        $data = Validator::make($request->all(), $this->rules(), $this->messages());

        if($data->fails()){
            return $this->sendError('une erreur s\'est produite', $data->errors());
        }else{
           
            $data = $request->all();
            $offer = Offer::create($data);
            $success['offers']=  $offer;
            return $this->sendResponse($offer,'votre offre a bien été enregistré');
        }
    }
}
