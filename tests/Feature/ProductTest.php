<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductTest extends TestCase
{
//    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_all_products()
    {
        $response = $this->get('/api/products');

        $response->assertOk();
    }
    public function test_one_product()
    {
        $response = $this->get('/api/products/2');

        $response->assertOk();
    }
    public function test_new_product()
    {
        $response = $this->post('/api/products', [
            'name' => 'telephone',
            'brand' => 'ulephone',
            'rating' => 4,
            'category_id' => 3,
            'description' => 'we df dsf sdf ff',
        ]);

        $response->assertCreated();
    }
    public function test_delete_product()
    {
        $response = $this->delete('/api/products/49');

        $response->assertSuccessful();
    }
    public function test_update_product()
    {
        $response = $this->put('/api/products/2', [
            'name' => 'telephone',
            'brand' => 'ulephone',
            'rating' => 4,
            'category_id' => 3,
            'description' => 'we df dsf sdf ff',
        ]);

        $response->assertStatus(200);
    }
}
