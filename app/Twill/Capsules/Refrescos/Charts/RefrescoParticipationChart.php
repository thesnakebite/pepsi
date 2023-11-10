<?php

namespace App\Twill\Capsules\Refrescos\Charts;

use Manifiesto\Promotions\Charts\Chart;
use Manifiesto\Dashboard\ChartableInterface;

class RefrescoParticipationChart extends Chart implements ChartableInterface
{
    protected $promotionName = 'refrescos';

    protected $moduleNames = [
        'participation'
    ];

    public function getSeries($range, $scopes = [])
    {
        return $this->repositories['participation']->getSeriesByPeriods($range[0], $range[1], $scopes);
    }

    public function getSeriesByField($field, $scopes, $relation)
    {
        return $this->repositories['participation']->getSeriesByField($field, $scopes, $relation);
    }

    public function getTotal($scopes)
    {
        return $this->repositories['participation']->getTotal($scopes);
    }
}
