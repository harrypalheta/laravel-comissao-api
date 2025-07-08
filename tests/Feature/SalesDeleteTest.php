<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Support\Str;

class SalesDeleteTest extends TestCase
{
    public function test_the_sales_delete(): void
    {
        $id = Str::uuid()->toString();
        $response = $this->delete('/api/sales/'.$id);

        $response->assertStatus(404);
    }
}
