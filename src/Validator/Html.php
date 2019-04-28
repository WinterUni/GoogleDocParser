<?php

namespace WinterUni\GoogleDoc\Validator;

use WinterUni\GoogleDoc\Exception\ElementCountException;

/**
 * Class Html
 *
 * @package WinterUni\GoogleDoc\Validator
 */
class Html
{
    private const MESSAGE = 'There should be only %d %s element! Check your content!';

    /**
     * @param array  $elementList
     * @param string $element
     * @param int    $expectedAmount
     *
     * @return bool
     *
     * @throws ElementCountException
     */
    public function validateElementsAmount(array $elementList, string $element, int $expectedAmount = 1): bool
    {
        $message = sprintf(self::MESSAGE, $expectedAmount, $element);
        $actualAmount = count($elementList);

        if ($actualAmount < $expectedAmount || $actualAmount > $expectedAmount) {
            throw new ElementCountException($message);
        }

        return true;
    }
}