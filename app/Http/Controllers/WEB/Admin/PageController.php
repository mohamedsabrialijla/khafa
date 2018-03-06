<?php

namespace App\Http\Controllers\WEB\Admin;

use App\Models\Language;
use App\Models\Page;
use App\Models\Setting;
use Cocur\Slugify\Slugify;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    public function __construct()
    {
        view()->share([
            'locales' => Language::all(),
            'setting' => Setting::query()->first(),
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::all();
        return view('admin.pages.home', ['pages' => $pages]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $locales = Language::all()->pluck('lang');
        $roles = [];
        foreach ($locales as $locale) {
            $roles['title_' . $locale] = 'required';
            $roles['description_' . $locale] = 'required';
            $roles['key_words_' . $locale] = 'required';
        }
        $request->validate($roles);
//        return $request->all();
        $image = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('images');
        }
        //return ['image' => $image, 'views' => 1];
//        return $locales;
        $page = Page::query()->create(['image' => $image, 'views' => 1]);
//        return $page;
        foreach ($locales as $locale) {
            $page->translateOrNew($locale)->title = ucwords($request->get('title_' . $locale));
//            echo $page->title . '<br/>';
            $slugify = new Slugify();
            $slug = $slugify->slugify($request->get('title_' . $locale));
            $page->translateOrNew($locale)->slug = $slug;
            $page->translateOrNew($locale)->description = $request->get('description_' . $locale);
            $page->translateOrNew($locale)->key_words = $request->get('key_words_' . $locale);
        }
        if ($page->save()) {
            return redirect()->back()->with('status', 'Page created successfully');
        }
        return redirect()->back()->withErrors('errors', ['Page not created']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page = Page::query()->findOrFail($id);
        return view('admin.pages.edit', ['page' => $page]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $page = Page::query()->findOrFail($id);
        $locales = Language::all()->pluck('lang');
        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('images');
            $page->image = $image;
        }
        foreach ($locales as $locale) {
            $page->translate($locale)->title = ucwords($request->get('title_' . $locale));
            $slugify = new Slugify();
            $slug = $slugify->slugify($request->get('title_' . $locale));
            $page->translate($locale)->slug = $slug;
            $page->translate($locale)->description = $request->get('description_' . $locale);
            $page->translate($locale)->key_words = $request->get('key_words_' . $locale);
        }
        if ($page->save()) {
            return redirect()->back()->with('status', 'Page updated successfully');
        }
        return redirect()->back()->withErrors('errors', ['Page not updated']);
    }

    public function destroy($id)
    {
        $page = Page::query()->findOrFail($id);
        if ($page->delete()) {
            return 'success';
        }
        return 'fail';
    }
}
