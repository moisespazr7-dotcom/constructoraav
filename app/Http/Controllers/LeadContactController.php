<?php

namespace App\Http\Controllers;

use App\Models\LeadContact;
use Illuminate\Http\Request;

class LeadContactController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:50'],
            'email' => ['nullable', 'email', 'max:255'],
            'project_address' => ['nullable', 'string', 'max:255'],
            'project_info' => ['nullable', 'string', 'max:2000'],
        ]);

        LeadContact::create($data);

        return back()->with('success', 'Gracias. Tu solicitud fue enviada con exito.');
    }
}
