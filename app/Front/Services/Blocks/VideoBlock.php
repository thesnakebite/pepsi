<?php

namespace App\Front\Services\Blocks;

use App\Twill\Capsules\Pages\Repositories\PageRepository;
use Illuminate\Support\Facades\App;

class VideoBlock extends Block
{
    public function obtain($block)
    {
        return [
            'medias' => $this->parseMedias($block)
        ];
    }
}