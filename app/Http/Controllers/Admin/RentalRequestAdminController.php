<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RentalRequest;
use Illuminate\Http\Request;

class RentalRequestAdminController extends Controller
{
    public function index(Request $request)
    {
        $query = RentalRequest::query();

        if ($request->filled('status')) {
            $query->where('status', $request->string('status'));
        }

        if ($request->filled('q')) {
            $term = $request->string('q');
            $query->where(function ($q) use ($term) {
                $q->where('name', 'like', "%{$term}%")
                    ->orWhere('phone', 'like', "%{$term}%")
                    ->orWhere('equipment', 'like', "%{$term}%");
            });
        }

        return view('admin.rentals.index', [
            'items' => $query->latest()->paginate(20)->withQueryString(),
        ]);
    }

    public function update(Request $request, RentalRequest $rentalRequest)
    {
        $data = $request->validate([
            'status' => ['required', 'in:new,in_progress,closed'],
        ]);

        $rentalRequest->update($data);

        return back()->with('success', 'Status actualizado.');
    }

    public function destroy(RentalRequest $rentalRequest)
    {
        $rentalRequest->delete();

        return back()->with('success', 'Registro eliminado.');
    }
}
