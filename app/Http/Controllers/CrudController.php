<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CrudController extends Controller
{
    public function create(): View
    {
        return view('offers.create');
    }

    public function store(Request $request): string
    {
        // validate the data before insert in the database
        $validationRules = [
            'name'        => 'required|max:10|unique:offers,name',
            'description' => 'required|max:100',
            'price'       => 'required|numeric',
            'status'      => 'required',
        ];
        $messages = [
          'name.required'        => __('messages.offer_name_required'),
          'name.max'             => __('messages.offer_name_max'),
          'name.unique'          => __('messages.offer_name_unique'),
          'description.required' => __('messages.offer_description_required'),
          'description.max'      => __('messages.offer_description_max'),
          'price.required'       => __('messages.offer_price_required'),
          'price.numeric'        => __('messages.offer_price_numeric'),
          'status.required'      => __('messages.offer_status_required'),
        ];
        $validator = Validator::make($request->all(),$validationRules,$messages);
        if ($validator -> fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        // insert
        Offer::create([
            'name'        => $request ->name,
            'price'       => $request ->price,
            'description' => $request ->description,
            'status'      => $request ->status
        ]);
        return redirect()->back()->with('success', 'Offer stored successfully!');

    }
}
