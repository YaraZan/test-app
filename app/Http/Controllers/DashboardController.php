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
        $path = $request->file('image')->store('arts');

        $art  = new Art();
        $art->title = $request->title;
        $art->user_id = $request->user()->id;
        $art->url = $path;
        $art->save();

        return Redirect::to('/dashboard');
    }

}
