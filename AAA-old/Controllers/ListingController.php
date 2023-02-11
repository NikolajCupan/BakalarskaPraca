<?php


use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends \App\Http\Controllers\Controller
{
    // Show all listings
    public function index()
    {
        return view('listings.index', ['listings' => Listing::latest()->filter(request(['tag', 'search']))->paginate(4)]);
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

        if ($request->hasFile('image'))
        {
            $formFields['image'] = $request->file('image')->store('images', 'public');
        }

        Listing::create($formFields);

        return redirect('/listings')->with('message', 'Listing created successfully');
    }

    public function edit(Listing $listing)
    {
        return view('listings.edit', ['listing' => $listing]);
    }

    public function update(Request $request, Listing $listing)
    {
        $formFields = $request->validate([
            'title' => 'required',
            'company' => 'required',
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);

        if ($request->hasFile('image'))
        {
            $formFields['image'] = $request->file('image')->store('images', 'public');
        }

        $listing->update($formFields);

        return back()->with('message', 'Listing updated successfully');
    }

    public function destroy(Listing $listing)
    {
        $listing->delete();

        return redirect('/listings')->with('message', 'Listing deleted successfully');
    }

    public function search(Request $request)
    {
        $searchValue = $request->input('searchValue');

        return redirect('/listings/?search=' . $searchValue);
    }
}
