<?php

namespace Tests\Feature;

use Tests\TestCase;

class SalesListingTest extends TestCase
{
    public function test_the_sales_listing(): void
    {
        $response = $this->get('/api/sales');

        $response->assertStatus(200);
    }
}
