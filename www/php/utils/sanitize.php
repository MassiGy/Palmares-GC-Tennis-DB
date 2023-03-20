<?php


/**
 * @description: sanitizer, allows us to to sanitize the REQUEST/RESPONSE objects, 
 * 
 * @param string $data, which is data to sanitize
 * @return string, which is the sanitized data.
 * 
 */
function sanitizer(string $data): string
{
    $data = htmlspecialchars($data);
    return $data;
}
