<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Tuupola\Base62;
use Illuminate\Http\Request;

class LinkController extends Controller
{
    public function create()
    {
        return view('link.create');
    }

    public function store(Request $request, Base62 $base62)
    {
        $validated = $request->validate([
            'link' => 'required|url'
        ]);

        $link = Link::create([
            'destination' => $validated['link'],
            'user_id' => $request->user()?->id
        ]);

        $link->short_code = $base62->encode($link->id);
        $link->save();

        return view('link.create', [
            'short_link' => url($link->short_code),
            'full_link' => $link->destination
        ]);
    }

    public function redirect($code)
    {
        $link = Link::where('short_code', $code)->first();

        if (empty($link)) {
            return abort(404);
        }

        $link->visits_count += 1;
        $link->save();

        return redirect()->away($link->destination);
    }
}
