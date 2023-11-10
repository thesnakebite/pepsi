<?php

namespace App\Front\Services\Blocks;

use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

class FormBlock extends Block
{
    public function obtain($block)
    {
        $formData = [];
        $promotionName = $block->content['promotion'] ?? false;
        $promotionFormClass = "App\Front\Promotions\Forms\\".Str::singular($promotionName)."Form";
    
        $publish_start = $block->content['publish_start_date'] ?? Carbon::now();
        $publish_end = $block->content['publish_end_date'] ?? Carbon::now();
        
        $now = Carbon::parse(Carbon::now())->setTimeZone(config('promotions.timezone'));

        if (!$now->betweenExcluded($publish_start, $publish_end)) {
            return [
                'form' => false,
                'medias' => $this->parseMedias($block)
            ];
        }
        
        if (!class_exists($promotionFormClass)) {
            return $formData;
        }

        $promotionForm = app()->make($promotionFormClass);

        if ($promotionForm) {
            $formData =  $promotionForm->toArray();
        }
        
        return [
            'form' => $formData,
            'medias' => $this->parseMedias($block)
        ];
    }
}