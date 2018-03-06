<?php

namespace App\Http\Controllers\WEB\Admin;

use App\Http\Controllers\Controller;
use App\Models\Language;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    private $locales = '';

    public function __construct()
    {
        $this->locales = Language::all();
        view()->share([
            'locales' => $this->locales,
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $locales = Language::all();
        $setting = Setting::query()->first();
        return view('admin.settings.edit', ['setting' => $setting,'locales'=>$locales]);
    }

    public function update(Request $request)
    {
        $locales = Language::all()->pluck('lang');
        $roles = [
            'url' => 'required',
//            'logo' => 'required',
            'admin_email' => 'required|email',
            'info_email' => 'required|email',
            'app_store_url' => 'required|url',
            'play_store_url' => 'required|url',
            'mobile' => 'required',
//            'phone' => 'required',
            'facebook' => 'required|url',
            'twitter' => 'required|url',
//            'google_plus' => 'required|url',
            'linked_in' => 'required|url',
//            'instagram' => 'required|url',
//            'pinterest' => 'required|url',
            'note' => 'required',
        ];
        foreach ($locales as $locale) {
            $roles['title_' . $locale] = 'required';
            $roles['address_' . $locale] = 'required';
            $roles['key_words_' . $locale] = 'required';
            $roles['description_' . $locale] = 'required';
        }
        $this->validate($request, $roles);
        $setting = Setting::query()->findOrFail(1);
        $setting->url = trim($request->get('url'));
        $setting->admin_email = trim($request->get('admin_email'));
        $setting->info_email = trim($request->get('info_email'));
        $setting->app_store_url = trim($request->get('app_store_url'));
        $setting->play_store_url = trim($request->get('play_store_url'));
        $setting->mobile = trim($request->get('mobile'));
        $setting->phone = trim($request->get('phone'));
        $setting->facebook = trim($request->get('facebook'));
        $setting->twitter = trim($request->get('twitter'));
        $setting->google_plus = trim($request->get('google_plus'));
        $setting->linked_in = trim($request->get('linked_in'));
        $setting->instagram = trim($request->get('instagram'));
        $setting->pinterest = trim($request->get('pinterest'));
        $setting->note = trim($request->get('note'));
        $setting->attitude = $request->get('attitude');
        $setting->longitude = $request->get('longitude');
        if ($request->hasFile('logo')) {
            $setting->logo = $request->file('logo')->store('front_end_assets/image');
        }
        $setting->save();

        foreach ($locales as $locale) {
            $setting->translate($locale)->title = trim(ucwords($request->get('title_' . $locale)));
            $setting->translate($locale)->address = trim(ucwords($request->get('address_' . $locale)));
            $setting->translate($locale)->key_words = trim(ucwords($request->get('key_words_' . $locale)));
            $setting->translate($locale)->description = ucwords($request->get('description_' . $locale));
        }

        $setting->save();
        return redirect()->back()->with('status', 'setting updated successfully');
    }
}
