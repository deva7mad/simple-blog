<?php

/**
 * @param $data
 *
 * @return bool
 */
function is_base64($data): bool
{
    $decoded_data = base64_decode($data, true);
    $encoded_data = base64_encode($decoded_data);
    return $encoded_data == $data;
}
