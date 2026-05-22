<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Subscription;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function index()
    {
        return response()->json(
            Subscription::with([
                'customer',
                'service'
            ])->get()
        );
    }

    public function store(Request $request)
    {
        $subscription = Subscription::create(
            $request->all()
        );

        return response()->json(
            $subscription,
            201
        );
    }

    public function show(Subscription $subscription)
    {
        return response()->json(
            $subscription->load([
                'customer',
                'service'
            ])
        );
    }

    public function update(
        Request $request,
        Subscription $subscription
    ) {
        $subscription->update(
            $request->all()
        );

        return response()->json(
            $subscription
        );
    }

    public function destroy(
        Subscription $subscription
    ) {
        $subscription->delete();

        return response()->json([
            'message' =>
                'Subscription berhasil dihapus'
        ]);
    }
}