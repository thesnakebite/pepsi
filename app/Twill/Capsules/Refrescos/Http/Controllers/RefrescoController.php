<?php

namespace App\Twill\Capsules\Refrescos\Http\Controllers;

use Manifiesto\Promotions\Http\Controllers\Admin\PromotionController;

class RefrescoController extends PromotionController
{
    protected $promotionName = 'refrescos';

    protected $filters = [
        'Ganadores' => 'winners'
    ];

    protected function indexData($request)
    {
        return [
            'GanadoresList' => [
                [
                    'value' => 'win',
                    'label' => 'Ganadores'
                ],
                [
                    'value' => 'no_win',
                    'label' => 'No Ganadores'
                ]
            ]
        ];
    }
}
