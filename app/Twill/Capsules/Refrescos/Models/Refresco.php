<?php

namespace App\Twill\Capsules\Refrescos\Models;

use Manifiesto\Promotions\Front\Models\Behaviors\HasWinTimes;
use Manifiesto\Promotions\Models\PromotionModel;
use App\Twill\Capsules\Refrescos\Models\Presenters\ParticipationPresenter;

class Refresco extends PromotionModel
{
   use HasWinTimes;

    protected $fillable = [
        'participant_id'
    ];

    public $presenterAdmin = ParticipationPresenter::class;

    public function participant()
    {
        return $this->belongsTo(RefrescoParticipant::class);
    }

    
    public function wintime()
    {
        return $this->belongsTo(RefrescoWintime::class);
    }
 
    public function prize()
    {
        return $this->belongsToThrough(
            RefrescoPrize::class, 
            RefrescoWintime::class,
            null, 
            '', 
            [
                RefrescoPrize::class => 'prize_id', 
                RefrescoWintime::class => 'wintime_id'
            ]);
    }
    

    public function scopeOnlyWinners($query)
    {
        
        $query->whereNotNull('wintime_id');
        
    }

    public function scopeWithoutWinners($query)
    {
        
        $query->whereNull('wintime_id');
        
    }

    public function scopeDateRange($query, $range)
    {
        $query->whereDate('created_at', '>=', $range[0]);
        $query->whereDate('created_at', '<=', $range[1]);
    }
}
