<?php

namespace App\Twill\Capsules\Refrescos\Repositories;

use Manifiesto\Promotions\Repositories\ParticipationRepository;
use App\Twill\Capsules\Refrescos\Models\Refresco;

class RefrescoRepository extends ParticipationRepository
{

    public function __construct(Refresco $model)
    {
        $this->model = $model;
    }
}
