<?php

namespace Tests\Feature\Promotions;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

use App\Twill\Capsules\Refrescos\Models\Refresco;
class RefrescoTest extends TestCase
{
    use RefreshDatabase;
    use WithoutMiddleware;
}
