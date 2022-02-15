<?php

/**
 * @param string $json
 * @return int
 */
function getViewCount(string $json)
{
    $json = json_decode($json);

    $totalVideosCount = 0;

    foreach ($json->videos as $video) {
        $totalVideosCount += $video->viewCount;
    }

    return $totalVideosCount;
}