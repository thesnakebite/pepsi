<?php

namespace App\Twill\Capsules\MainMenuItems\Http\Controllers;

use A17\Twill\Http\Controllers\Admin\NestedModuleController as BaseModuleController;

class MainMenuItemController extends BaseModuleController
{
    protected $moduleName = 'mainMenuItems';

    protected $indexOptions = [
        'permalink' => false,
        'reorder' => true,
    ];

    protected $showOnlyParentItemsInBrowsers = true;

    protected $nestedItemsDepth = 2;

    protected function setMiddlewarePermission()
    {
        $this->middleware('can:edit', ['only' => ['index', 'show', 'store', 'edit', 'update']]);
        $this->middleware('can:duplicate', ['only' => ['duplicate']]);
        $this->middleware('can:publish', ['only' => ['publish', 'feature', 'bulkPublish', 'bulkFeature']]);
        $this->middleware('can:reorder', ['only' => ['reorder']]);
        $this->middleware('can:delete', ['only' => ['destroy', 'bulkDelete', 'restore', 'bulkRestore', 'forceDelete', 'bulkForceDelete', 'restoreRevision']]);
    }
}
