<?php

namespace App\Http\Controllers\Back;

use App\Http\Requests\PageRequest;
use App\Http\Requests\PostRequest;
use App\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    public function index()
    {
        $pages = Page::get();
        return view('back.pages.index', ['pages' => $pages]);
    }

    public function create()
    {
        $page = new Page();

        $page->published_at = now();
        return view('back.pages.create', ['page' => $page]);
    }

    public function store(PageRequest $request)
    {
        $page = (new Page())->addPage($request->validated());
        flash()->success('Page saved');

        return redirect()->action('Back\PageController@edit', $page->id);
    }

    public function edit(Page $page)
    {
        return view('back.pages.edit', compact('page'));
    }

    /**
     * @param PageRequest $request
     * @param Page $page
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(PageRequest $request, Page $page)
    {
        $page->update($request->validated());

        flash()->success('Page updated');

        return redirect()->action('Back\PageController@edit', $page->id);
    }

    public function destroy(Page $page)
    {
        $page->delete();

        flash()->success('The page has been deleted.');

        return redirect()->action('Back\PageController@index');
    }

}
