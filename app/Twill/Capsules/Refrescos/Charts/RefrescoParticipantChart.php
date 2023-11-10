<?php

namespace App\Twill\Capsules\Refrescos\Charts;

use Manifiesto\Promotions\Charts\Chart;
use Manifiesto\Dashboard\ChartableInterface;

class RefrescoParticipantChart extends Chart implements ChartableInterface
{
    protected $promotionName = 'refrescos';

    protected $moduleNames = [
        'participant'
    ];

     public function getSeries($range, $scopes = [])
    {
        return $this->repositories['participant']->getSeriesByPeriods($range[0], $range[1], $scopes);
    }

    public function getSeriesByField($field, $scopes, $relation)
    {
        return  $this->repositories['participant']->getSeriesByField($field, $scopes, $relation);
    }

    public function getTotal($scopes)
    {
        return  $this->repositories['participant']->getTotal($scopes);
    }
}
