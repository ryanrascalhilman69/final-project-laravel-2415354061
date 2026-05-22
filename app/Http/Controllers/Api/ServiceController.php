<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    // GET /api/services
    public function index()
    {
        return response()->json(Service::all());
    }

    // POST /api/services
    public function store(Request $request)
    {
        $service = Service::create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'status' => $request->status
        ]);

        return response()->json($service, 201);
    }

    // GET /api/services/{id}
    public function show(string $id)
    {
        return response()->json(Service::findOrFail($id));
    }

    // PUT /api/services/{id}
    public function update(Request $request, string $id)
    {
        $service = Service::findOrFail($id);

        $service->update($request->all());

        return response()->json($service);
    }

    // DELETE /api/services/{id}
    public function destroy(string $id)
    {
        $service = Service::findOrFail($id);

        $service->delete();

        return response()->json([
            'message' => 'Deleted successfully'
        ]);
    }
}