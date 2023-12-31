<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    // show all listings
    public function index(){
        return view('listings.index', [
            'listings'=> Listing::latest()->filter(request(['tag', 'search']))->paginate(10),
        ]);
    }

    // show single listing
    public function show(Listing $listing){
        return view('listings.show', [
            'listing'=>$listing,
        ]);
    }

    // show create form
    public function create(){
        return view('listings.create');
    }

    // store form data
    public function store(Request $request){

        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required', Rule::unique('listings','company')],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required','email'],
            'tags' => 'required',
            'description' => 'required',
        ]);

        if($request->hasFile('logo')){
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $formFields['user_id'] = auth()->user()->id;

        Listing::create($formFields);

        return redirect('/')->with('success', 'Listing created successfully!');
    }
    //Show Edit Page
    public function edit(Listing $listing){
        if($listing->user_id != auth()->user()->id){
            return back();
        }
        return view('listings.edit', ['listing'=>$listing]);
    }

    //Update Listing
    public function update(Request $request, Listing $listing){
        //Make sure logged in user is owner
        if($listing->user_id != auth()->user()->id){
            abort(403,'Unauthorized Action');
        }
        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required'],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required','email'],
            'tags' => 'required',
            'description' => 'required',
        ]);

        if($request->hasFile('logo')){
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $listing->update($formFields);

        return back()->with('success', 'Listing updated successfully!');
    }

    public function destroy(Listing $listing){
        if($listing->user_id != auth()->user()->id){
            abort(403,'Unauthorized Action');
        }
        $listing->delete();
        return redirect('/')->with('success', 'Listing deleted successfully!');
    }

    public function manage(){
        return view('listings.manage', ['listings'=>auth()->user()->listings]);
    }

}