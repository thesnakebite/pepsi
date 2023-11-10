<?php

namespace App\Front\Promotions\Repositories;
use Manifiesto\Promotions\Front\Repositories\PromotionRepository;
use App\Twill\Capsules\Refrescos\Models\RefrescoParticipant;
use App\Front\Promotions\Forms\RefrescoForm;

class RefrescoParticipantRepository extends PromotionRepository
{
    public function __construct(RefrescoParticipant $model, RefrescoForm $form)
    {
        $this->model = $model;
        $this->schema = $form->getSchemaParticipant();
    }
}
