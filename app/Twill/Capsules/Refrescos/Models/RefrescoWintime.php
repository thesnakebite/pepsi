<?php

namespace App\Twill\Capsules\Refrescos\Models;

use Manifiesto\Promotions\Models\PromotionModel;
use App\Twill\Capsules\Refrescos\Models\Presenters\WintimePresenter;

class RefrescoWintime extends PromotionModel
{
    public $presenterAdmin = WintimePresenter::class;

    protected $fillable = [
        'title',
        'start_at',
        'end_at'
    ];

    public function prize()
    {
        return $this->belongsTo(RefrescoPrize::class);
    }

    public function participations()
    {
        return $this->hasMany(Refresco::class, 'wintime_id');
    }
}
