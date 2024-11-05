<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AiController extends Controller
{
    public function index(Request $request)
    {
        $prompt = $request->input('prompt');
        // dd(env('VITE_APP_API_KEY'));

        // $response = Http::withHeaders([
        //     'Content-Type' => 'application/json',
        // ])->post('https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-flash-latest:generateContent', [
        //     'contents' => [
        //         [
        //             'parts' => [
        //                 [
        //                     'text' => $prompt,
        //                 ],
        //             ],
        //         ],
        //     ],
        // ])->withQueryParams([
        //     'key' => env('VITE_APP_API_KEY'),
        // ]);
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
        ])->post('https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-flash-latest:generateContent?key=' . env('VITE_APP_API_KEY'), [
            'contents' => [
                [
                    'parts' => [
                        [
                            'text' => $prompt,
                        ],
                    ],
                ],
            ],
        ]);

        if ($response->successful()) {
            $content = $response->json('candidates.0.content.parts.0.text');
            return response()->json(['content' => $content]);
        } else {
            return response()->json(['error' => $response->json('error')], $response->status());
        }
    }
}
