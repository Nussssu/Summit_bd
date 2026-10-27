<?php

namespace App\Http\Controllers;

use App\Support\SampleHomeContent;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class PageController extends Controller
{
    public function home(): Response
    {
        return Inertia::render('Home', ['content' => SampleHomeContent::get()]);
    }

    public function planned(Request $request): Response
    {
        $page = config('summit.planned_pages')['/'.$request->route()->uri()];

        return Inertia::render('Planned', ['page' => $page]);
    }
}
