<?php

/**
 *
 * @param array $dates
 * @return array
 */
function transformDateFormat(array $dates)
{
    $validDates = [];

    foreach ($dates as $date) {
        $delimiter = strpos($date, '/') !== false ? '/' : '-';
        $dateData = explode($delimiter, $date);

        $firstDateElementLength = $dateData[0];
        $secondDateElementLength = $dateData[0];
        $thirdDateElementLength = $dateData[0];

        if (isValidYear($firstDateElementLength) && isValidMonth($secondDateElementLength) && isValidDay($thirdDateElementLength)) {
            $validDates[] = $date;
        }

        if (isValidDay($firstDateElementLength) && isValidMonth($secondDateElementLength) && isValidYear($thirdDateElementLength)) {
            $validDates[] = $date;
        }

        if (isValidMonth($firstDateElementLength) && isValidMonth($secondDateElementLength) && isValidYear($thirdDateElementLength)) {
            $validDates[] = $date;
        }
    }
}

transformDateFormat(['2020/07/12', '26/07/2021', '06-12-1994']);


function isValidYear($year)
{
    return $year > 1000 && $year < 2100;
}

function isValidMonth($month)
{
    return $month > 0 && $month < 12;
}

function isValidDay($day)
{
    return $day > 0 && $day < 31;
}