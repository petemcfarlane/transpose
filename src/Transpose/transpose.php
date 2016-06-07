<?php

namespace Transpose;

/**
 * Transpose each item in an associative array, interchanging the row and column indexes
 *
 * @param array []
 *
 * @return array
 * @throws \InvalidArgumentException*
 */
function transpose(array $input)
{
    $values = array_values($input);

    foreach ($values as $value) {
        if (!is_array($value)) {
            throw new \InvalidArgumentException('Can only transpose multi-dimensional arrays.');
        }
    }

    return array_map(null, ...$values);
}
