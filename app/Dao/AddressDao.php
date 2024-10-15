<?php

namespace App\DAO;

use App\Models\{Address};

class AddressDao{

    public function createANewAddress($request)
    {
        $address = Address::create([
            'address_of' => $request->address_of,
            'division' => $request->division,
            'district' => $request->district,
            'home_address' => $request->home_address,

        ]);

        return $address->id;
    }

    public function updateAddress($request)
    {
        $address = Address::find($request->address_id);        
        $address->address_of =  $request->address_of;
        $address->division = $request->division;
        $address->district = $request->district;
        $address->home_address = $request->home_address;
        $address->save();

        return $address->id;
    }
}