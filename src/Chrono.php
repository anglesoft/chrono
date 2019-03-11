<?php

namespace Angle;

class Chrono
{
    /** @var float */
    public static $start = 0, $pause = 0;

    /**
     * Starts the timer.
     */
    public static function start(): void
    {
        static::clear();

        static::$start = static::now();
        static::$pause = 0;
    }

    /**
     * Pauses the timer.
     */
    public static function pause(): void
    {
        static::$pause = static::now();
    }

    /**
     * Restarts the timer.
     */
    public static function resume(): void
    {
        static::$start += static::now() - static::$pause;
        static::$pause = 0;
    }

    /**
     * Stops the timer and returns elapsed time.
     */
    public static function stop(): float
    {
        $elapsed = static::elapsed();

        static::clear();

        return $elapsed;
    }

    /**
     * Clears the timer.
     */
    public static function clear(): void
    {
        static::$start = static::$pause = 0;
    }

    /**
     * Returns precised elapsed time (in seconds).
     * @param  integer $decimals
     */
    public static function elapsed(int $decimals = 8): float
    {
        return round((static::now() - static::$start), $decimals);
    }

    /**
     * Returns elapsed time in seconds.
     * @param  integer $decimals
     */
    public static function seconds(int $decimals = 2): float
    {
        return static::elapsed($decimals);
    }

    /**
     * Returns elapsed time in milliseconds.
     * @param  integer $decimals
     */
    public static function ms(int $decimals = 0): float
    {
        return round((static::elapsed() * 1000), $decimals);
    }

    /**
     * Alias of elapsed.
     * @param  integer $decimals
     */
    public static function minutes(int $decimals = 8): float
    {
        return round((static::seconds() / 60), $decimals);
    }

    /**
     * Creates a humanly readable sentence.
     */
    public static function meter(int $decimals = 2): string
    {
        $string = 'Time: ';

        $seconds = static::seconds($decimals);

        $string .= $seconds;
        $string .= $seconds > 1 ? ' seconds' : ' second';

        $ms = static::ms();

        $string .= ' ('.$ms.' ms)';
        $string .= "\n";

        return $string;
    }

    /**
     * Get current time.
     */
    private static function now(): float
    {
        list($usec, $sec) = explode(' ', microtime());

        return (float) $usec + (float) $sec;
    }
}
