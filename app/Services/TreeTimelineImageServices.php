<?php

namespace App\Services;

use App\Dao\{TreeProfileDao, TreeTimelineImageDao};
use App\Services\{UtilServices};
use App\Models\{TreeTimelineImage};
use Illuminate\Support\Facades\Storage;

class TreeTimelineImageServices{
    protected $tree_profile_dao, $tree_timeline_image_dao, $util_service;

    public function __construct()
    {
        $this->util_service = new UtilServices();
        $this->tree_profile_dao = new TreeProfileDao();
        $this->tree_timeline_image_dao = new TreeTimelineImageDao();
    }

    public function addNewImagesToTreeTimeline($request)
    {
        if ($request->hasFile('tree_photo_path')) {
            foreach($request->file('tree_photo_path') as $key => $image) {
                $timeline_info['tree_id'] = $request->input('tree_id');
                $timeline_info['tree_photo_path'] = $this->util_service->saveProfilePic($image);
                $timeline_info['photo_date'] = $request->photo_date[$key];
                $timeline = $this->tree_timeline_image_dao->createNewTreeTimelineWithArray($timeline_info);
            }
        }

        return $timeline;
    }

    public function destroyASpecificTimelinePhoto($id)
    {
        $timeline = $this->tree_timeline_image_dao->fetchATimeline($id);
        if (Storage::exists($timeline->tree_photo_path)) {
            Storage::delete($timeline->tree_photo_path);
        }
        $timeline->delete();
        return $id;
    }

    public function getATimeline($id)
    {
        return $this->tree_timeline_image_dao->fetchATimeline($id);
    }

    public function getTimelinesByTreeId($tree_id)
    {
        return $this->tree_timeline_image_dao->fetchATimelinesByTreeId($tree_id);
    }
}