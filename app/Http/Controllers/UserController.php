<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    /*
     * @param Request $request
     *
     * @return Response
     *
     */
    public function store(Request $request) {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = md5($request->password);

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
        $user = User::query()->where('name', $request->name)->get();
        if ($user != null && $user->password === md5($request->password)) {
            return $user;
        } else {
            return response('Login or password is wrong', 404);
        }
    }
}
