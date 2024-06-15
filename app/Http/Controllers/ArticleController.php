<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ArticleController extends Controller
{
    public function index()
    {
        $url = "https://timesofindia.indiatimes.com/rssfeeds/-2128838597.cms?feedtype=json";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36');
        curl_setopt($ch, CURLOPT_DNS_CACHE_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);

        $response = curl_exec($ch);

        if ($response === false) {
            $error = curl_error($ch);
            curl_close($ch);
            return response()->json(['error' => "cURL Error: $error"], 500);
        } else {
            $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            if ($http_status !== 200) {
                curl_close($ch);
                return response()->json(['error' => "HTTP Status: $http_status"], 500);
            }

            $data = json_decode($response, true);
            curl_close($ch);

            // Log the response for debugging
            Log::info('API Response: ', $data);

            if (isset($data['channel']['item'])) {
                $articles = $data['channel']['item'];
            } else {
                $articles = [];
            }

            // Log the articles array for debugging
            Log::info('Articles: ', $articles);

            return view('articles.index', compact('articles'));
        }
    }
}
