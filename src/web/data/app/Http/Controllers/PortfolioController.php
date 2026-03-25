<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;

class PortfolioController extends Controller
{
    public function index()
    {
        $portfolios = Portfolio::active()->ordered()->get();

        return view('portfolio', compact('portfolios'));
    }

    public function show(?Portfolio $portfolio = null)
    {
        if (!$portfolio) {
            return view('portfolio-details');
        }

        return view('portfolio-details', compact('portfolio'));
    }
}
