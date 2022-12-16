<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Tuupola\Base62;
use Illuminate\Http\Request;

class LinkController extends Controller
{
    public function __construct(private Base62 $base62)
    {
    }

    public function create()
    {
        return view('link.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'link' => 'required|url'
        ]);

        $link = Link::create([
            'destination' => $validated['link'],
            'user_id' => $request->user()?->id
        ]);

        $link->short_code = $this->base62->encode($link->id);
        $link->save();

        return redirect()->route('create')->with([
            'short_link' => url($link->short_code),
            'full_link' => $link->destination
        ]);
    }

    public function delete(Request $request)
    {
        Link::destroy($request->input('id'));

        return redirect('/profile');
    }

    public function redirect($code)
    {
        $link = Link::where('short_code', $code)->first();

        if (empty($link)) {
            return abort(404);
        }

        $link->increment('visit_count');

        return redirect()->away($link->destination);
    }
}
