<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LeadContact;
use Illuminate\Http\Request;

class LeadContactAdminController extends Controller
{
    public function index(Request $request)
    {
        $query = LeadContact::query();

        if ($request->filled('status')) {
            $query->where('status', $request->string('status'));
        }

        if ($request->filled('q')) {
            $term = $request->string('q');
            $query->where(function ($q) use ($term) {
                $q->where('name', 'like', "%{$term}%")
                    ->orWhere('phone', 'like', "%{$term}%")
                    ->orWhere('email', 'like', "%{$term}%");
            });
        }

        return view('admin.contacts.index', [
            'items' => $query->latest()->paginate(20)->withQueryString(),
        ]);
    }

    public function update(Request $request, LeadContact $leadContact)
    {
        $data = $request->validate([
            'status' => ['required', 'in:new,in_progress,closed'],
        ]);

        $leadContact->update($data);

        return back()->with('success', 'Status actualizado.');
    }

    public function destroy(LeadContact $leadContact)
    {
        $leadContact->delete();

        return back()->with('success', 'Registro eliminado.');
    }
}
