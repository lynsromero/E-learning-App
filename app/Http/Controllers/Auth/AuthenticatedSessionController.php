<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
public function store(LoginRequest $request): RedirectResponse
{


    $request->authenticate();
    $request->session()->regenerate();

    $user = $request->user();
    $loginType = $request->input('login_type');

    

    // 🔒 Admin login page protection
    if ($loginType === 'admin' && !$user->isAdmin()) {
        Auth::logout();

        return back()->withErrors([
            'email' => 'Credentials not matched with any admin.'
        ]);
    }

    // 🔒 Instructor login page protection
    if ($loginType === 'instructor' && !$user->isInstructor()) {
        Auth::logout();

        return back()->withErrors([
            'email' => 'Credentials not matched with any instructor.'
        ]);
    }

    // 🔒 User login page protection
    if ($loginType === 'user' && !$user->isUser()) {
        Auth::logout();

        return back()->withErrors([
            'email' => 'Credentials not matched with any user.'
        ]);
    }

    // ✅ Correct redirects
    if ($user->isAdmin()) {
        return redirect()->route('admin.dashboard');
    }

    if ($user->isInstructor()) {
        return redirect()->route('instructor.dashboard');
    }

    return redirect()->route('user.dashboard');
}

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
