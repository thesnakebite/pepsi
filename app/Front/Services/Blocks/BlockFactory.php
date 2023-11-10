<?php

namespace App\Front\Services\Blocks;


class BlockFactory
{
    public function initializeBlock($type) 
    {
        if ($type === 'row') {
            return new RowBlock();
        } elseif ($type === 'column') {
            return new ColBlock();
        } elseif ($type === 'block_image_item') {
            return new ImageBlock();
        } elseif ($type === 'block_button_item') {
            return new ButtonBlock();
        } elseif ($type === 'block_video_item') {
            return new VideoBlock();
        } elseif ($type === 'block_map_item') {
            return new MapBlock();
        } elseif ($type === 'block_form_item') {
            return new FormBlock();
        } else {
            return new DefaultBlock();
        }

        return false;
    }
}