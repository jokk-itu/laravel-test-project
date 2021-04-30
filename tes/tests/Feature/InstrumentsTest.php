<?php
namespace Tests\Feature;

use App\Models\Instrument;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class InstrumentsTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_index()
    {
        Instrument::factory(2)->create();
        $response = $this->get('instrument');
        $response->assertStatus(200);
    }

    public function test_store_valid_instrument()
    {
        $response = $this->post('instrument/create', ['name' => 'Testing']);
        $response->assertCreated();
    }

    //How can it be 302????
    public function test_store_invalid_instrument()
    {
        $response = $this->post('instrument/create', ['name' => null]);
        $response->assertStatus(302);
    }

    public function test_show_valid_name()
    {
        $this->get('instrument/create', ['name' => 'valid']);
        $response = $this->get('instrument/valid');
        $response->assertStatus(200);
    }

    public function test_show_invalid_name()
    {
        $response = $this->get('instrument/invalid');
        $response->assertStatus(200);
    }

    public function test_update_valid_id_and_valid_name()
    {
        Instrument::factory()->create();
        $response = $this->put('instrument/0', ['name' => 'valid']);
        $response->assertStatus(500);
    }

    public function test_update_invalid_id()
    {
        Instrument::factory()->create();
        $response = $this->put('instrument/5', ['name' => 'valid']);
        $response->assertStatus(500);
    }

    public function test_update_invalid_name()
    {
        Instrument::factory()->create();
        $response = $this->put('instrument/1', ['name' => null]);
        $response->assertStatus(302);
    }
}
