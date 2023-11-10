<?php

namespace App\Twill\Capsules\Refrescos\Http\Controllers;

use Manifiesto\Promotions\Http\Controllers\Admin\EmailController;

class RefrescoEmailController extends EmailController
{
    protected $promotionName = 'refrescos';

    protected function setMiddlewarePermission()
    {
        $this->middleware('can:edit', ['only' => ['index', 'show', 'store', 'edit', 'update']]);
        $this->middleware('can:duplicate', ['only' => ['duplicate']]);
        $this->middleware('can:publish', ['only' => ['publish', 'feature', 'bulkPublish', 'bulkFeature']]);
        $this->middleware('can:reorder', ['only' => ['reorder']]);
        $this->middleware('can:delete', ['only' => ['destroy', 'bulkDelete', 'restore', 'bulkRestore', 'forceDelete', 'bulkForceDelete', 'restoreRevision']]);
    }
}
