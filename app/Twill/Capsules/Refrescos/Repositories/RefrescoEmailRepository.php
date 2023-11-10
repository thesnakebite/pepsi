<?php

namespace App\Twill\Capsules\Refrescos\Repositories;

use Manifiesto\Promotions\Repositories\EmailRepository;
use App\Twill\Capsules\Refrescos\Models\RefrescoEmail;

class RefrescoEmailRepository extends EmailRepository
{

    public function __construct(RefrescoEmail $model)
    {
        $this->model = $model;
    }
}
