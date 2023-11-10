<?php

namespace App\Twill\Capsules\Refrescos\Charts; 

use Manifiesto\Promotions\Charts\Chart;
use Manifiesto\Dashboard\ChartableInterface;
use Carbon\CarbonPeriod;

class RefrescoRecurringParticipantChart extends Chart implements ChartableInterface
{
    protected $promotionName = 'refrescos'; 

    protected $moduleNames = [
        'participation',
        'participant'
    ];

   public function getSeries($range, $scopes = [])
    {
        return $this->getSeriesyPeriod($range, $scopes);
    }

    private function getSeriesyPeriod($range, $scopes)
    {
        $period = CarbonPeriod::create($range[0], $range[1]);
        foreach ($period as $date) {
            $dateIndex = $date->format('Y-m-d');
            $scopes['dateRange'] = [$date,$date];
            $participations = $this->repositories['participation']->get([], $scopes, [], -1);

            $totalRecurringParticipantsOfParticipations = $this->countRecurringParticipantsOfParticipations($participations);
            $totalRecurringParticipantsParticipationsByDate = $this->countRecurringParticipantsParticipationsByDate($participations, $date);
            $total = $totalRecurringParticipantsOfParticipations + $totalRecurringParticipantsParticipationsByDate;

            $series[] = [
                'count' => 0,
                'date' => $dateIndex
            ];
        }

        return $series;
    }

    private function countRecurringParticipantsOfParticipations($participations)
    {
        $participantIds = $participations->pluck('participant_id');
        $recurringParticipantIds = $participantIds->duplicates();
        $uniqueRecurringParticipantIds = $recurringParticipantIds->unique();
        return $uniqueRecurringParticipantIds->count();
    }

    private function countRecurringParticipantsParticipationsByDate($participations, $date)
    {
        $totalRecurrings = 0;
        $participantIds = $participations->pluck('participant_id');
        $totalsRecurrings = $this->getTotalsRecurring($participantIds);
        $noRecurringParticipantIds = $totalsRecurrings->filter(function($key, $value) {
            return $value == 1;
        });

        foreach ($noRecurringParticipantIds as $id) {
            $scopes = ['id' => $id, 'onlyRecurring' => '', 'onlyBefore' => $date];
            $participants = $this->repositories['participant']->get([], $scopes, [], -1);
            if ($participants->count() > 0) {
                $totalRecurrings++;
            }
        }
        return $totalRecurrings;
    }

    private function getTotalsRecurring($ids)
    {
        $totalsRecurringParticipants = [];

        foreach ($ids as $id) {
            if (array_key_exists($id, $totalsRecurringParticipants)) {
                $totalsRecurringParticipants[$id]++;
            } else {
                $totalsRecurringParticipants[$id] = 1;
            }
        }

        return collect($totalsRecurringParticipants);
    }

    public function getSeriesByField($field, $scopes, $relation)
    {
        return  $this->repositories['participation']->getSeriesByField($field, $scopes, $relation);
    }

    public function getTotal($scopes)
    {
       $scopes['onlyRecurring'] = true;
        return $this->repositories['participant']->getTotal($scopes);
    }
}
