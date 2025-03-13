<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class PriceCheckService
{
    /**
     * @param $url
     * @return mixed|null
     */
    public static function getPrice($url)
    {
        $html = Http::get($url)->body();
        preg_match('/"price":\s*(\d+)/', $html, $matches);

        return $matches[1] ?? null;
    }
}
