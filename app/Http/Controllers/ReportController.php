<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ReportController extends Controller
{
    public function weekly_averages()
    {//need to update this tomorrow;
        $values = DB::table('posts')
            ->selectRaw("DATE_FORMAT(date, '%Y-%U') AS week")
            ->selectRaw('SUM(distance) AS total_distance')
            ->selectRaw('SUM(time_minutes) AS total_time')
            ->selectRaw('COUNT(*) AS entry_count')
            ->where('user_id', auth()->user()->id)
            ->groupBy('week')
            ->orderBy('week', 'ASC')
            ->get();

        $weekly_totals = $values->map(function ($entry) {
            return [
                'week' => $entry->week,
                'total_distance' => $entry->total_distance / $entry->entry_count,
                'total_time' => $entry->total_time / $entry->entry_count,
            ];
        });

        return view('reports.weekly_averages', ['weekly_totals' => $weekly_totals]);
    }
}
