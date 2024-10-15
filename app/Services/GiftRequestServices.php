<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Dao\{GiftRequestDao, AddressDao, TreeProfileDao};

class GiftRequestServices{
    
    protected $gift_request_dao, $address_dao, $tree_profile_dao;

    public function __construct()
    {
        $this->gift_request_dao = new GiftRequestDao();
        $this->address_dao = new AddressDao();
        $this->tree_profile_dao = new TreeProfileDao();
    }

    public function getAllNewRequestsForAdmin()
    {
        return $this->gift_request_dao->fetchAllNewRequestsForAdmin();
    }

    public function getAllRequests()
    {
        return $this->gift_request_dao->fetchAllRequests();
    }

    public function saveAllRequests($request)
    {
        $request_data = [];
        foreach ($request->phone as $key => $phone) {
            $request_data = [
                'address_of' => 'person',
                'name' => $request->name[$key],
                'phone' => $phone,
                'division' => $request->division[$key],
                'district' => $request->district[$key],
                'home_address' => $request->home_address[$key]
            ];
            $request_object = (object) $request_data;
            $receiver_address_id = $this->address_dao->createANewAddress($request_object);
            $request_object->address_id = $receiver_address_id;
            $new_request_array[$key] = $this->gift_request_dao->createNewRequests($request_object);
        }
        $new_request_object = (object) $new_request_array;
        return $new_request_object;
    }

    public function getUserPersonalRequestList()
    {
        return $this->gift_request_dao->fetchUserPersonalRequestList();
    }

    public function getARequestForAdmin($id)
    {
        return $this->gift_request_dao->fetchARequestForAdmin($id);
    }

    public function modifyRequestWithTree($request)
    {
        $this->address_dao->updateAddress($request);
        $this->gift_request_dao->updateRequestWithTree($request);
        $this->gift_request_dao->changeRequestStatus($request);
        $tree_profile = $this->tree_profile_dao->changeTreeStatus($request->tree_id);

        return $tree_profile;
    }

    public function getTotalPendingRequestCount()
    {
        $gift_request = $this->gift_request_dao->fetchAllNewRequestsForAdmin();

        return $gift_request->count();
    }
} 