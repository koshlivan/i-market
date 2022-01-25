<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AttachmentController extends Controller
{
    public function store(StoreAttachmentRequest $request)
    {
        $attachment = new Attachment;
        $attachment->name = $request->name;
        $attachment->path = $attachment->upload($request->attachment);

        $attachment->save();

        return response()->json([
            'message' => 'Image uploaded.',
        ]);
    }
}
