<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AttachmentController extends Controller
{

    /**
     * @param Request $request
     * @return false|string
     */
    public function store(Request $request)
    {
        return $request->file('image')->store('images', 'public');
    }
}
