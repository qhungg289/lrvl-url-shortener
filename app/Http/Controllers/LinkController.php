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
            'link' => ['required', 'url', 'max:255'],
            'custom_path' => ['nullable', 'max:255', 'unique:links,short_code', 'regex:/^[^\/\\\[\]{}!@#$%^&*()=+~`<>,;:"\'|?\s]+$/']
        ]);

        $link = Link::create([
            'destination' => $validated['link'],
            'user_id' => $request->user()?->id
        ]);

        if ($validated['custom_path']) {
            $link->short_code = $validated['custom_path'];
        } else {
            $link->short_code = $this->base62->encode($link->id);
        }

        $link->save();

        return redirect()->route('create')->with([
            'short_link' => url($link->short_code),
            'full_link' => $link->destination
        ]);
    }

    public function delete(Request $request)
    {
        $link = Link::find($request->input('id'));

        if ($request->user()->cannot('delete', $link)) {
            abort(403);
        }

        $link->delete();

        return redirect('/profile');
    }

    public function redirect($code)
    {
        $link = Link::where('short_code', $code)->first();

        if (empty($link)) {
            abort(404);
        }

        $link->increment('visit_count');

        return redirect()->away($link->destination);
    }
}
