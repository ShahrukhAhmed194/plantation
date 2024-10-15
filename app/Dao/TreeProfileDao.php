<?php

namespace App\DAO;

use App\Models\{TreeProfile};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Ramsey\Uuid\Uuid;

class TreeProfileDao{

    public function createNewTreeWithoutPhoto(Request $request)
    {
        $tree = new TreeProfile();
        $tree->details = $request->details;
        $tree->address_id  = $request->address_id;
        $tree->latitude = $request->latitude;
        $tree->longitude = $request->longitude;
        $tree->uuid = Uuid::uuid4();;
        $tree->planting_date = $request->planting_date;
        $tree->planting_time = $request->planting_time;
        $tree->created_by = $request->has('created_by') ? $request->created_by : auth()->user()->id;
        $tree->updated_by = $request->has('updated_by') ? $request->updated_by : auth()->user()->id;
        $tree->save();

        return $tree;
    }

    public function fetchATree($id)
    {
        return TreeProfile::find($id);
    }

    public function fetchAllTrees()
    {
        return TreeProfile::latest()->get();
    }

    public function fetchAllAssignedTrees()
    {
        return TreeProfile::where('status', 1)->get();
    }

    public function fetchAllUnassingedTrees()
    {
        return TreeProfile::where('status', 0)->get();
    }

    public function updateATree(Request $request, $id)
    {
        $tree_profile = $this->fetchATree($id);
        $tree_profile->status = $request->status;
        $tree_profile->address_id = $request->address_id;
        $tree_profile->details = $request->details;
        $tree_profile->longitude = $request->longitude;
        $tree_profile->latitude = $request->latitude;
        $tree_profile->planting_date = $request->planting_date;
        $tree_profile->planting_time = $request->planting_time;
        $tree_profile->save();

        return $tree_profile;
    }


    public function changeTreeStatus($id)
    {
        $tree_profile = TreeProfile::find($id);;
        $tree_profile->status = 1;
        $tree_profile->save();

        return $tree_profile;
    }
}