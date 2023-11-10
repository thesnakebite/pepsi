<?php

namespace App\Twill\Capsules\Refrescos\Models\Presenters;

use Manifiesto\Promotions\Models\Presenter;
use Illuminate\Support\Carbon;

class WintimePresenter extends Presenter
{
    public function startAt()
    {
        return Carbon::parse($this->start_at)->setTimeZone(config('promotions.timezone'))->toDateTimeString();
    }

    public function endAt()
    {
        return Carbon::parse($this->end_at)->setTimeZone(config('promotions.timezone'))->toDateTimeString();
    }
}