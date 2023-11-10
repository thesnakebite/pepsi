<?php

namespace App\Front\Services\Blocks;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use A17\Twill\Models\Model;
use Illuminate\Support\Facades\Storage;
use ImageService;

abstract class Block implements BlockableInterface
{
    public function parseMedias($item)
    {
        return $item->medias->map(function ($media) {
            return [
                'locale' => $media->pivot->locale,
                'role' => $media->pivot->role,
                'crop' => $media->pivot->crop,
                'uuid' => $media->uuid,
                'url_raw' => ImageService::getRawUrl($media->uuid),
                'name' => $media->filename
            ];
        });
    }

    public function parseFiles($item)
    {
        return $item->files->map(function ($file)  {
            $url = Storage::disk('public')->url($file->uuid);
            return [
                'locale' => $file->pivot->locale,
                'role' => $file->pivot->role,
                'uuid' => $file->uuid,
                'url_raw' => $url
            ];
        });
    }

    protected function getModelRepository($relation, $model = null)
    {
        if (!$model) {
            if (class_exists($relation) && (new $relation) instanceof Model) {
                $model = Str::afterLast($relation, '\\');
            } else {
                $model = ucfirst(Str::singular($relation));
            }
        }

        return App::make(Config::get('twill.namespace') . "\\Repositories\\" . ucfirst($model) . "Repository");
    }
}