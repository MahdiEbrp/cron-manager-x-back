<?php
/**
 * Encode the provided data as a JSON string with Unicode characters unescaped.
 *
 * This function takes an input data structure (array, object, scalar value, etc.)
 * and encodes it into a JSON string format. The resulting JSON string will have
 * Unicode characters unescaped, meaning they will be represented as-is without
 * any additional escaping.
 *
 * @param mixed $data The data to be encoded as JSON.
 *
 * @return string The JSON representation of the provided data with Unicode characters unescaped.
 */
function ___json_unescape_encode($data)
{
    return json_encode($data, JSON_UNESCAPED_UNICODE);
}


