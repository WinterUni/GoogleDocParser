<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use WinterUni\GoogleDoc\Validator\Html;

/**
 * Class HtmlTest
 *
 * @package Tests
 */
class HtmlTest extends TestCase
{
    /** @var Html */
    private $htmlValidator;

    /**
     * @return array
     */
    public function notValidElementsAmount(): array
    {
        return [
            [[1, 2], 1],
            [[], 1],
            [[1], 2],
            [[1, 2, 3]],
        ];
    }

    /**
     * @return array
     */
    public function validElementsAmount(): array
    {
        return [
            [[1, 2], 2],
            [[], 0],
            [[1], 1],
            [[1]],
        ];
    }

    protected function setUp()
    {
        parent::setUp();

        $this->htmlValidator = new Html();
    }

    /**
     * @param array $elementList
     * @param int $expectedAmount
     *
     * @dataProvider notValidElementsAmount
     */
    public function testValidateElementsAmountReturnFalse(
        array $elementList,
        int $expectedAmount = 1
    ): void {
        $validationResult = $this->htmlValidator->isValidElementsAmount($elementList, $expectedAmount);

        $this->assertFalse($validationResult);
    }

    /**
     * @param array $elementList
     * @param int $expectedAmount
     *
     * @dataProvider validElementsAmount
     */
    public function testValidateElementsAmountReturnTrue(
        array $elementList,
        int $expectedAmount = 1
    ): void {
        $validationResult = $this->htmlValidator->isValidElementsAmount($elementList, $expectedAmount);

        $this->assertTrue($validationResult);
    }
}