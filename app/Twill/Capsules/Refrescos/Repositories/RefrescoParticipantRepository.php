<?php

namespace App\Twill\Capsules\Refrescos\Repositories;

use Manifiesto\Promotions\Repositories\ParticipantRepository;
use App\Twill\Capsules\Refrescos\Models\RefrescoParticipant;

class RefrescoParticipantRepository extends ParticipantRepository
{

    public function __construct(RefrescoParticipant $model)
    {
        $this->model = $model;
    }
}
