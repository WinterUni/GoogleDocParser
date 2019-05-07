<?php

namespace WinterUni\GoogleDoc\Validator;

/**
 * Class Html
 *
 * @package WinterUni\GoogleDoc\Validator
 */
class Html
{
    /**
     * @param array $elementList
     * @param int   $expectedAmount
     *
     * @return bool
     */
    public function isValidElementsAmount(array $elementList, int $expectedAmount = 1): bool
    {
        return count($elementList) === $expectedAmount;
    }
}