<?php

namespace App\Http\Controllers;

use App\Models\OrganizationSetting;
use Illuminate\Http\Request;

class OrganizationSettingController extends Controller
{
    // Show current organization settings
    public function index()
    {
        $setting = OrganizationSetting::first(); // always one record
        return view('organization_settings.index', compact('setting'));
    }

    // Show create form
    public function create()
    {
        // prevent duplicate settings
        if (OrganizationSetting::exists()) {
            return redirect()->route('organization_settings.index')->with('error', 'Settings already exist.');
        }

        return view('organization_settings.create');
    }

    // Store settings
    public function store(Request $request)
    {
        $data = $request->validate([
            'organization_name' => 'required|string|max:255',
            'slogan' => 'nullable|string|max:255',
            'address' => 'nullable|string',
            'email' => 'nullable|email|max:100',
            'phone' => 'nullable|string|max:50',
            'website' => 'nullable|string|max:100',
            'established_year' => 'nullable|digits:4',
            'owner_name' => 'nullable|string|max:100',
            'trade_license' => 'nullable|string|max:100',
            'vat_number' => 'nullable|string|max:100',
            'facebook_link' => 'nullable|url',
            'twitter_link' => 'nullable|url',
            'youtube_link' => 'nullable|url',
            'linkedin_link' => 'nullable|url',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'favicon' => 'nullable|image|mimes:ico,png|max:1024',
        ]);

        // Handle logo upload
        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('logos', 'public');
        }

        // Handle favicon upload
        if ($request->hasFile('favicon')) {
            $data['favicon'] = $request->file('favicon')->store('favicons', 'public');
        }

        OrganizationSetting::create($data);

        return redirect()->route('organization_settings.index')->with('success', 'Organization settings saved successfully.');
    }

    // Show edit form
    public function edit(OrganizationSetting $organization_setting)
    {
        //   dd($organization_setting);
        return view('organization_settings.edit', compact('organization_setting'));
    }

    // Update settings
    public function update(Request $request, OrganizationSetting $organization_setting)
    {
        $data = $request->validate([
            'organization_name' => 'required|string|max:255',
            'slogan' => 'nullable|string|max:255',
            'address' => 'nullable|string',
            'email' => 'nullable|email|max:100',
            'phone' => 'nullable|string|max:50',
            'website' => 'nullable|string|max:100',
            'established_year' => 'nullable|digits:4',
            'owner_name' => 'nullable|string|max:100',
            'trade_license' => 'nullable|string|max:100',
            'vat_number' => 'nullable|string|max:100',
            'facebook_link' => 'nullable|url',
            'twitter_link' => 'nullable|url',
            'youtube_link' => 'nullable|url',
            'linkedin_link' => 'nullable|url',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'favicon' => 'nullable|image|mimes:ico,png|max:1024',
        ]);

        // Handle new logo
        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('logos', 'public');
        }

        // Handle new favicon
        if ($request->hasFile('favicon')) {
            $data['favicon'] = $request->file('favicon')->store('favicons', 'public');
        }

 
        $organization_setting->update($data);
      


        return redirect()->route('organization_settings.index')->with('success', 'Organization settings updated successfully.');
    }

    // Optional delete
    public function destroy(OrganizationSetting $organization_setting)
    {
        $organization_setting->delete();
        return redirect()->route('organization_settings.index')->with('success', 'Organization settings deleted.');
    }
}
