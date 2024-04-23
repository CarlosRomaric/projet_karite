<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agribusiness;
use App\Models\Farmer;
use App\Models\Plot;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index()
    {
        $user = auth()->user();
       
        $this->authorize('ADMIN TABLEAU DE BORD');

        $users = User::retrievingByUsersType()->get();
        $farmers = Farmer::with('plots')->retrievingByUsersType()->get();
        $agribusinesses = Agribusiness::orderBy('denomination')->paginate(10);

        return view('dashboard.index', compact('farmers', 'agribusinesses', 'users'));
    }
    
}
