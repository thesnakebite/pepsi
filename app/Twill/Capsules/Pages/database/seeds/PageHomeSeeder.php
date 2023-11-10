<?php

namespace App\Twill\Capsules\Pages\Database\Seeds;

use A17\Twill\Models\Block;
use App\Twill\Capsules\Pages\Models\Page;
use Illuminate\Database\Seeder;

class PageHomeSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $page = Page::create([
            'published' => true,
            'title' => 'inici'
        ]);

        $page->setSlugs();

        $content = [
            'type' => 'standard'
        ];

       $block = Block::create([
            'blockable_id' => $page->id,
            'blockable_type' => 'App\Twill\Capsules\Pages\Models\Page',
            'position' => 1,
            'content' => $content,
            'type' => 'row',
            'editor_name' => 'default'
        ]);
        

        $content = [
            'hide_mobile' => false,
            'hide_desktop' => false,
            'width_column' => null,
            'vertical_blocks' => false,
            'vertical_alignment' => 'top',
            'horizontal_alignment' => 'left',
            'vertical_alignment_mobile' => 'top',
            'horizontal_alignment_mobile' => 'left'
        ];

        $block = Block::create([
            'blockable_id' => $page->id,
            'blockable_type' => 'App\Twill\Capsules\Pages\Models\Page',
            'position' => 1,
            'content' => $content,
            'type' => 'column_item',
            'child_key' => 'Columna',
            'parent_id' => $block->id,
            'editor_name' => 'default'
        ]);
        

        $content = [
            'body' => '<h2 class=\"ql-align-center\">Hello world!</h2>',
            'hide_mobile' => false,
            'hide_desktop' => false,
        ];

        Block::create([
            'blockable_id' => $page->id,
            'blockable_type' => 'App\Twill\Capsules\Pages\Models\Page',
            'position' => 1,
            'content' => $content,
            'type' => 'block_text_item',
            'child_key' => 'single_blocks',
            'parent_id' => $block->id,
            'editor_name' => 'default'
        ]);
    }
}