<?php


function sanitizer(string $data): string
{
    $data = htmlspecialchars($data);
    return $data;
}
