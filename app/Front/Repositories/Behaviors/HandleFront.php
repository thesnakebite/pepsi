<?php

namespace App\Front\Repositories\Behaviors;

use App\Twill\Capsules\Pages\Repositories\PageRepository;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

trait HandleFront
{
     public function getFrontPage($id, $position = ['position' => 'desc'])
    {
        $page = $this->find($id);

        if (!$page) {
            return false;
        }

        $data = [
            'rows' => $this->parseBlocks($page->blocks, $position),
            'settings' => $this->parseSettings()
        ];
        
        return array_merge($this->getDefaultFields($page), $data);
    }

     public function getFrontPageForSlug($slug, $position = ['position' => 'desc'])
    {
        $page = $this->forSlug($slug);

        if (!$page) {
            return false;
        }

        $mainMenu = app()->make('App\Twill\Capsules\MainMenuItems\Repositories\MainMenuItemRepository');
        $footerMenu = app()->make('App\Twill\Capsules\FooterMenuItems\Repositories\FooterMenuItemRepository');

        $data = [
            'description' => $page->description,
            'styles' => [
                'bg_color' => $page->bg_color
            ],
            'medias' =>  $this->parseMedias($page->medias),
            'rows' => $this->parseBlocks($page->blocks, $position),
            'settings' => $this->parseSettings(),
            'menus' => [
                'main_menu' => $this->parseMenus($mainMenu->get(['ancestors'], ['doesntHave' => 'ancestors', 'published' => true])),
                'footer_menu' => $this->parseMenus($footerMenu->get(['ancestors'], ['doesntHave' => 'ancestors', 'published' => true])),
            ]
        ];
        
        return array_merge($this->getDefaultFields($page), $data);
    }

    public function traverseMenus($rawNodes) 
    {
        $nodes = [];
        foreach ($rawNodes as $rawNode) {

            $node = [
                'title' => $rawNode->title,
                'type' => $rawNode->type,
                'children' => $this->traverseMenus($rawNode->children ?? [])
            ];

            if ($rawNode->type === 'page_link') {
               
                $pageRepository = app()->make(PageRepository::class);
            
                $page = $rawNode->getRelated('pages')->first();

                if ($page) {

                    $slugs = $pageRepository->getFormFieldsHandleSlugs($page, []);
                    
                    $permalinkBaseUrl = $pageRepository->getPermalinkBaseUrl();
                    $permalink = $permalinkBaseUrl . $slugs['translations']['slug']['es'];
                    
                    $node['page'] =  [
                        'id' => $page->id,
                        'title' => $page->title,
                        'permalink' =>  $permalink
                    ];
                } else {
                    $node['page'] = null;
                }
            } else {
                $node['link'] = $rawNode->url_link;
            }

            $nodes[] = $node;
        }

        return $nodes;  
    }

    public function parseMenus($nodes)
    {
        return $this->traverseMenus($nodes);
    }

    public function parseMedias($medias)
    {
        $mediasParsed = [];
        foreach ($medias as $key => $value) {
            $mediasParsed[$key] = [
                'role' => $key,
                'url_raw' => is_array($value) ? $value[0]['original'] : $value->toCmsArray()['original']
            ];
        }

        return $mediasParsed;
    }

    public function parseSettings()
    {
        $settingRepository = app()->make('A17\Twill\Repositories\SettingRepository');
        $fields = $settingRepository->getFormFields();
        $medias = $this->parseMedias($fields['medias']);

        return [
            'general' => [
                'medias' => [
                    'logo' => $medias['logo'] ?? '',
                    'favicon' => $medias['favicon'] ?? '',
                ],
                'seo' => [ 
                    'site_title' => $fields['site_title'] ?? '',
                    'medias' => [
                        'logo' => $medias['seo'] ?? '',
                    ]
                ],
            ],
            'styles' => [
                'general' => [
                    'color' => $fields['default_color'] ?? ''
                ],
                'header' => [
                    'layout' => $fields['header_layout'] ?? '',
                    'template' => $fields['header_template'] ?? '',
                    'bg_color' =>  $fields['header_bg_color'] ?? '',
                    'font_color' =>  $fields['header_font_color'] ?? '',
                ],
                'footer' => [
                    'layout' => $fields['footer_layout'] ?? '',
                    'template' => $fields['footer_template'] ?? '',
                    'bg_color' =>  $fields['footer_bg_color'] ?? '',
                    'font_color' =>  $fields['footer_font_color'] ?? '',
                    'copyright' =>  $fields['copyright'] ?? '',
                ],
                'container_fields' => [
                    'header_width' => $fields['header_container_width'] ?? '',
                    'main_width' => $fields['main_container_width'] ?? '',
                    'footer_width' =>  $fields['footer_container_width'] ?? ''
                ],
                'primary_button' => [
                    'bg_color' => $fields['primary_bg_color'] ?? '',
                    'text_color' => $fields['primary_text_color'] ?? '',
                    'border' => $fields['primary_border'] ?? '',
                    'border_radius' => $fields['primary_border_radius'] ?? '',
                ],
                'secondary_button' => [
                    'bg_color' => $fields['secondary_bg_color'] ?? '',
                    'text_color' => $fields['secondary_text_color'] ?? '',
                    'border' => $fields['secondary_border'] ?? '',
                    'border_radius' => $fields['secondary_border_radius'] ?? '',
                ],
                'fonts' => [
                     'pathFileHeaders' => [
                        $fields['file_headers_1'] ?? '',
                        $fields['file_headers_2'] ?? ''
                    ],
                    'pathFileParagraphs' => [
                        $fields['file_paragraphs_1'] ?? '',
                        $fields['file_paragraphs_2'] ?? ''
                    ],
                ],
            ],
            'socials' => [
                'facebook' => [
                    'url' => $fields['facebook_url'] ?? ''
                ],
                'instagram' => [
                    'url' => $fields['instagram_url'] ?? ''
                ],
                'twitter' => [
                    'url' => $fields['twitter_url'] ?? ''
                ],
                'youtube' => [
                    'url' => $fields['youtube_url'] ?? ''
                ],
                'linkedin' => [
                    'url' => $fields['linkedin_url'] ?? ''
                ],
                'tiktok' => [
                    'url' => $fields['tiktok_url'] ?? ''
                ]
            ],
            'api' => [
                'google_maps' => [
                    'key' => $fields['google_maps_key'] ?? ''
                ],
                'google_recaptcha' => [
                    'key' => $fields['google_recaptcha_key'] ?? ''
                ],
                'google_marketing' => isset($fields['google_marketing_key']) ? [
                    'key' => $fields['google_marketing_key'] ?? '',
                    'type' => $fields['google_marketing_type'] ?? ''
                ] : null,
            ]
        ];
    }

    public function parseBlocks($allBlocks, $position) 
    {
        $blockFactory = app()->make('App\Front\Services\Blocks\BlockFactory');
        $dataRows = [];
        $position = count($position) > 0 ? $position['position'] : null;
        $rows = $this->getRowBlocks($allBlocks, $position);
        foreach ($rows  as $row) {
           
            $dataColumns = [];
            $columns = $this->getSubordinateColumnBlocks($row->id, $allBlocks);
            foreach ($columns  as $column) {
                
                $dataBlocks = [];
                $blocks = $this->getSubordinateBlocks($column->id, $allBlocks);
                foreach ($blocks  as $block) {

                    $dataBlock = [
                        'id' => $block->id,
                        'position' => $block->position,
                        'type' => $block->type,
                        'content' => empty($block->content) ? new \stdClass : (object) $block->content
                    ];
                    
                    if ($blockFront = $blockFactory->initializeBlock($block->type)) {
                        $dataBlock = array_merge($dataBlock, $blockFront->obtain($block));
                    }

                    unset($dataBlock['content']->browsers);
                    
                    $dataBlocks[] = $dataBlock;
                }

                $dataColumn = [
                    'id' => $column->id,
                    'position' => $column->position,
                    'blocks' => $dataBlocks
                ];

                if ($blockColumn = $blockFactory->initializeBlock('column')) {
                    $dataColumn = array_merge($dataColumn, $blockColumn->obtain($column));
                }

                $dataColumns[] = $dataColumn;
            }  

            $dataRow = [
                'id' => $row->id,
                'position' => $row->position,
                'columns' => $dataColumns
            ];

            if ($blockFront = $blockFactory->initializeBlock('row')) {
                $dataRow = array_merge($dataRow, $blockFront->obtain($row));
            }

            $dataRows[] = $dataRow;
        }

        return $dataRows;
    }

    public function getRowBlocks($blocks, $position = null) 
    {        
        $blockRows = $blocks->filter( function ($block) {
            return str_contains($block->type, 'row') && is_null($block->child_key) ;
        });

        return $blockRows;
    }
    
    public function getSubordinateColumnBlocks($parentId, $blocks) 
    {
        return $blocks->filter(function($value, $key) use ($parentId) {
            return $value->parent_id == $parentId && $value->type === 'column_item';
        });
    }

    public function getSubordinateBlocks($parentId, $blocks) 
    {
        return $blocks->filter(function($value, $key) use ($parentId) {
            return $value->parent_id == $parentId;
        });
    }

    public function parseMenu($item)
    {
        $menu = $item->menus()->first();
        if ($menu) {
            return [
                'color' => $menu->color,
                'items' => $menu->blocks()->get()->transform( function ($item) {
                    return [
                        'label' => $item->content['name'],
                        'value' => $item->content['value'] ?? ''
                    ];
                })
            ];
        }

        return [];
    }

    protected function getDefaultFields($item)
    {
        return [
            'title' => $item->title,
            'number' => $item->number
        ];
    }

    public function getFrontFormFields($object) 
    {
        $fields = parent::getFormFields($object);

        if (!is_null($fields['blocks'])) {
            $blocks = [];
            foreach ($fields['blocks'] as $block) {
                $currentBlock = collect($fields['blocksFields'])->first(function($item) use ($block) {
                    return $item['name'] == 'blocks['.$block['id'].'][title]';
                });
                $titleText = $block['title'] ?? '';
                $currentBlockText = $currentBlock['value'] ?? '';
                $block['title'] =  $titleText . ': '. $currentBlockText;
                $blocks[] = $block;
            }
            $fields['blocks'] = $blocks;
        }

        $fields['browsers']['positions'] = $this->getFormFieldsForBrowser($object, 'positions', 'magazines');
        $fields['browsers']['menus'] = $this->getFormFieldsForBrowser($object, 'menus', 'magazines');

        return $fields;
    }

    public function getFormFieldsForBrowser($object, $relation, $routePrefix = null, $titleKey = 'title', $moduleName = null)
    {
        return $object->$relation()->orderBy('pivot_position', 'asc')->get()->map(function ($relatedElement) use ($titleKey, $routePrefix, $relation, $moduleName) {
            return [
                'id' => $relatedElement->id,
                'name' => $relatedElement->titleInBrowser ?? $relatedElement->$titleKey,
                'edit' => moduleRoute($moduleName ?? $relation, $routePrefix ?? '', 'edit', $relatedElement->id),
                'endpointType' => $relatedElement->getMorphClass(),
            ] + (classHasTrait($relatedElement, HasMedias::class) ? [
                'thumbnail' => $relatedElement->defaultCmsImage(['w' => 100, 'h' => 100]),
            ] : []);
        })->toArray();
    }

     public function getPermalinkBaseUrl()
    {
        $appUrl = Config::get('app.url');

        if (blank(parse_url($appUrl)['scheme'] ?? null)) {
            $appUrl = request()->getScheme() . '://' . $appUrl;
        }

        return $appUrl . '/'
            . ($this->hasBehavior('translations') ? '{language}/' : '')
            . ($this->hasBehavior('revisions') ? '{preview}/' : '');
    }

    protected function getModulePermalinkBase()
    {
        $base = '';
        $moduleParts = explode('.', 'Pages');

        foreach ($moduleParts as $index => $name) {
            if (array_key_last($moduleParts) !== $index) {
                $singularName = Str::singular($name);
                $modelClass = config('twill.namespace') . '\\Models\\' . Str::studly($singularName);

                if(!class_exists($modelClass)) {
                    $modelClass = $this->getCapsuleByModule($name)['model'];
                }

                $model = (new $modelClass)->findOrFail(request()->route()->parameter($singularName));
                $hasSlug = Arr::has(class_uses($modelClass), HasSlug::class);

                $base .= $name . '/' . ($hasSlug ? $model->slug : $model->id) . '/';
            } else {
                $base .= $name;
            }
        }

        return $base;
    }

    protected function getLocalizedPermalinkBase()
    {
        return [];
    }
}
