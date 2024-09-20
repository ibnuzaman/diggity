<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Traffic;
use Carbon\Carbon;
use Database\Factories\TrafficFactory;

class VisitorCountTest extends TestCase
{
    use RefreshDatabase;

    public function testDailyVisitors()
    {
        $date = now()->format('Y-m-d');
        Traffic::factory()->create(['created_at' => $date, 'visits' => 5]);
        $response = $this->get('/dailyVisitors');
        $response->assertStatus(200);
        $dailyVisitors = $response->json('dailyVisitors');
        $this->assertEquals(5, $dailyVisitors);
    }


    public function testWeeklyVisitors()
    {

        for ($i = 0; $i < 7; $i++) {
            $date = Carbon::now()->subDays($i)->format('Y-m-d');
            Traffic::factory()->create(['created_at' => $date, 'visits' => 5]);
        }


        $response = $this->get('/weeklyVisitors');


        $response->assertStatus(200);
        $weeklyTraffic = $response->json('weeklyTraffic');
        $this->assertCount(7, $weeklyTraffic);

        foreach ($weeklyTraffic as $dayTraffic) {
            $this->assertEquals(5, $dayTraffic['visits']);
        }
    }
}
