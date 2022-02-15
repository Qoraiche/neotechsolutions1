<?php


/**
 * Validation function
 * the function accepts a username and returns true if it passes the implemented criteria or false if it does not pass.
 *
 * @param string $username
 * @return bool
 */
function validateUsername(string $username): bool
{
    return preg_match('/^(?=[a-zA-Z0-9_]{4,}$)(?!.*[_]{2})[^_].*[^_]$/i', $username);
}

/**
 * var_dump(validateUsername('yassine')); //bool(true)
 * var_dump(validateUsername('yas sine')); // bool(false)
 * var_dump(validateUsername('yas_sine')); // bool(true)
 * var_dump(validateUsername('yas_sine_')); // bool(false)
 * var_dump(validateUsername('yas')); // bool(false)
 */