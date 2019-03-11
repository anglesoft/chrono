<?php

use PHPUnit\Framework\TestCase;

use Angle\Chrono;

class ChronoTest extends TestCase
{
    /** @test */
    public function canStartAndStopChronometer()
    {
        Chrono::start();

        sleep(1);

        $elapsed = Chrono::stop();

        $this->assertTrue($elapsed >= 1.00 && $elapsed <= 1.01);
    }

    /** @test */
    public function canPauseAndResumeChronometer()
    {
        Chrono::start();
        Chrono::pause();

        sleep(1);

        Chrono::resume();

        $this->assertTrue(Chrono::stop() <= 1.00);
    }

    /** @test */
    public function canAccessElapsedTime()
    {
        Chrono::start();

        $before = Chrono::elapsed();

        $this->assertTrue($before >= 0.00 && $before <= 1.00);

        sleep(1);

        $after = Chrono::elapsed();

        $this->assertTrue($after >= 1.00 && $after <= 2.00);
    }

    /** @test */
    public function itReturnsSeconds()
    {
        Chrono::start();

        sleep(1);

        $seconds = Chrono::seconds($decimals = 2);

        $this->assertTrue($seconds >= 1.00 && $seconds <= 1.01);
    }

    /** @test */
    public function itReturnsMinutes()
    {
        Chrono::start();

        sleep(1);

        $minutes = Chrono::minutes(2);

        $this->assertTrue($minutes >= 0.01 && $minutes <= 0.02);
    }

    /** @test */
    public function itCanTellTime()
    {
        Chrono::start();

        $string = Chrono::meter();

        $this->assertTrue(strpos($string, 'Time: 0 second') === 0);
    }
}
