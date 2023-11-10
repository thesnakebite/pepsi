<?php

namespace App\Twill\Capsules\MainMenuItems\Models;

use A17\Twill\Models\Behaviors\HasPosition;
use A17\Twill\Models\Behaviors\HasNesting;
use A17\Twill\Models\Behaviors\HasRelated;
use A17\Twill\Models\Behaviors\Sortable;
use A17\Twill\Models\Model;

class MainMenuItem extends Model implements Sortable
{
    use HasPosition, HasNesting, HasRelated;

    protected $fillable = [
        'published',
        'title',
        'type',
        'url_link',
        'page_id',
        'position'
    ];

    public function scopeDoesntHave($query, $type) {
        $query->doesntHave($type);
    }
}
