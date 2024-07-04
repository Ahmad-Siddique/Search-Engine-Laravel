<?php

namespace App\Http\Controllers;

use App\Models\Search_History;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class AnalyticsController extends Controller
{
    public function index()
    {
        return view('analytics.index');
    }

    public function countryWise()
    {
        $data = Search_History::groupBy('countryName')
        ->select('countryName', DB::raw('count(*) as total'))
        ->orderBy('total', 'desc')
        ->get();

        return view('analytics.parts.country', compact('data'));
    }

    public function regionWise()
    {
        $data = Search_History::groupBy('regionName')
        ->select('regionName', DB::raw('count(*) as total'))
        ->orderBy('total', 'desc')
        ->get();

        return view('analytics.parts.region', compact('data'));
    }

    public function zipWise()
    {
        $data = Search_History::groupBy('zipCode')
        ->select('zipCode', DB::raw('count(*) as total'))
        ->orderBy('total', 'desc')
        ->get();

        return view('analytics.parts.zip', compact('data'));
    }

    public function timeSeries(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        $data = Search_History::whereBetween('created_at', [$startDate, $endDate])
            ->groupBy(DB::raw('Date(created_at)'))
            ->select(DB::raw('Date(created_at) as date'), DB::raw('count(*) as total'))
            ->orderBy('date')
            ->get();

        return view('analytics.parts.time', compact('data'));
    }

    public function ipAnalysis()
    {
        $data = Search_History::groupBy('ip')
            ->select('ip', DB::raw('count(*) as total'))
            ->having('total', '>', 1)
            ->orderBy('total', 'desc')
            ->get();

        return view('analytics.parts.ip', compact('data'));
    }
}
