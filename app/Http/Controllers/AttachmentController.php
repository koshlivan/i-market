<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AttachmentController extends Controller
{
    public function store(Request $request)
    {
        return $request->file('image')->store('images', 'public');
    }
}
