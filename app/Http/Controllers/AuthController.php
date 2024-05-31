<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    // Register
    public function register(Request $request)
    {
        // GET + POST

        if ($request->isMethod("post")) {

            $request->validate([
                "name" => "required|string",
                "email" => "required|email|unique:users",
                "password" => "required",
                "phone" => "required"

            ]);

            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'phone' => $request->phone,
            ]);

            // Redirect auto login to dashboard
            if (Auth::attempt([
                "email" => $request->email,
                "password" => $request->password

            ])) {

                return to_route('dashboard');
            } else {

                return to_route('register');
            }
        }
        return view("auth.register");
    }

    // Login
    public function login(Request $request)
    {
        // GET + POST
        if ($request->isMethod("post")) {

            $request->validate([
                "email" => "required|email",
                "password" => "required"
            ]);

            if (Auth::attempt([
                "email" => $request->email,
                "password" => $request->password
            ])) {

                return to_route("dashboard");
            } else {

                return to_route("login")->with("error", "invalid login details");
            }
        }
        return view("auth.login");
    }

    // Dashboard
    public function dashboard()
    {
        // AFTER LOGIN
        return view("dashboard");
    }

    // Profile
    public function profile(Request $request)
    {
        // AFTER LOGIN
        if ($request->isMethod("post")) {

            $request->validate([
                "name" => "required",
                "phone" => "required"

            ]);

            $id = auth()->user()->id; //Logged In userID

            $user = User::findOrFail($id);

            $user->name = $request->name;
            $user->phone = $request->phone;
            $user->save();

            return to_route("profile")->with("success", "Successfully, profile updated");
        }
        return view("profile");
    }

    // Logout
    public function logout()
    {
        // AFTER LOGIN
        Session::flush();

        Auth::logout();

        return to_route("login")->with("success", "Logged out successfully");
    }
}
