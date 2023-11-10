<?php

namespace App\Twill\Capsules\Refrescos\Models;

use Manifiesto\Promotions\Models\PromotionModel;

class RefrescoEmail extends PromotionModel
{
    protected $fillable = [
        'published',
        'title',
        'subject',
        'body',
        'preheader',
        'type'
    ];
}
