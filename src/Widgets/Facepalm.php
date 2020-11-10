<?php

namespace Sortarad\Facepalm\Widgets;

use Statamic\Widgets\Widget;
use Facades\GuzzleHttp\Client as Guzzle;
use GuzzleHttp\Exception\RequestException;
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
        $joke = $this->getJoke();

        return view('sortarad::widgets.facepalm', ['joke' => $joke]);
    }

    /**
     * Get a random dad joke.
     *
     * @return array
     */
    protected function getJoke()
    {
        return Cache::rememberWithExpiration('sortarad-facepalm', function() {
            try {
                $response = Guzzle::request('GET', 'https://icanhazdadjoke.com/', [
                    'headers' => [
                        'Accept'     => 'application/json',
                    ]
                ]);

                $json = json_decode($response->getBody(), true);

                return [1 => $json];
            } catch(RequestException $e) {
                return [1 => null];
            }
        });
    }
}
