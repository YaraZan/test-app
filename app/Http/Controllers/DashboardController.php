<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Art;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;
Use Image;

class DashboardController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function index()
    {
        return Inertia::render('Dashboard', [
            'arts' => Art::all(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function create(Request $request)
    {


        $art  = new Art();
        $art->name = $request->name;

        if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save( storage_path('/uploads/' . $filename ) );
            $art->image = $filename;
            $art->save();
        };

        $person->save();

        return redirect()->route('people.index')
        ->with('success','Item created successfully');
    }

}
