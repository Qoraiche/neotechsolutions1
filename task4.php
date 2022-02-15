<?php

/**
 * @param array $dates
 * @return array
 */
function transformDateFormat(array $dates): array
{
    return preg_grep('/^(?:\d{4}\/\d{2}\/\d{2}|\d{2}\/\d{2}\/\d{4}|\d{2}-\d{2}-\d{4})$/i', $dates);
}

transformDateFormat(['2020/07/12', '26/07/2021', '06-12-1994', '897-987-879']); // ['2020/07/12', '26/07/2021', '06-12-1994']