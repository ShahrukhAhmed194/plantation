<?php

namespace App\Services\Validators;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class timelineValidator{

    public function validateNewTimelineImages(Request $request)
    {
        return Validator::make($request->all(), [
            'tree_id' => 'required|integer|exists:tree_profiles,id',
            'photo_date.*' => 'required|date|after:2024-05-01|before:2050-12-31',
            'tree_photo_path.*' => 'required|file|mimes:jpg,jpeg,png|max:2048',
        ], [
            'tree_id.required' => 'Tree ID is required.',
            'tree_id.integer' => 'Tree ID must be an integer.',
            'tree_id.exists' => 'The selected tree ID is invalid.',
            'photo_date.*.required' => 'The plantation date is required.',
            'photo_date.*.date' => 'The plantation date must be a valid date.',
            'photo_date.*.after' => 'The plantation date must be after May 1, 2024.',
            'photo_date.*.before' => 'The plantation date must be before December 31, 2050.',
            'tree_photo_path.*.required' => 'An image is required.',
            'tree_photo_path.*.file' => 'The file must be a valid image file.',
            'tree_photo_path.*.mimes' => 'The image must be a file of type: jpg, jpeg, png.',
            'tree_photo_path.*.max' => 'The image must not be larger than 2MB.',
        ]);
    }
}