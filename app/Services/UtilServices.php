<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Dao\{TreeProfileDao, TreeTimelineImageDao};

class UtilServices{

    public function saveProfilePic($image)
    {
        $file = $image;
        $file_name = date('Ymdhsi') . '-' . str_replace(' ', '-', $file->getClientOriginalName());
        $file_path = $file->storeAs('uploads', $file_name, 'public');

        return $file_path;
    }

    public function getDivisionListOfBD()
    {
        $divisions = array(
            "Barishal", "Chattogram", "Dhaka", "Khulna", "Mymensingh", "Rajshahi", "Rangpur", "Sylhet"
        );

        return $divisions;
    }

    public function getDistrictListOfBD($division)
    {
        $districts = array(
            "Barishal" => array(
                "Barguna", "Barisal", "Bhola", "Jhalokati", "Patuakhali", "Pirojpur"
            ),
            "Chattogram" => array(
                "Bandarban", "Brahmanbaria", "Chandpur", "Chittagong", "Comilla", "Cox's Bazar", "Feni", "Khagrachari",
                "Lakshmipur", "Noakhali", "Rangamati"
            ),
            "Dhaka" => array(
                "Dhaka", "Faridpur", "Gazipur", "Gopalganj", "Jamalpur", "Kishoreganj", "Madaripur", "Manikganj",
                "Munshiganj", "Narayanganj", "Narsingdi", "Rajbari", "Shariatpur", "Tangail"
            ),
            "Khulna" => array(
                "Bagerhat", "Chuadanga", "Jessore", "Jhenaidah", "Khulna", "Kushtia", "Magura", "Meherpur", "Narail", "Satkhira"
            ),
            "Mymensingh" => array(
                "Jamalpur", "Mymensingh", "Netrokona", "Sherpur"
            ),
            "Rajshahi" => array(
                "Bogra", "Joypurhat", "Naogaon", "Natore", "Nawabganj", "Pabna", "Rajshahi", "Sirajgonj"
            ),
            "Rangpur" => array(
                "Dinajpur", "Gaibandha", "Kurigram", "Lalmonirhat", "Nilphamari", "Panchagarh", "Rangpur", "Thakurgaon"
            ),
            "Sylhet" => array(
                "Habiganj", "Maulvibazar", "Sunamganj", "Sylhet"
            )
        );
        if(is_null($division)){
            return 'Select District';
        }else{
            return $districts[$division];
        }
    }
}