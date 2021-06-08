<?php

namespace kleczewsky\kwCyfra;

/**
 * Class with helpers for KW identification.
 */
class Generator
{
    /**
     * Get a control number calculated for given KW.
     *
     * @return int Control Number
     */
    public static function getControl(string $department, int $number)
    {
        if (4 !== strlen($department)) {
            return false;
        }

        if (99999999 < $number || $number < 1) {
            return false;
        }

        return Generator::calculateControl($department, $number);
    }

    private static function calculateControl(string $department, int $number)
    {
        $controlNumber = 0;

        $department = strtoupper($department);

        $alphabet = 'ABCDEFGHIJKLMNOPRSTUWYZ';
        $weightsMap = [1, 3, 7, 1, 3, 7, 1, 3, 7, 1, 3, 7];

        // add departament character values to the control number sum
        for ($i = 0; $i < 4; ++$i) {
            $characterPos = strpos($alphabet, substr($department, $i, 1));

            if (false === $characterPos) {
                $controlNumber += strval(substr($department, 2, 1)) * $weightsMap[$i];

                continue;
            }

            $controlNumber += ($characterPos + 1) * $weightsMap[$i];
        }

        // convert the number to a 8 character string with leading zeros
        $numberString = strval($number);

        for ($i = strlen($numberString); $i < 8; ++$i) {
            $numberString = '0'.$numberString;
        }

        // for each number in string add its value * weight to the sum
        for ($i = 0; $i < 8; ++$i) {
            $controlNumber += intval($numberString[$i], 10) * $weightsMap[$i + 4];
        }

        return $controlNumber % 10;
    }
}
