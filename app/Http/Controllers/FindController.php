<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;

class FindController extends Controller
{
    public function search(Request $request, $search)
    {
        $items = [];
        $query = "https://www.tokopedia.com/search?q=".$search;
        // calling external api in laravel 9 // simulate http request like browser
        $response = Http::withHeaders([
            'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36',
            'Accept' => 'text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8',
            'Accept-Language' => 'en-US,en;q=0.5',
            'Referer' => 'https://example.com/', // If simulating a specific referrer
            'Cookie' => 'session_id=abc; csrf_token=xyz', // If simulating specific cookies
        ])->get($query);
        $html = $response->body();

        // $pattern = '/<script[^>]*>window\.__cache=(.*?);<\/script>/s';
        $patternList = '/"products":(.*?),"__typename"/s';
        $matches = [];
        if (!preg_match($patternList, $html, $matches)) {
            // If the script tag is not found, return an empty array.
            $items = [];
        }

        $jsonStringList = $matches[1];
        $listProduct = json_decode($jsonStringList, true);

        $patternData = '/window\.__cache=(.*?);/s';
        $matches = [];
        if (!preg_match($patternData, $html, $matches)) {
            // If the script tag is not found, return an empty array.
            $items = [];
        }
        $jsonStringData = $matches[1];
        $detailProduct = json_decode($jsonStringData, true);

        // $filename = 'json.txt';
        // Storage::disk('local')->put($filename, $jsonString);

        foreach ($listProduct as $key => $value) {
            $tmpDetail = $detailProduct[$value["id"]];
            $detailImage = $detailProduct["$".$value["id"].".mediaURL"];
            $detailPrice = $detailProduct["$".$value["id"].".price"];
            $tmp = new \stdClass();
            $tmp->id = $tmpDetail["id"];
            $tmp->name = $tmpDetail["name"];
            $tmp->url = $tmpDetail["url"];
            $tmp->image = $detailImage["image"];
            $tmp->image300 = $detailImage["image300"];
            $tmp->priceNumber = $detailPrice["number"];
            $tmp->priceText = $detailPrice["text"];
            // add unique id in those url to mkae it affiliate
            $items[] = $tmp;
        }
        // $ret = Category::findOrFail($id);
        // $items = Items::where('',$search);

        // $retmenu = DB::table('menus')->where('user_id',$id)->get();
        return view('find', [
            'search' => $search,
            'items' => $items
        ]);
    }

}
