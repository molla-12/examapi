<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreWebsiteRequest;
use App\Http\Requests\UpdateWebsiteRequest;
use App\Models\Website;

class WebsiteController extends Controller
{
    public function index()
    {
        $websites = Website::all();

        return response()->json($websites);
    }

    public function show(website $website)
    {
        $website = Website::findOrFail($website->id);

        return response()->json($website);
    }

    public function store(StoreWebsiteRequest $storeWebsiteRequest)
    {
        $website = Website::create($storeWebsiteRequest->validated());

        return response()->json($website, 201);
    }

    public function update(UpdateWebsiteRequest $updateWebsiteRequest, Website $website)
    {
        $website = Website::findOrFail($website->id);
        $website->update($updateWebsiteRequest->validated());

        return response()->json($website);
    }

    public function destroy(Website $website)
    {
        $website = Website::findOrFail($website->id);
        $website->delete();

        return response()->json(null, 204);
    }
}
