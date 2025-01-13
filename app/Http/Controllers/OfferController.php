<?php

namespace App\Http\Controllers;

use App\Http\Requests\offerRequest;
use App\Models\Offer;
use Illuminate\Contracts\View\View;
class OfferController extends Controller
{
    public function index()
    {
        $offers = Offer::all();

        return view('offers.index', compact('offers'));
    }
    public function create(): View
    {
        return view('offers.create');
    }

    public function store(offerRequest $request): string
    {
        Offer::create([
            'name'        => $request ->name,
            'price'       => $request ->price,
            'description' => $request ->description,
            'status'      => $request ->status
        ]);
        return redirect()->back()->with('success', 'Offer stored successfully!');
    }
}
