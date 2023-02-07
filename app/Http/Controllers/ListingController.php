<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    // Show all listings
    public function index()
    {
        return view('listings.index', ['listings' => Listing::latest()->filter(request(['tag', 'search']))->get()]);
    }

    // Show single listing
    public function show(Listing $listing)
    {
        return view('listings.show', ['listing' => $listing]);
    }

    public function create()
    {
        return view('listings.create');
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required', Rule::unique('listings', 'company')],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);

        Listing::create($formFields);

        return redirect('/listings')->with('message', 'Listing created successfully');
    }

    public function search(Request $request)
    {
        $searchValue = $request->input('searchValue');

        return redirect('/listings/?search=' . $searchValue);
    }
}
