<?php

namespace App\Http\Controllers;

use App\Services\{GiftRequestServices, TreeProfileServices, UserServices, UtilServices};
use Illuminate\Http\Request;
use App\Services\Validators\{giftRequestValidator};

class GiftRequestController extends Controller{
    protected $tree_profile_services, $gift_request_services, $user_services, $util_services, $gift_request_validator;

    public function __construct()
    {
        $this->tree_profile_services = new TreeProfileServices();
        $this->gift_request_services = new GiftRequestServices();
        $this->user_services = new UserServices();
        $this->util_services = new UtilServices();
        $this->util_services = new UtilServices();
        $this->gift_request_validator = new giftRequestValidator();
    }
    
    public function index()
    {
        $requests = $this->gift_request_services->getAllRequests();

        return view('request.index', compact('requests'));
    }

    public function store(Request $request)
    {
        $this->gift_request_services->saveAllRequests($request);

        return redirect('request/user-personal')->with('success', 'Your Gift Has Been Submitted.');
    }

    public function showUserPersonalRequestList()
    {
        $requests = $this->gift_request_services->getUserPersonalRequestList();

        return view('request.user', compact('requests'));
    }

    public function create(Request $request)
    {
        $this->user_services->addNewUser($request);
        return view('request.create');
    }

    public function showNewRequestsToAdmin()
    {
        $requests = $this->gift_request_services->getAllNewRequestsForAdmin();

        return view('request.new', compact('requests'));
    }

    public function processRequest($id)
    {
        $request = $this->gift_request_services->getARequestForAdmin($id);
        $trees = $this->tree_profile_services->getAllUnassignedTrees();
        $divisions = $this->util_services->getDivisionListOfBD();

        return view('request.process', compact('request', 'divisions', 'trees'));
    }

    public function updateRequestWithAddedTree(Request $request)
    {
        $validator =  $this->gift_request_validator->validateGiftRequest($request);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $tree = $this->gift_request_services->modifyRequestWithTree($request);

        return redirect('request/index')->with('success', 'Gift Request Has Been Updated.');
    }

    public function countTotalPendingRequests()
    {
        return $this->gift_request_services->getTotalPendingRequestCount();
    }
}
