<?php

namespace Sortarad\Facepalm\Widgets;

use Statamic\Widgets\Widget;
use Facades\GuzzleHttp\Client as Guzzle;
use Illuminate\Support\Facades\Cache;

class Facepalm extends Widget
{
    /**
     * The HTML that should be shown in the widget.
     *
     * @return string|\Illuminate\View\View
     */
    public function html()
    {
        $joke = Cache::rememberWithExpiration('facepalm', function() {
            $response = Guzzle::request('GET', 'https://icanhazdadjoke.com/', [
                'headers' => [
                    'Accept'     => 'application/json',
                ]
            ]);
            $json = json_decode($response->getBody(), true);

            // Cache for one minute;
            return [1 => $json];
        });

        return view('sortarad::widgets.facepalm', ['joke' => $joke]);
    }
}
