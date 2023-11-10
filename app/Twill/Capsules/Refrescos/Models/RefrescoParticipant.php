<?php

namespace App\Twill\Capsules\Refrescos\Models;

use Manifiesto\Promotions\Models\PromotionModel;
use Illuminate\Notifications\Notifiable;

class RefrescoParticipant extends PromotionModel
{
    use Notifiable;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'acceptance_of_communications',
    ];

    public function participations()
    {
        return $this->hasMany(Refresco::class, 'participant_id');
    }

    public function scopeOnlyRecurring($query)
    {
        $query->has('participations', '>', 1);
    }

    public function scopeOnlyNew($query)
    {
        $query->has('participations', '=', 1);
    }

    public function scopeOnlyBefore($query, $date)
    {
        $query->where('created_at', '<', $date);
    }
}
