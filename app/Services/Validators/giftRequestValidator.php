<?php

namespace App\Services\Validators;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class giftRequestValidator{

    public function validateGiftRequest(Request $request)
    {
        return Validator::make($request->all(), [
                'tree_id' => 'required',
                'status' => ['required', 'not_in:0'],
            ],
            [
                'tree_id.required' => 'Please assign a tree.',
                'status.required' => 'Please select a status.',
                'status.not_in' => 'Status cannot be pending.',
            ]
        );
    }
}