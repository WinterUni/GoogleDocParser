<?php

namespace WinterUni\GoogleDoc\Validator;

use WinterUni\GoogleDoc\Exception\ElementCountException;

class Html
{
    /**
     * @param array $elementList
     * @param string $element
     * @param int $validAmount
     *
     * @return bool
     *
     * @throws ElementCountException
     */
    public function validateElementsAmount(array $elementList, string $element, int $validAmount = 1): bool
    {
        $exceptionMessage = 'There should be only ' . $validAmount . ' ' . $element . ' element! Check your content!';

        if (count($elementList) < $validAmount) {
            throw new ElementCountException($exceptionMessage);
        }

        if (count($elementList) > $validAmount) {
            throw new ElementCountException($exceptionMessage);
        }

        return true;
    }
}