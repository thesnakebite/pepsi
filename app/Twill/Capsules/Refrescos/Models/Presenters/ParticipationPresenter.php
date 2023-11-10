<?php
namespace App\Twill\Capsules\Refrescos\Models\Presenters;

use Manifiesto\Promotions\Models\Presenter;

class ParticipationPresenter extends Presenter
{
    public function createdAt()
    {
        return $this->created_at->setTimeZone(config('promotions.timezone'))->toDateTimeString();
    }
}
