<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class WeeklyService
{
    public function weekly_speed()
    {
        if (Auth::check()) {
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
            return $weekly_totals;
        }
        return [];
    }
}
