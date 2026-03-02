<?php

namespace App\Http\Controllers;

use App\Models\RentalRequest;
use Illuminate\Http\Request;

class RentalRequestController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:50'],
            'equipment' => ['required', 'string', 'max:255'],
            'rental_date' => ['nullable', 'string', 'max:100'],
            'details' => ['nullable', 'string', 'max:2000'],
        ]);

        RentalRequest::create($data);

        return back()->with('success', 'Gracias. Tu solicitud fue enviada con exito.');
    }
}
