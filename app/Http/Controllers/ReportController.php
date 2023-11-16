<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Services\WeeklyService;


class ReportController extends Controller
{
    public function weekly_averages()
    {
        $weekly_totals = (new WeeklyService)->weekly_speed();
        return view('reports.weekly_averages', ['weekly_totals' => $weekly_totals]);
    }
}
