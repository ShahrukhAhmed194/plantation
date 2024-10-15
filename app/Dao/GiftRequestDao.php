<?php

namespace App\DAO;

use App\Models\{GiftRequest};

class GiftRequestDao{

   public function fetchAllNewRequestsForAdmin()
   {
          $requests = GiftRequest::where('status', 0)->latest()->get();

          return $requests;
   }

   public function fetchAllRequests()
   {
        return GiftRequest::all();
   }

   public function createNewRequests($request)
   {
     $gift = GiftRequest::create([
          'sender_id' => auth()->user()->id,
          'address_id' => $request->address_id,
          // 'tree_id' => $request->tree_id,
          'receiver_name' => $request->name,
          'receiver_phone' => $request->phone,
     ]);

     return $gift;
   }

   public function fetchARequestForAdmin($id)
   {
     return GiftRequest::find($id);
   }

   public function updateRequestWithTree($request)
   {
      $gift_request = GiftRequest::find($request->id);
      $gift_request->receiver_name = $request->receiver_name;
      $gift_request->receiver_phone = $request->receiver_phone;
      $gift_request->updated_by  = auth()->user()->id;
      $gift_request->status = 1 ;
      $gift_request->tree_id  = $request->tree_id;
      $gift_request->save();

      return $gift_request;
   }

   public function changeRequestStatus($request)
   {
      $gift_request = GiftRequest::find($request->id);
      $gift_request->status = $request->status;
      $gift_request->save();
   }

   public function fetchUserPersonalRequestList()
   {
      return GiftRequest::where('sender_id', auth()->user()->id)
            ->orderBy('created_at', 'DESC')
            ->get();
   }
}