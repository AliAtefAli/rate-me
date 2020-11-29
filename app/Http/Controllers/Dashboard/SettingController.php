<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\SiteRequest;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function edit()
    {
        $site = Setting::first();

        return view('dashboard.site.edit', compact('site'));
    }

    public function update(SiteRequest $request)
    {
        dd($request->all());
    }
}
