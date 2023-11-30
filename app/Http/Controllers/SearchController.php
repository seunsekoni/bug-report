<?php

namespace App\Http\Controllers;

use App\Models\Business;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    /**
     * Perform a wide-search across business or listing.
     *
     * @param SearchRequest $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function __invoke(Request $request)
    {
        $keyword = $request->input('keyword');
        $result = Business::search($keyword);

        // Result is empty. It works fine whenever I query meilisearch directly via postman
        // Sometimes it works if keyword are just 2 characters, sometimes it doesn't. I don't know why.

        return response()->json([
            'data' => $result->get(),
        ]);
    }
}
