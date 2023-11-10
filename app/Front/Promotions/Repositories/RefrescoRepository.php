<?php

namespace App\Front\Promotions\Repositories;
use Manifiesto\Promotions\Front\Repositories\Behaviors\HandleWinTimes;
use Manifiesto\Promotions\Front\Repositories\PromotionRepository;
use App\Twill\Capsules\Refrescos\Models\Refresco;
use App\Front\Promotions\Forms\RefrescoForm;

class RefrescoRepository extends PromotionRepository
{
    use HandleWinTimes;

    public function __construct(Refresco $model, RefrescoForm $form)
    {
        $this->model = $model;
        $this->schema = $form->getSchemaParticipant();
    }
}
