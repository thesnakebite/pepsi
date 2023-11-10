<?php

namespace App\Front\Services\Blocks;


class DefaultBlock extends Block
{
    public function obtain($block)
    {
        return [
            'content' => empty($block->content) ? new \stdClass : (object) $block->content,
            'medias' =>  $block->medias->count() > 0 ? $this->parseMedias($block) : []
        ];
    }
}