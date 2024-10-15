<?php

namespace App\Http\Controllers;

use App\Services\{TreeTimelineImageServices};
use Illuminate\Http\Request;
use App\Services\Validators\{timelineValidator};

class TreeTimelineImageController extends Controller{

    protected $tree_timeline_image_service, $timeLine_validator;

    public function __construct()
    {
        $this->tree_timeline_image_service = new  TreeTimelineImageServices();
        $this->timeLine_validator = new  timelineValidator();
    }

    public function store(Request $request)
    {
        $validator =  $this->timeLine_validator->validateNewTimelineImages($request);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $timeline = $this->tree_timeline_image_service->addNewImagesToTreeTimeline($request);

        return redirect()->back()->with('success', 'New Timeline Picture Has Been Added.');
    }

    public function show($tree_id)
    {
        $timelines = $this->tree_timeline_image_service->getTimelinesByTreeId($tree_id);;

        return view('timeline.index', compact('timelines', 'tree_id'));
    }

    public function destroy($id)
    {
        $this->tree_timeline_image_service->destroyASpecificTimelinePhoto($id);

        return back()->with('success', 'Timeline Picture Has Been Removed.');
    }
}
