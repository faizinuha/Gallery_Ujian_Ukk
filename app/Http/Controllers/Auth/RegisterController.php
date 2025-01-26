<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    // Show the registration form
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    // Handle the registration request
    public function register(Request $request)
    {
        // Validate the input data
        $validator = Validator::make($request->all(), [
            'username' => 'required|unique:users,username|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:2|confirmed',
            'namalengkap' => 'required|max:255',
            'alamat' => 'nullable|string',
        ]);

        // Check if the validation fails
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Creating the user if validation passes
        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'namalengkap' => $request->namalengkap,
            'alamat' => $request->alamat,
        ]);

        // Log the user in immediately after registration
        Auth::login($user);

        // Redirect to the desired page
        return redirect()->route('dashboard');  // Change 'dashboard' to your preferred route
    }
}
