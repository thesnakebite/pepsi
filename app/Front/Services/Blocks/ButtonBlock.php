<?php

namespace App\Front\Services\Blocks;

use App\Twill\Capsules\Pages\Repositories\PageRepository;
use Illuminate\Support\Facades\App;

class ButtonBlock extends Block
{
    public function obtain($block)
    {
        $pageId = $block->content['browsers']['page_link'] ?? false;
        $pageData = null;

        if ($pageId) {
            $pageRepository = App::make(PageRepository::class);
        
            $page = $pageRepository->getById($pageId)->first();
            $slugs = $pageRepository->getFormFieldsHandleSlugs($page, []);

            $permalinkBaseUrl = $pageRepository->getPermalinkBaseUrl();
            $permalink = $permalinkBaseUrl . $slugs['translations']['slug']['es'];

            $pageData = [
                'id' => $page->id,
                'title' => $page->title,
                'permalink' =>  $permalink
            ];
        }
        
        return [
            'page' => $pageData,
            'medias' => $this->parseMedias($block)
        ];
    }
}