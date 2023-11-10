<?php

namespace App\Twill\Capsules\Refrescos\Repositories;

use A17\Twill\Repositories\ModuleRepository;
use App\Twill\Capsules\Refrescos\Models\RefrescoWintime;

class RefrescoWintimeRepository extends ModuleRepository
{

    public function __construct(RefrescoWintime $model)
    {
        $this->model = $model;
    }

    public function filter($query, array $scopes = []) {

        if (array_key_exists('winners', $scopes)) {
            switch ($scopes['winners']) {
                case 'win':
                    $scopes['onlyWinners'] = true;
                    break;
                case 'no_win':
                    $scopes['withoutWinners'] = true;
                    break;
            }

            unset($scopes['winners']);
        }

        return parent::filter($query, $scopes);
    }
}
