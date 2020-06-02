<?php

function formatString(string $stringToFormat, bool $toUpper) {
    if($toUpper === true) {
       $stringToFormat = mb_convert_case(trim(htmlspecialchars($stringToFormat)), MB_CASE_UPPER, 'UTF-8');
    } else {
        $stringToFormat = trim(htmlspecialchars($stringToFormat));
    }
    return $stringToFormat;
}
