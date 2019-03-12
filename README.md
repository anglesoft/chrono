# ⏱ Chrono

The easiest way to measure PHP code execution time.

## Introduction

Every time I need to benchmark something, I find myself re-inventing the wheel and do manual time calculations. This hurts my productivity. I wanted a simple little package that is very easy to use that I can go to whenever I need to measure execution time in PHP.

- Easy to remember
- 100% tested
- Framework agnostic
- No dependencies

## Installation

```shell
composer require angle/chrono
```

## Documentation

This statement is implicitly used above any of the following examples:
```php
use Angle\Chrono;
```

The shortest way to benchmark your code is to use the benchmark method:
```php
echo Chrono::benchmark(function () {
    sleep(1);
});
```

Output:
```
Time: 1 second (1002 ms)
```

By default, it invokes the 'meter' method which pretty-prints the output. Optionally, you can pass a second parameter to invoke any available formatting methods (ms, seconds, minutes):
```php
echo Chrono::benchmark(function () {
    sleep(1);
}, 'ms');
```
Output:
```
1002
```

Manual usage:
```php
Chrono::start();

// Do something...

echo Chrono::stop(); // 2.42424242 (seconds)
```

To get formatted output, use the 'meter' method:
```php
Chrono::start();

// Compute stuff

echo Chrono::meter(); // Time: 0.42 seconds (4242 ms)
```

You can access elapsed time whenever you need, in various formats:
```php
echo Chrono::elapsed(); // 0.42424242
echo Chrono::seconds(); // 0.43
echo Chrono::ms(); // 4243
```

You can pause and resume the chronometer:
```php
Chrono::start();

sleep(1);

Chrono::pause();

sleep(3); // Will be ignored

Chrono::resume();

sleep(1);

print Chrono::meter(); // Time: 2 seconds (2001 ms)
```

If you are running many benchmarks, it may be a good idea to add a description to them:
```php
Chrono::describe('Query with joints');
Chrono::start();

// Run the query

print Chrono::meter();
```

Output:
```
Query with joints | 1.43 seconds (1424 ms)
```

Warning: if you prefer to use the shorthand benchmark method, make sure to call the describe method within your benchmark:
```php
Chrono::benchmark(function () {
    Chrono::describe('Task');

    // Do your thing
});
```

For a more detailed overview, please refer to the [test suite](https://github.com/anglesoft/chrono/blob/master/tests/ChronoTest.php).

## Credits

This implementation is inspired by [David Walsh](https://davidwalsh.name/php-timer-benchmark)'s timer class.

## Contributing

Improvements are welcome! Feel free to submit pull requests.

## Licence

MIT

Copyright © 2019 [Angle Software](https://angle.software)
