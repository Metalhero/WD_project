<?php

declare(strict_types=1);

namespace Tests\Support\Helper;

use Tests\Support\Enums\Core as FieldType;


// here you can define custom actions
// all public methods declared in helper class will be available in $I

class Acceptance extends \Codeception\Module
{

    function myFill(string $text, FieldType $type): void
    {
    //  TODO: text, textarea, suggestmenu, checkbox, radio, dropdown, date, time, datetime-local, email, number, password



    } // fill

    function myClick(string $text): void
    {
    //  TODO: click functionality

    } // click

    function myGetValue(string $text, FieldType $type): string
    {
    // TODO: Implement getValue functionality based on FieldType

    return 'value';
    }


} // end