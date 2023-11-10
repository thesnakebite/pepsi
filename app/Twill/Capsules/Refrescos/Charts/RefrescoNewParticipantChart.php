<?php

namespace App\Twill\Capsules\Refrescos\Charts; 

use Manifiesto\Promotions\Charts\Chart;
use Manifiesto\Dashboard\ChartableInterface;

class RefrescoNewParticipantChart extends Chart implements ChartableInterface
{
    protected $promotionName = 'refrescos'; 

    protected $moduleNames = [
        'participation',
        'participant'
    ];

    public function getSeries($range, $scopes = [])
    {
        $scopes['onlyNew'] = true;
        return $this->repositories['participant']->getSeriesByPeriods($range[0], $range[1], $scopes);
    }

    public function getSeriesByField($field, $scopes, $relation)
    {
        return $this->repositories['participation']->getSeriesByField($field, $scopes, $relation);
    }

    public function getTotal($scopes)
    {
        $scopes['onlyNew'] = true;
        return $this->repositories['participant']->getTotal($scopes);
    }
}
