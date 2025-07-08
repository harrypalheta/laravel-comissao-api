<?php

namespace Tests\Feature;

use Tests\TestCase;

class SalesRecordAndCalculateValuesTest extends TestCase
{
    public function test_sales_record_and_calculate_values(): void
    {
        $response = $this->post('/api/sales', [
            'valor_total' => 1000,
            'tipo_venda' => 'afiliada'
        ]);

        $response->assertStatus(201);
    }
}
