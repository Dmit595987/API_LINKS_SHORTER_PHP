<?php

namespace App\Http\Controllers;


use App\Models\Link;


class RedirectController extends Controller
{
    public function __invoke($shortLink)
    {
        $url = Link::where('new_link', $shortLink)->first();
        if (!$url) {
            abort(404);
        }
        return redirect($url->old_Link);
    }
}
