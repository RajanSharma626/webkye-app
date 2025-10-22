<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WebsiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class WebsiteSettingController extends Controller
{
    public function index()
    {
        // Always get the first record or create a new one if none exists
        $setting = WebsiteSetting::first() ?? new WebsiteSetting();
        return view('admin.website-settings.index', compact('setting'));
    }

    public function update(Request $request)
    {
        $setting = WebsiteSetting::first();
        if (!$setting) {
            $setting = new WebsiteSetting();
        }

        $setting->site_name = $request->site_name;
        $setting->contact_phone = $request->contact_phone;
        $setting->contact_email = $request->contact_email;
        $setting->location_url = $request->location_url;
        $setting->facebook_url = $request->facebook_url;
        $setting->linkedin_url = $request->linkedin_url;
        $setting->instagram_url = $request->instagram_url;
        $setting->address = $request->address;
        $setting->meta_title = $request->meta_title;
        $setting->meta_description = $request->meta_description;
        $setting->meta_keywords = $request->meta_keywords;

        // Handle logo upload
        if ($request->hasFile('logo')) {
            if ($setting->logo && File::exists(public_path($setting->logo))) {
                File::delete(public_path($setting->logo));
            }
            $logo = $request->file('logo');
            $logoName = time() . '_logo.' . $logo->getClientOriginalExtension();
            $logo->move(public_path('uploads/settings'), $logoName);
            $setting->logo = 'uploads/settings/' . $logoName;
        }

        // Handle footer logo upload
        if ($request->hasFile('footer_logo')) {
            if ($setting->footer_logo && File::exists(public_path($setting->footer_logo))) {
                File::delete(public_path($setting->footer_logo));
            }
            $footerLogo = $request->file('footer_logo');
            $footerLogoName = time() . '_footer_logo.' . $footerLogo->getClientOriginalExtension();
            $footerLogo->move(public_path('uploads/settings'), $footerLogoName);
            $setting->footer_logo = 'uploads/settings/' . $footerLogoName;
        }

        // Handle favicon upload
        if ($request->hasFile('favicon')) {
            if ($setting->favicon && File::exists(public_path($setting->favicon))) {
                File::delete(public_path($setting->favicon));
            }
            $favicon = $request->file('favicon');
            $faviconName = time() . '_favicon.' . $favicon->getClientOriginalExtension();
            $favicon->move(public_path('uploads/settings'), $faviconName);
            $setting->favicon = 'uploads/settings/' . $faviconName;
        }

        // Handle OG image upload
        if ($request->hasFile('og_image')) {
            if ($setting->og_image && File::exists(public_path($setting->og_image))) {
                File::delete(public_path($setting->og_image));
            }
            $ogImage = $request->file('og_image');
            $ogImageName = time() . '_og_image.' . $ogImage->getClientOriginalExtension();
            $ogImage->move(public_path('uploads/settings'), $ogImageName);
            $setting->og_image = 'uploads/settings/' . $ogImageName;
        }

        $setting->save();

        return redirect()->back()->with('success', 'Website settings updated successfully!');
    }
}