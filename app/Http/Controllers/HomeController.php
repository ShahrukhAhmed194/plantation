<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Services\{UtilServices};
use Illuminate\Http\Request;

class HomeController extends Controller{

    protected $util_service;
    public function __construct()
    {
        // $this->middleware('auth');
        $this->util_service = new UtilServices();
    }
    
    public function index()
    {
        return view('welcome');

    }

    public function home()
    {
        if(auth()->user()->type == 'admin')
            return view('dashboard.admin');
        elseif(auth()->user()->type == 'user'){
            $divisions = $this->util_service->getDivisionListOfBD();

            return view('dashboard.user', compact('divisions'));
        }
    }

    public function goToWelcomePage()
    {
        return view('welcome');
    }

    public function getDivisionList()
    {
        return $this->util_service->getDivisionListOfBD();
    }

    public function getDistrictList(Request $request)
    {
        return $this->util_service->getDistrictListOfBD($request->division);
    }
}
