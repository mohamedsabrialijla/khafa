<?php

namespace App\Http\Controllers\WEB\User;

use App\Models\Category;
use App\Models\Language;
use App\Models\Page;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    public function __construct()
    {
        view()->share([
            'setting' => Setting::query()->first(),
        ]);
    }

    public function contactUs()
    {
        return view('contact');
    }

    public function aboutUs()
    {
        $page = Page::query()->whereTranslation('slug', 'about-us')->first();
        // return $page;
        return view('page', ['page' => $page]);
    }

    public function termsOfUse()
    {
        $page = Page::query()->whereTranslation('slug', 'terms-of-use')->first();
        return view('page', ['page' => $page]);
    }

    public function privacyPolicy()
    {
        $page = Page::query()->whereTranslation('slug', 'privacy-policy')->first();
        return view('page', ['page' => $page]);
    }
}
