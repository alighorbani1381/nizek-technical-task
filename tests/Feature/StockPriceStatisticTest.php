<?php

use Tests\TestCase;
use App\Models\StockPrice;
use App\Jobs\StockImportJob;

/*
 * ⚠ Notice This File has a test With SideEffect truncate stock price and loaded dummy data
 */

class StockPriceStatisticTest extends TestCase
{
    private static bool $isDataLoaded = false;

    protected function setUp(): void
    {
        parent::setUp();

        if (!self::$isDataLoaded) {
            StockPrice::query()->truncate();
            $filePath = resource_path('dummy-data/DummyData.xlsx');
            $rangeCoordinate = 'A10:B3513';
            $priceImporter = new StockImportJob($filePath, $rangeCoordinate);
            $priceImporter->handle();
            self::$isDataLoaded = true;
        }
    }

    public function test_statistic_by_1d_small_case_period()
    {
        $response = $this->getJson(route('statistic.period', ['period' => '1d']));

        $response->assertOk();
    }

    public function test_statistic_by_1d_capital_case_period()
    {
        $response = $this->getJson(route('statistic.period', ['period' => '1D']));

        $response->assertOk();
    }

    public function test_statistic_by_invalid_period()
    {
        $response = $this->getJson(route('statistic.period', ['period' => 'dummy text']));

        // check returns validation error (422)
        $response->assertUnprocessable();
    }

    public function test_statistic_by_1d_period()
    {
        $response = $this->getJson(route('statistic.period', ['period' => '1d']));

        $response->assertOk()
            ->assertJsonStructure(['success', 'title', 'result'])
            ->assertJsonPath('result.growPercentage', -1.17);
    }

    public function test_statistic_by_1m_period()
    {
        $response = $this->getJson(route('statistic.period', ['period' => '1m']));

        $response->assertOk()
            ->assertJsonStructure(['success', 'title', 'result'])
            ->assertJsonPath('result.growPercentage', 6.83);
    }

    public function test_statistic_by_3m_period()
    {
        $response = $this->getJson(route('statistic.period', ['period' => '3m']));

        $response->assertOk()
            ->assertJsonStructure(['success', 'title', 'result'])
            ->assertJsonPath('result.growPercentage', 4.89);
    }

    public function test_statistic_by_6m_period()
    {
        $response = $this->getJson(route('statistic.period', ['period' => '6m']));

        $response->assertOk()
            ->assertJsonStructure(['success', 'title', 'result'])
            ->assertJsonPath('result.growPercentage', 31);
    }

    public function test_statistic_by_tyd_period()
    {
        $response = $this->getJson(route('statistic.period', ['period' => 'tyd']));

        $response->assertOk()
            ->assertJsonStructure(['success', 'title', 'result'])
            ->assertJsonPath('result.growPercentage', 25.06);
    }

    public function test_statistic_by_1y_period()
    {
        $response = $this->getJson(route('statistic.period', ['period' => '1y']));

        $response->assertOk()
            ->assertJsonStructure(['success', 'title', 'result'])
            ->assertJsonPath('result.growPercentage', 31.64);
    }

    public function test_statistic_by_3y_period()
    {
        $response = $this->getJson(route('statistic.period', ['period' => '3y']));

        $response->assertOk()
            ->assertJsonStructure(['success', 'title', 'result'])
            ->assertJsonPath('result.growPercentage', 250.27);
    }

    public function test_statistic_by_5y_period()
    {
        $response = $this->getJson(route('statistic.period', ['period' => '5y']));

        $response->assertOk()
            ->assertJsonStructure(['success', 'title', 'result'])
            ->assertJsonPath('result.growPercentage', 489.04);
    }

    public function test_statistic_by_10y_period()
    {
        $response = $this->getJson(route('statistic.period', ['period' => '10y']));

        $response->assertOk()
            ->assertJsonStructure(['success', 'title', 'result'])
            ->assertJsonPath('result.growPercentage', 1062.82);
    }

    public function test_statistic_by_max_period()
    {
        $response = $this->getJson(route('statistic.period', ['period' => 'max']));

        $response->assertOk()
            ->assertJsonStructure(['success', 'title', 'result'])
            ->assertJsonPath('result.growPercentage', 2450.96);
    }
}
