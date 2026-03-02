<?php

namespace App\Http\Controllers;

use App\Models\MaterialRequest;
use Illuminate\Http\Request;

class MaterialRequestController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:50'],
            'email' => ['nullable', 'email', 'max:255'],
            'material' => ['required', 'string', 'max:255'],
            'quantity' => ['nullable', 'string', 'max:100'],
            'details' => ['nullable', 'string', 'max:2000'],
        ]);

        MaterialRequest::create($data);

        return back()->with('success', 'Gracias. Tu solicitud fue enviada con exito.');
    }
}
