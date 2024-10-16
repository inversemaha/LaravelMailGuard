<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Profile;

class ProfileController extends Controller
{
    /**
     * Load Profile Create Form
     */
    public function create()
    {
        return view('profile.profile-create');
    }

    /**
     * Store Profile
     */
    public function store(Request $request)
    {
        $request->validate([
            'nature_of_ownership' => 'required|string',
            'tin' => 'required|numeric|unique:profiles,tin',
            'bin' => 'nullable|numeric',
            'year_of_registration' => 'required|numeric|min:1900|max:' . date('Y'),
            'years_in_operation' => 'required|numeric|min:0',
            'registered_office_address' => 'required|string',
            'website_url' => 'nullable|url',
            'contact_person_name' => 'required|string|max:255',
            'contact_person_email' => 'required|email',
            'contact_person_phone' => ['required', 'regex:/^\+880[0-9]{8,10}$/'],
            'trade_license' => 'required|file|mimes:pdf|max:2048',
            'tin_certificate' => 'required|file|mimes:pdf|max:2048',
            'bin_certificate' => 'nullable|file|mimes:pdf|max:2048',
            'certificate_of_incorporation' => 'nullable|file|mimes:pdf|max:2048',
        ]);

        // Handle file uploads and store them under public/profiles
        $tradeLicensePath = $request->file('trade_license')->store('public/profiles');
        $tinCertificatePath = $request->file('tin_certificate')->store('public/profiles');
        $binCertificatePath = $request->file('bin_certificate') ? $request->file('bin_certificate')->store('public/profiles') : null;
        $certificateOfIncorporationPath = $request->file('certificate_of_incorporation') ? $request->file('certificate_of_incorporation')->store('public/profiles') : null;

        // Store only the file names in the database
        Profile::create([
            'user_id' => Auth::id(),
            'nature_of_ownership' => $request->nature_of_ownership,
            'tin' => $request->tin,
            'bin' => $request->bin,
            'year_of_registration' => $request->year_of_registration,
            'years_in_operation' => $request->years_in_operation,
            'registered_office_address' => $request->registered_office_address,
            'website_url' => $request->website_url,
            'contact_person_name' => $request->contact_person_name,
            'contact_person_email' => $request->contact_person_email,
            'contact_person_phone' => $request->contact_person_phone,
            'trade_license' => basename($tradeLicensePath),
            'tin_certificate' => basename($tinCertificatePath),
            'bin_certificate' => $binCertificatePath ? basename($binCertificatePath) : null,
            'certificate_of_incorporation' => $certificateOfIncorporationPath ? basename($certificateOfIncorporationPath) : null,
        ]);


        return redirect()->route('profile.show')->with('status', 'Profile created successfully!');
    }

    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    public function show()
    {
        // Retrieve the profile for the authenticated user
        $profile = Auth::user()->profile;

        // If no profile is found, redirect to the profile creation page
        if (!$profile) {
            return redirect()->route('profile.create')->with('status', 'Your email has been verified. Please complete your profile to continue.');
        }

        return view('profile.profile-show', compact('profile'));
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function readFile($fineName)
    {
        $path = storage_path('app/public/profiles/' . $fineName);

        return response()->file($path, [
            'Content-Type' => 'application/pdf',
        ]);
    }
}
