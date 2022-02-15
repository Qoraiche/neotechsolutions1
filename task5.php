<?php
function countMinNumberOfCrates(int $itemsCount, int $largePackagesAvailable, int $smallPackagesAvailable)
{
    $large = min([floor($itemsCount / 5), $largePackagesAvailable]);
    $small = min([$itemsCount - $large * 5, $smallPackagesAvailable]);

    return ($large * 5 + $small === $itemsCount) ? $large + $small : -1;
}

echo countMinNumberOfCrates(16, 2, 10);