<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\LinkRequest;
use App\Models\Link;
use Illuminate\Support\Str;


class LinkController extends Controller
{
    public function __invoke(LinkRequest $request)
    {
        $old_link = $request->validated();
        $hash = Str::random(6);
        $url = Link::where('old_link', $old_link)->first();

        if ($url) {
            return response()->json(['url' => route('new_url', ['shortLink' => $url->new_link])], 200);
        } else {
            $data = Link::firstOrNew([
                'old_link' => $old_link['url'],
                'new_link' => $hash
            ]);
            $data->save();
            if ($data->id) {
                return response()->json(['url' => route('new_url', ['shortLink' => $hash])], 200);
            } else {
                return response()->json(['message' => 'Error creating new URL'], 500);
            }
        }
    }
}
