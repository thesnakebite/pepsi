<?php

namespace App\Front\Promotions\Forms;

use Manifiesto\Promotions\Services\Forms\BaseForm;

class RefrescoForm extends BaseForm
{
    protected $promotionName = 'refrescos';

    public function schema() {
        return config('promotions-form.Refrescos');
    }

    public function button() {
        return [
            'label' => 'COMPRUEBA SI HAS GANADO'
        ];
    }
}
