<?php

namespace App\DAO;

use App\Models\{TreeTimelineImage};
use Illuminate\Support\Facades\Auth;

class TreeTimelineImageDao{

    public function createNewTreeTimeline($request)
    {
        $timeline = new TreeTimelineImage();
        $timeline->tree_id = $request->tree_id;
        $timeline->tree_photo_path = $request->tree_photo_path;
        $timeline->photo_date = $request->photo_date;
        $timeline->created_by = $request->has('created_by') ? $request->created_by : auth()->user()->id;
        $timeline->updated_by = $request->has('updated_by') ? $request->updated_by : auth()->user()->id;
        $timeline->save();

        return $timeline;
    }

    public function createNewTreeTimelineWithArray($array_list)
    {
        $timeline = new TreeTimelineImage();
        $timeline->tree_id = $array_list['tree_id'];
        $timeline->tree_photo_path = $array_list['tree_photo_path'];
        $timeline->photo_date = $array_list['photo_date'];
        $timeline->save();

        return $timeline;
    }

    public function fetchATimeline($id)
    {
        return TreeTimelineImage::find($id);
    }

    public function fetchATimelinesByTreeId($tree_id)
    {
        return TreeTimelineImage::where('tree_id', $tree_id)->get();
    }
}