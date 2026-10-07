<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SchoolSetting;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index()
    {
        $settings = SchoolSetting::all();
        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $inputs = $request->except(['_token']);
        foreach ($inputs as $key => $value) {
            SchoolSetting::updateOrCreate(
                ['key' => $key],
                ['value_en' => $value]
            );
        }

        return back()->with('success', 'School settings saved successfully.');
    }
}
