<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShortUrlRequest;
use App\Models\ShortUrl;
use Illuminate\Support\Str;

class ShortUrlController extends Controller
{
    public function index()
    {
        return view('short-url.index');
    }
    public function store(ShortUrlRequest $request)
    {
        if ($request->original_url) {

            if (auth()->check()) {
                $new_url = auth()->user()->links()->create(['original_url' => $request->original_url]);
            } else {
                $new_url = ShortUrl::create([
                    'original_url' => $request->original_url,
                ]);
            }
            if ($new_url) {
                $short_url = base_convert(Str::uuid(), 10, 36);
                $new_url->update([
                    'short_url' => $short_url,
                ]);
                return back()->with(
                    'success',
                    'Successfully. Your short URL &nbsp; <a class="text-indigo-700" href="' . url($short_url) . '">' . url($short_url) . "</a>"
                );
            }
        }
        return back()->with('error', 'Something went wrong');
    }
    public function show($code)
    {
        $url = ShortUrl::where('short_url', $code)->first();
        if ($url) {
            // $url->update([
            //     'clicks' => $url->clicks + 1,
            // ]);
            $url->increment('visits');
            return redirect($url->original_url);
        }
        return back()->with('error', 'Invalid short url');
    }
}
