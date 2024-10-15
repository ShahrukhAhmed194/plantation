<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Dao\{TreeProfileDao, TreeTimelineImageDao, AddressDao};

class TreeProfileServices{
    
    protected $tree_profile_dao, $tree_timeline_image_dao, $address_dao;

    public function __construct()
    {
        $this->tree_profile_dao = new TreeProfileDao();
        $this->tree_timeline_image_dao = new TreeTimelineImageDao();
        $this->address_dao = new AddressDao();
    }

    public function createNewTreeProfile(Request $request)
    {
        $timeline = NULL;
        $tree_address_id = $this->address_dao->createANewAddress($request);
        $request->request->add(['address_id' => $tree_address_id]);

        $profile = $this->tree_profile_dao->createNewTreeWithoutPhoto($request);

        if ($request->hasFile('image_upload')) {
            $file_path = $this->saveProfilePic($request->file('image_upload'));
            $request->request->add(['tree_id' => $profile->id]);
            $request->request->add(['tree_photo_path' => $file_path]);
            $timeline = $this->tree_timeline_image_dao->createNewTreeTimeline($request);
            $profile->save();
        }
        
        return $profile;
    }

    public function getATree($id)
    {
        return $this->tree_profile_dao->fetchATree($id);
    }

    public function getAllTrees()
    {
        return $this->tree_profile_dao->fetchAllTrees();
    }

    public function getAllUnassignedTrees()
    {
        return $this->tree_profile_dao->fetchAllUnassingedTrees();

    }

    public function modifyATree(Request $request, $id)
    {
        $tree_address_id = $this->address_dao->createANewAddress($request);
        $request->request->add(['address_id' => $tree_address_id]);
        $modified_tree_profile = $this->tree_profile_dao->updateATree($request, $id);
    }

    public function saveProfilePic($image)
    {
        $file = $image;
        $file_name = date('Ymdhsi') . '_' . $file->getClientOriginalName();
        $file_path = $file->storeAs('uploads', $file_name, 'public');

        return $file_path;
    }

    public function getTotalTreeCount()
    {
        $trees = $this->tree_profile_dao->fetchAllTrees();

        return $trees->count();
    }

    public function getTotalAssignedTreeCount()
    {
        $trees = $this->tree_profile_dao->fetchAllAssignedTrees();

        return $trees->count();
    }

    public function getTotalAssignedTrees()
    {
       return $this->tree_profile_dao->fetchAllAssignedTrees();
    }
}