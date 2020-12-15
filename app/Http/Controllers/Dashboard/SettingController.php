<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\SiteRequest;
use App\Models\Setting;
use App\Traits\Uploadable;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    use Uploadable;

    public function edit()
    {
        $site = Setting::first();

        return view('dashboard.site.edit', compact('site'));
    }

    public function update(SiteRequest $request, Setting $setting)
    {
        $data = $request->validated();

        if ($request->has('logo')) {
            if (file_exists(public_path('assets/uploads/site/' . $setting->logo))) {
                unlink(public_path('assets/uploads/site/' . $setting->logo));
            }
            $path = $this->uploadOne($request['logo'], 'site', null, null);
            $setting->logo = $path;
            $setting->save();
        }

        $updated = $setting->update($request->all());

        if ($updated) {
            session()->flash('success', trans('dashboard.setting.updated successfully'));
        } else {
            session()->flash('success', trans('dashboard.setting.error updated'));
        }

        return back();
    }
}
