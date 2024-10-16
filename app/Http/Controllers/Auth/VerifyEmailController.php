<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VerifyEmailController extends Controller
{
    /**
     * Mark the authenticated user's email address as verified.
     */
    public function __invoke(EmailVerificationRequest $request): RedirectResponse
    {
        if ($request->user()->hasVerifiedEmail()) {
            return redirect()->intended(RouteServiceProvider::HOME.'?verified=1');
        }

        if ($request->user()->markEmailAsVerified()) {
            event(new Verified($request->user()));
        }

        return redirect()->intended(RouteServiceProvider::HOME.'?verified=1');
    }

    public function verify(Request $request, $id)
    {
        // Retrieve the user by ID
        $user = User::find($id);

        if (!$user) {
            // Handle user not found case
            return response()->json(['error' => 'User not found'], 404);
        }

        // Further validation with the hash
        if (! hash_equals((string) $request->route('hash'), sha1($user->getEmailForVerification()))) {
            return response()->json(['error' => 'Invalid verification link'], 403);
        }

        // Proceed with marking the email as verified
        if ($user->markEmailAsVerified()) {
            event(new Verified($user));
        }
        // Auto-login the user
        Auth::login($user);

        // Redirect to profile page
        return redirect()->route('profile.show')->with('verified', true);
    }

}
