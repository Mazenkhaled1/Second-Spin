<?php

namespace App\Http\Controllers\Admin\Dashboard\Donation;

use App\Http\Controllers\Controller;
use App\Models\Donations;


class DonationDashboardController extends Controller
{
    public Function index() 
    {
        $donations = Donations::all() ;
        return view('Admin.donation' , compact('donations')) ;
    }


    public function destroy(Donations $donation) 
    {

        $donation->delete() ;
        return redirect('dashboard/donation/')->with('deleted','Shipment Started For This Donation') ; 
    }
}
