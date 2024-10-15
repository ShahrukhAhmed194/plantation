<?php

namespace App\Services\Validators;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class treeValidator{

    public function validateTreeProfileBeforeCreating(Request $request)
    {
        return Validator::make($request->all(), [
                'details' => 'required',
                'longitude' => ['nullable', 'numeric', function ($attribute, $value, $fail) {
                    if ($value < -180 || $value > 180) {
                        $fail('Incorrect Format');
                    }
                }],
                'latitude' => ['nullable', 'numeric', function ($attribute, $value, $fail) {
                    if ($value < -180 || $value > 180) {
                        $fail('Incorrect Format');
                    }
                }],
                'planting_date' => ['nullable', 'date', 'after:2024-05-01', 'before:2050-12-31'],
                'photo_date' => ['nullable', 'date', 'after:2024-05-01', 'before:2050-12-31']
                
            ],
            [
                'details.required' => 'Please fill the details of the tree.',
                'longitude.numeric' => 'Incorrect Format',
                'latitude.numeric' => 'Incorrect Format',
                'planting_date.date' => 'Incorrect Format',
                'planting_date.after' => 'Date must be after 1st may,2024',
                'planting_date.before' => 'Date must be before 31st dec,2050',
                'photo_date.date' => 'Incorrect Format',
                'photo_date.after' => 'Date must be after 1st may,2024',
                'photo_date.before' => 'Date must be before 31st dec,2050',
            ]
        );
    }


    public function validateTreeBeforeEditing(Request $request)
    {
        return Validator::make($request->all(), [
                'details' => 'required',
                'status' => 'required',
                'longitude' => ['nullable', 'numeric', function ($attribute, $value, $fail) {
                    if ($value < -180 || $value > 180) {
                        $fail('Incorrect Format');
                    }
                }],
                'latitude' => ['nullable', 'numeric', function ($attribute, $value, $fail) {
                    if ($value < -180 || $value > 180) {
                        $fail('Incorrect Format');
                    }
                }],
                'planting_date' => ['date', 'after:2024-05-01', 'before:2050-12-31'],
                'planting_time' => 'required',
                'photo_date' => ['nullable', 'date', 'after:2024-05-01', 'before:2050-12-31']
                
            ],
            [
                'details.required' => 'Please fill the details of the tree.',
                'status.required' => 'Tree status is required.',
                'longitude.numeric' => 'Incorrect Format',
                'latitude.numeric' => 'Incorrect Format',
                'planting_date.date' => 'Incorrect Format',
                'planting_date.after' => 'Date must be after 1st may,2024',
                'planting_date.before' => 'Date must be before 31st dec,2050',
                'planting_time' => 'Plantation time is required.',
                'photo_date.date' => 'Incorrect Format',
                'photo_date.after' => 'Date must be after 1st may,2024',
                'photo_date.before' => 'Date must be before 31st dec,2050',
            ]
        );
    }
}