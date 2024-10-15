<?php

namespace App\Http\Controllers;

use App\Services\{TreeProfileServices, UtilServices};
use Illuminate\Http\Request;
use App\Services\Validators\{treeValidator};

class TreeProfileController extends Controller{
    
    protected $tree_profile_services, $util_services, $tree_validator;

    public function __construct()
    {
        $this->tree_profile_services = new TreeProfileServices();
        $this->util_services = new UtilServices();
        $this->tree_validator = new treeValidator();
    }
   
    public function index()
    {
        $tree_profiles = $this->tree_profile_services->getAllTrees();

        return view('tree.index', compact('tree_profiles'));
    }

    public function create()
    {
        $divisions = $this->util_services->getDivisionListOfBD();
        
        return view('tree.create', compact('divisions'));
    }

    public function store(Request $request)
    {
        $validator =  $this->tree_validator->validateTreeProfileBeforeCreating($request);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $profile = $this->tree_profile_services->createNewTreeProfile($request);

        return redirect('tree/list')->with('success', 'New Tree Profile Has Been Created.');
    }

    public function edit($id)
    {
        $tree_profile = $this->tree_profile_services->getATree($id);
        $divisions = $this->util_services->getDivisionListOfBD();
        $districts = $this->util_services->getDistrictListOfBD($tree_profile->treeAddress->division);

        return view('tree.edit', compact('tree_profile', 'divisions', 'districts'));
    }

    public function update(Request $request, $id)
    {
        $validator =  $this->tree_validator->validateTreeBeforeEditing($request);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $modified_tree_profile = $this->tree_profile_services->modifyATree($request, $id);

        return redirect('tree/list')->with('success', 'Tree Profile Has Been Updated.');
    }

    public function countTotalTrees()
    {
        return $this->tree_profile_services->getTotalTreeCount();
    }

    public function countTotalAssignedTrees()
    {
        return $this->tree_profile_services->getTotalAssignedTreeCount();
    }

    public function showAssignedTrees()
    {
        $tree_profiles = $this->tree_profile_services->getTotalAssignedTrees();

        return view('tree.index', compact('tree_profiles'));

    }
}
