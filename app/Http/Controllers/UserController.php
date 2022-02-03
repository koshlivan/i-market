<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /*
     * @param Request $request
     *
     * @return Response
     * */
    public function index(Request $request)
    {
        if ( isset($request->permission) )
        {
            return Auth::user()->is_admin;
        }
        return Auth::user();
    }
    /*
     * @param Request $request
     *
     * @return Response
     *
     */
    public function store(Request $request) {
        $request->validate([
           'name' => ['required'],
           'email' => ['required', 'email'],
           'password' => ['required', 'min:3']
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $user->save();
        return $user;
    }

    /*
     * @param Request $request
     *
     * @return Response
     */
    public function login(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'password' => ['required']
        ]);

        if (Auth::attempt($request->only('name', 'password'))) {
            return response()->json(Auth::user(), 200);
        }
        throw ValidationException::withMessages([
           'name' => ['Such login does not exist'],
            'password' => ['Password is incorrect']
        ]);
    }


    public function destroy(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return response('Logged out', 200);
    }

}
