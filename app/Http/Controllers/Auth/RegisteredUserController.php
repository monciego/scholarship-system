<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Inertia\Inertia;
use Inertia\Response;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): Response
    {
        return Inertia::render('Auth/Register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'id_number' => 'nullable|string|max:255',
            'number_of_studying_siblings' => 'nullable|numeric',
            'house_hold_per_capita_income' => 'nullable|string|max:255',
            'birthday' => 'nullable|date',
            'have_existing_scholarship' => 'nullable',
  /*           'have_existing_scholarship.TDP' => 'nullable|boolean',
            'have_existing_scholarship.TES' => 'nullable|boolean',
            'have_existing_scholarship.ACSP' => 'nullable|boolean',
            'have_existing_scholarship.DOLE' => 'nullable|boolean',
            'have_existing_scholarship.VIRGINIAN_SCHOLARSHIP' => 'nullable|boolean',
            'have_existing_scholarship.SM_MEGAWORLD' => 'nullable|boolean', */
            // 'have_existing_scholarship.others' => 'nullable|boolean',
            'othersInput' => 'nullable|string|max:255',
            'age' => 'nullable|numeric',
        ]);


 $haveExistingScholarship = json_encode($request->have_existing_scholarship);

        $userData = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'id_number' => $request->id_number,
            'number_of_studying_siblings' => $request->number_of_studying_siblings,
            'house_hold_per_capita_income' => $request->house_hold_per_capita_income,
            'birthday' => $request->birthday,
            'have_existing_scholarship' => $haveExistingScholarship,
            'othersInput' => $request->othersInput,
            'age' => $request->age,
        ];


        $user = User::create($userData);

        // If you want to update an existing user, you can use the following code instead
        // $user = User::findOrFail($userId);
        // $user->update($userData);


        $user->addRole('user');

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
