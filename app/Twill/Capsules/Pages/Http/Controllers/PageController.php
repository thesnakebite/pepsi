<?php

namespace App\Twill\Capsules\Pages\Http\Controllers;

use A17\Twill\Http\Controllers\Admin\ModuleController;

class PageController extends ModuleController
{
    protected $moduleName = 'pages';

    protected $permalinkBase = '';

    protected function setMiddlewarePermission()
    {
        $this->middleware('can:edit', ['only' => ['index', 'show', 'store', 'edit', 'update']]);
        $this->middleware('can:duplicate', ['only' => ['duplicate']]);
        $this->middleware('can:publish', ['only' => ['publish', 'feature', 'bulkPublish', 'bulkFeature']]);
        $this->middleware('can:reorder', ['only' => ['reorder']]);
        $this->middleware('can:delete', ['only' => ['destroy', 'bulkDelete', 'restore', 'bulkRestore', 'forceDelete', 'bulkForceDelete', 'restoreRevision']]);
    }
}
