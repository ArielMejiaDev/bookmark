<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class VerifyEmailController extends Controller
{
    /**
     * Mark the authenticated user's email address as verified.
     *
     * @param  \Illuminate\Foundation\Auth\EmailVerificationRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(EmailVerificationRequest $request)
    {
        $role = $request->user()->role->description;

        if ($request->user()->hasVerifiedEmail()) {
            return redirect()->intended(route(RouteServiceProvider::ROUTES_BY_ROLE[$role]) .'?verified=1' ?? RouteServiceProvider::HOME.'?verified=1');
        }

        if ($request->user()->markEmailAsVerified()) {
            event(new Verified($request->user()));
        }

        return redirect()->intended(route(RouteServiceProvider::ROUTES_BY_ROLE[$role]) .'?verified=1' ?? RouteServiceProvider::HOME.'?verified=1');
    }
}
