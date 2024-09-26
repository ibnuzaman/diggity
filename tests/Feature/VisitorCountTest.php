<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Traffic;
use Carbon\Carbon;
use Database\Factories\TrafficFactory;
use Illuminate\Support\Facades\Artisan;

class VisitorCountTest extends TestCase
{

    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        Artisan::call('migrate');
    }

    /** @test */
    public function it_returns_daily_visitors_data()
    {
        Traffic::create(['visitor' => '127.0.0.1', 'visits' => 5, 'created_at' => now(), 'updated_at' => now()]);

        $response = $this->getJson('/api/v1/dailyVisitors');

        $response->assertStatus(200)
            ->assertJson([
                'dailyVisitorsTraffic' => 5
            ]);
    }

    /** @test */
    public function it_increments_visits_for_existing_visitor_on_new_day()
    {

        $traffic = Traffic::create(['visitor' => '127.0.0.1', 'visits' => 1, 'created_at' => now()->subDay(), 'updated_at' => now()->subDay()]);


        $this->travelTo(now()->addDay());
        $this->getJson('/api/v1/visitors');


        $traffic->refresh();
        $this->assertEquals(2, $traffic->visits);
    }

    /** @test */
    public function it_creates_new_traffic_record_for_new_visitor()
    {

        $this->getJson('/api/v1/visitors');


        $this->assertDatabaseHas('traffic', [
            'visitor' => '127.0.0.1',
            'visits' => 1
        ]);
    }


    /** @test weekly*/
    public function it_returns_weekly_visitors_data()
    {

        $dates = [
            now()->subDays(6)->startOfDay(),
            now()->subDays(5)->startOfDay(),
            now()->subDays(4)->startOfDay(),
            now()->subDays(3)->startOfDay(),
            now()->subDays(2)->startOfDay(),
            now()->subDay()->startOfDay(),
            now()->startOfDay()
        ];

        foreach ($dates as $date) {
            Traffic::create(['visitor' => '127.0.0.1', 'visits' => 5, 'created_at' => $date, 'updated_at' => $date]);
        }


        $response = $this->getJson('/api/v1/weeklyVisitors');


        $response->assertStatus(200)
            ->assertJsonStructure([
                'weeklyVisitorsTraffic' => [
                    '*' => [
                        'date',
                        'visits'
                    ]
                ]
            ]);
    }

    /** @test monthly*/
    public function it_returns_monthly_visitors_data()
    {

        $dates = [
            now()->subDays(29)->startOfDay(),
            now()->subDays(20)->startOfDay(),
            now()->subDays(10)->startOfDay(),
            now()->startOfDay()
        ];

        foreach ($dates as $date) {
            Traffic::create(['visitor' => '127.0.0.1', 'visits' => 5, 'created_at' => $date, 'updated_at' => $date]);
        }


        $response = $this->getJson('/api/v1/monthlyVisitors');


        $response->assertStatus(200)
            ->assertJson([
                'monthlyVisitorsTraffic' => 20
            ]);
    }

    /** @test */
    public function it_returns_yearly_visitors_data()
    {

        $dates = [
            now()->subMonths(11)->startOfDay(),
            now()->subMonths(10)->startOfDay(),
            now()->subMonths(9)->startOfDay(),
            now()->startOfDay()
        ];

        foreach ($dates as $date) {
            Traffic::create(['visitor' => '127.0.0.1', 'visits' => 5, 'created_at' => $date, 'updated_at' => $date]);
        }


        $response = $this->getJson('/api/v1/yearlyVisitors');


        $response->assertStatus(200)
            ->assertJson([
                'yearlyVisitorsTraffic' => 20
            ]);
    }
}
