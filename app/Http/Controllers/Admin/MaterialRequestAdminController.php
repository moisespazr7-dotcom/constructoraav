<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MaterialRequest;
use Illuminate\Http\Request;

class MaterialRequestAdminController extends Controller
{
    public function index(Request $request)
    {
        $query = MaterialRequest::query();

        if ($request->filled('status')) {
            $query->where('status', $request->string('status'));
        }

        if ($request->filled('q')) {
            $term = $request->string('q');
            $query->where(function ($q) use ($term) {
                $q->where('name', 'like', "%{$term}%")
                    ->orWhere('phone', 'like', "%{$term}%")
                    ->orWhere('email', 'like', "%{$term}%")
                    ->orWhere('material', 'like', "%{$term}%");
            });
        }

        return view('admin.materials.index', [
            'items' => $query->latest()->paginate(20)->withQueryString(),
        ]);
    }

    public function update(Request $request, MaterialRequest $materialRequest)
    {
        $data = $request->validate([
            'status' => ['required', 'in:new,in_progress,closed'],
        ]);

        $materialRequest->update($data);

        return back()->with('success', 'Status actualizado.');
    }

    public function destroy(MaterialRequest $materialRequest)
    {
        $materialRequest->delete();

        return back()->with('success', 'Registro eliminado.');
    }
}
