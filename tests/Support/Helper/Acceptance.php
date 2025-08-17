<?php

declare(strict_types=1);

namespace Tests\Support\Helper;

use Codeception\Module\WebDriver;
use Tests\Support\Enums\FieldTypes as Type;



class Acceptance extends \Codeception\Module
{
    /**
     * Returns the WebDriver module instance.
     */
    private function web(): WebDriver
    {
        $web = $this->getModule('WebDriver');
        return $web;
    }





    /**
     * Summary of myFill
     * @param string $labelOrPlaceholder - The label or placeholder text of the field to fill
     * @param string $value - The value to fill in the field
     * @param \Tests\Support\Enums\FieldTypes $type
     */
    function myFill(string $labelOrPlaceholder, string $value, Type $type): void
    {
        switch ($type) {

            case Type::TEXT:
                $xPathText = "//input[@type=\"text\" and (@placeholder=\"{$labelOrPlaceholder}\") 
                or (//label[normalize-space()=\"{$labelOrPlaceholder}\"]/following-sibling::input)]";
                $this->web()->fillField($xPathText, $value);
                break;

            case Type::TEXTAREA:
                $xPathTextarea = "//label[normalize-space()=\"{$$labelOrPlaceholder}\"]/following-sibling::textarea";
                $this->web()->fillField($xPathTextarea, $value);
                break;
        } // switch


    } // fill

    /**
     * Summary of myClick
     * @param string $value - The button value attribute (e.g., "Login")
     * @param int $index - How many such buttons to select (1 = first)
     */
    function myClick(string $value, int $index = 1): void
    {
        // Lets check if the button with the given value exists
        $this->web()->waitForElementClickable('.btn', 20);

        // Set the XPath for the button
        $xpath = "//*[contains(@class,\"btn\") and normalize-space(text())=\"{$value}\"]";

        // If index is greater than 1, select the N-th occurrence
        if ($index > 1) {
            $xpath = "(" . $xpath . ")" . "[{$index}]";
        }

        // Click the button using XPath
        $this->web()->click($xpath);
    } // click

    function myGetValue(string $text, Type $type): string
    {
        // TODO: Implement getValue functionality based on FieldType

        return 'value';
    }
} // end