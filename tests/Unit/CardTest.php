<?php

namespace Tests\Unit;

use Tests\TestCase;

class CardTest extends TestCase
{
    /**
     * A basic unit test list_card.
     *
     * @return void
     */
    public function test_list_card()
    {
        $response = $this->withHeaders([
            'Accept' => 'application/json',
        ])->get('/api/card');

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'status',
                'message',
                'data',
                'paginate'
            ]);
    }
}
