<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function userttd($id)
    {
        $user = User::findOrFail($id);

        if ($user->ttd == NULL) {
            abort(404);
        }

        $ttd = Storage::get($user->ttd);
        if ($ttd == NULL) {
            abort(404);
        }
        $contentType = Storage::mimeType($user->ttd);

        $response = new Response($ttd, 200);
        $response->header('Content-Type', $contentType);

        return $response;
    }
}
