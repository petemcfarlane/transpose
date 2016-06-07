<?php

use function PeteMc\Transpose\transpose;

class TransposeTest extends PHPUnit_Framework_TestCase
{
    public function testCanTransposeASimpleArray()
    {
        $input = [
            [1, 2, 3],
            [4, 5, 6],
            [7, 8, 9],
        ];

        $expected = [
            [1, 4, 7],
            [2, 5, 8],
            [3, 6, 9],
        ];

        assertEquals($expected, transpose($input));
    }

    public function testCanTransposeAnAssociativeArray()
    {
        $input = [
            'names' => ['adam', 'ben', 'claire'],
            'ages' => [24, 32, 52],
            'emails' => ['adam@example.com', 'ben@example.com', 'claire@example.com'],
        ];

        $expected = [
            ['adam', 24, 'adam@example.com'],
            ['ben', 32, 'ben@example.com'],
            ['claire', 52, 'claire@example.com'],
        ];

        assertEquals($expected, transpose($input));
    }

    public function testCanTransposeArraysOfDifferentLengthsFillingWithNulls()
    {
        $input = [
            ['a', 'b', 'c', 'd'],
            ['apple', 'box', 'car'],
        ];

        $expected = [
            ['a', 'apple'],
            ['b', 'box'],
            ['c', 'car'],
            ['d', null],
        ];

        assertEquals($expected, transpose($input));
    }

    public function testCanFillAnEmptyArrayWithNulls()
    {
        $input = [
            ['a', 'b', 'c', 'd'],
            [],
        ];

        $expected = [
            ['a', null],
            ['b', null],
            ['c', null],
            ['d', null],
        ];

        assertEquals($expected, transpose($input));
    }

    public function testCanTransposeArraysOfArrays()
    {
        $input = [
            [1, 2, 3],
            [4, 5, ['foo', 'bar']],
            [7, 8, 9],
        ];

        $expected = [
            [1, 4, 7],
            [2, 5, 8],
            [3, ['foo', 'bar'], 9],
        ];

        assertEquals($expected, transpose($input));
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testItThrowsAnInvalidArgumentIfGivenAnythingButAMultiDimensionalArray()
    {
        transpose([1, 2, 3]);
    }
}
