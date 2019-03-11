# ⏱ Chrono

Helper to measure PHP code execution time.

## Motivation

Every time I need to benchmark something, I find myself re-inventing the wheel and do manual time calculations. This hurts my productivity. I wanted a simple little package that is very easy to use that I can go to whenever I need to measure execution time in PHP.

- Easy to remember (there are 9 methods, but you need only 2 to get what you need)
- Only static methods and variables (because having to instanciate an object)


## Installation

```shell
composer require angle/chrono
```

## Usage

For a more detailed overview, please have a look at the test suite (/tests/ChronoTest.php).

Basic usage:
```php
use Angle\Chrono;

Chrono::start();

// Do something...

echo Chrono::stop(); // 4.24
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

For a more friendly output, use the 'tell' method:
```php
Chrono::start();

print Chrono::tell();
```

## Credits

This implementation is inspired by [David Walsh](https://davidwalsh.name/php-timer-benchmark)

## Contributing

Improvements are welcome! Feel free to submit pull requests.

## Licence

MIT

Copyright © 2019 [Angle Software](https://angle.software)
