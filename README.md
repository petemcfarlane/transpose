[![Build Status](https://travis-ci.org/petemcfarlane/transpose.svg?branch=v1.0.0)](https://travis-ci.org/petemcfarlane/transpose)
[![Latest Stable Version](https://poser.pugx.org/transpose/transpose/v/stable)](https://packagist.org/packages/transpose/transpose)
[![License](https://poser.pugx.org/transpose/transpose/license)](https://packagist.org/packages/transpose/transpose)

# transpose

Adds transpose function for multi-dimensional arrays, interchanging row/column indices.

## Example 1

```php
<?php

use function Transpose\transpose;

$input = [
    'names' => ['adam', 'ben', 'claire'],
    'ages' => [24, 32, 52],
    'emails' => ['adam@example.com', 'ben@example.com', 'claire@example.com'],
];

$transposed = transpose($input);

/*
$transposed is equal to
[
    ['adam', 24, 'adam@example.com'],
    ['ben', 32, 'ben@example.com'],
    ['claire', 52, 'claire@example.com'],
];
*/
```

