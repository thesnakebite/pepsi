<?php

namespace App\Front\Services\Blocks;

use App\Imports\MarkersImport;
use Maatwebsite\Excel\Facades\Excel;

class MapBlock extends Block
{
    public function obtain($block)
    {
        $content = [];
        $files = $this->parseFiles($block);
        $file_marker = $files->where('role', 'file_markers')->first();

        if ($file_marker) {

            $markersImport = new MarkersImport();
            Excel::import($markersImport, $file_marker['uuid'], config('twill.file_library.disk'));

            $content = [
                'markers' => $markersImport->getMarkers(),
                'google_maps_id' => $block->content['google_maps_id'],
                'hide_desktop' => $block->content['hide_desktop'],
                'hide_mobile' => $block->content['hide_mobile']
            ];
        }

        return [
            'content' => $content,
            'files' => $this->parseFiles($block),
            'medias' => $this->parseMedias($block)
        ];
    }
}
