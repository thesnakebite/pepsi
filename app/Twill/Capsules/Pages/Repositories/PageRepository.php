<?php

namespace App\Twill\Capsules\Pages\Repositories;

use A17\Twill\Repositories\Behaviors\HandleBlocks;
use A17\Twill\Repositories\Behaviors\HandleSlugs;
use A17\Twill\Repositories\Behaviors\HandleMedias;
use A17\Twill\Repositories\ModuleRepository;
use App\Twill\Capsules\Pages\Models\Page;
use App\Front\Repositories\Behaviors\HandleFront;

class PageRepository extends ModuleRepository
{
    use HandleBlocks, HandleSlugs, HandleMedias, HandleFront;

    public function __construct(Page $model)
    {
        $this->model = $model;
    }
}
