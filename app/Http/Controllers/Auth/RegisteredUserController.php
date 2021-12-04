<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Centre;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $centre = DB::table('centre')
            ->select('centreName','address','id')
            ->get();
        return view('auth.register', [
            'title' => 'Register as HealthCare admin',
            'centre' =>  $centre
        ]);
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'staff_Id' => 'required','numeric','unique:users',
            'centre' => 'required',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'staff_Id' => $request->staff_Id,
            'centre_id' => $request->centre,
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);
        $user->attachRole('admin');
        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
    public function registerCentre(Request $request)
    {
        $validated = $request->validate([
            'centreName' => 'required|max:255',
            'address' => 'required|max:255',
        ]);
        Centre::create($request->all());
        return redirect('/register')->with('success','Successfully register test centre');
    }
}
