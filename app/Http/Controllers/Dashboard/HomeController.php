<?php

namespace App\Http\Controllers\Dashboard;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Vehicule;

class HomeController extends Controller
{
    public function index()
    {
        $currentWeekStart = Carbon::now()->startOfWeek();
        $currentWeekEnd = Carbon::now()->endOfWeek();

        $lastWeekStart = $currentWeekStart->copy()->subWeek();
        $lastWeekEnd = $currentWeekEnd->copy()->subWeek();

        $vehiculesThisWeek = Vehicule::query()
            ->whereBetween('created_at', [$currentWeekStart->startOfDay(), $currentWeekEnd->endOfDay()])
            ->count();

        $vehiculesLastWeek = Vehicule::query()
            ->whereBetween('created_at', [$lastWeekStart->startOfDay(), $lastWeekEnd->endOfDay()])
            ->count();

        $evolutionPercentage = $vehiculesLastWeek > 0
            ? (($vehiculesThisWeek - $vehiculesLastWeek) / $vehiculesLastWeek) * 100
            : ($vehiculesThisWeek > 0 ? 100 : 0);

        return view('pages.welcome', compact('vehiculesThisWeek', 'evolutionPercentage'));
    }

    public function getNbreByDayOnNowWeek($date = null)
    {
        $startDateWeekNow = $date ? Carbon::parse($date)->startOfWeek() : Carbon::now()->startOfWeek();
        $endDateWeekNow = $date ? Carbon::parse($date)->endOfWeek() : Carbon::now()->endOfWeek();

        $datesOfWeek = collect();
        $date = $startDateWeekNow->copy();

        while ($date->lte($endDateWeekNow)) {
            $datesOfWeek->put($date->toDateString(), 0);
            $date->addDay();
        }

        $vehiculesNowWeek = Vehicule::query()
            ->whereBetween('created_at', [$startDateWeekNow->startOfDay(), $endDateWeekNow->endOfDay()])
            ->get();

        foreach ($vehiculesNowWeek as $vehicule) {
            $dateKey = $vehicule->created_at->toDateString();
            $datesOfWeek[$dateKey] += 1;
        }

        return $datesOfWeek->values()->toArray();
    }

    public function getNbreByDayLastWeek($date = null)
    {
        $startDateWeekPast = $date ? Carbon::parse($date)->subWeek()->startOfWeek() : Carbon::now()->subWeek()->startOfWeek();
        $endDateWeekPast = $date ? Carbon::parse($date)->subWeek()->endOfWeek() : Carbon::now()->subWeek()->endOfWeek();

        $datesOfWeek = collect();
        $date = $startDateWeekPast->copy();

        while ($date->lte($endDateWeekPast)) {
            $datesOfWeek->put($date->toDateString(), 0);
            $date->addDay();
        }

        $transactionsLastWeek = Vehicule::query()
            ->whereBetween('created_at', [$startDateWeekPast, $endDateWeekPast])
            ->get();

        foreach ($transactionsLastWeek as $transaction) {
            $dateKey = $transaction->created_at->toDateString();
            $datesOfWeek[$dateKey] += 1;
        }

        return $datesOfWeek->values()->toArray();
    }

    public function getHighestNbreByDayOnTwoWeeks($date = null)
    {
        $nbreParJourNowWeek = collect($this->getNbreByDayOnNowWeek($date));
        $nbreParJourPastWeek = collect($this->getNbreByDayLastWeek($date));

        $nbreParJour = $nbreParJourNowWeek->merge($nbreParJourPastWeek);

        $maxNbre = $nbreParJour->max();

        $maxNbreAdjusted = $maxNbre * 1.25;

        return $maxNbreAdjusted;
    }

    public function getNbreVehiculeOnTwoWeek()
    {
        try {
            $nbreParJourNowWeek = $this->getNbreByDayOnNowWeek();
            $nbreParJourPastWeek = $this->getNbreByDayLastWeek();
            $maxNbre = $this->getHighestNbreByDayOnTwoWeeks();

            return response()->json([
                'nbreParJourNowWeek' => $nbreParJourNowWeek,
                'nbreParJourPastWeek' => $nbreParJourPastWeek,
                'maxNbre' => $maxNbre,
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
