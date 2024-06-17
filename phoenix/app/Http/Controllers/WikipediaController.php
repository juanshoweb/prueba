<?php

namespace App\Http\Controllers;

use App\Models\SearchHistory;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class WikipediaController extends Controller
{
    public function index(){
        $searchHistories = SearchHistory::latest()->take(10)->get();

        return view('wikipedia.index', compact('searchHistories'));
    }

    public function search(Request $request){
        $query = $request->input('query');

         // Separar la consulta en palabras clave
        $keywords = explode(' ', $query);

        // Guardar cada palabra clave en el historial
        foreach ($keywords as $keyword) {
            if (!empty($keyword)) {
                SearchHistory::create(['query' => $keyword]);
            }
        }

        $client = new Client([
            'base_uri' => 'https://en.wikipedia.org/api/rest_v1/',
            'timeout'  => 2.0,
        ]);

        $response = $client->request('GET', "page/summary/{$query}");

        $result = json_decode($response->getBody()->getContents(), true);

        return response()->json($result);
    }

    public function searchHistory(){
        
        $searchHistories = SearchHistory::latest()->paginate(10);

        return view('wikipedia.search_history', compact('searchHistories'));
    }

 
}
