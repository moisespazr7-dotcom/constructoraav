<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LeadContact;
use App\Models\MaterialRequest;
use App\Models\RentalRequest;

class DashboardController extends Controller
{
    public function __invoke()
    {
        return view('admin.dashboard', [
            'contacts' => LeadContact::count(),
            'rentals' => RentalRequest::count(),
            'materials' => MaterialRequest::count(),
        ]);
    }
}
