<?php

namespace App\Front\Services\Blocks;


class ColBlock extends Block
{
    public function obtain($block)
    {
        $contentRow = empty($block->content) ? new \stdClass : (object) $block->content;
        
        $data = [
            'content' => $contentRow,
            'medias' =>  $block->medias->count() > 0 ? $this->parseMedias($block) : [],
        ];

        return $data;
    }
}