<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use WinterUni\GoogleDoc\Exception\ElementCountException;
use WinterUni\GoogleDoc\Validator\Html;

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
            [[1, 2], 'test_element', 1],
            [[], 'test_element', 1],
            [[1], 'test_element', 2],
            [[1, 2, 3], 'test_element'],
        ];
    }

    /**
     * @return array
     */
    public function validElementsAmount(): array
    {
        return [
            [[1, 2], 'test_element', 2],
            [[], 'test_element', 0],
            [[1], 'test_element', 1],
            [[1], 'test_element'],
        ];
    }

    protected function setUp()
    {
        parent::setUp();

        $this->htmlValidator = new Html();
    }

    /**
     * @param array $elementList
     * @param string $element
     * @param int $expectedAmount
     *
     * @dataProvider notValidElementsAmount
     *
     * @throws ElementCountException
     */
    public function testValidateElementsAmountThrowsExceptionIfElementsAmountInvalid(
        array $elementList,
        string $element,
        int $expectedAmount = 1
    ): void {
        $this->expectException(ElementCountException::class);

        $this->htmlValidator->validateElementsAmount($elementList, $element, $expectedAmount);
    }

    /**
     * @param array $elementList
     * @param string $element
     * @param int $expectedAmount
     *
     * @dataProvider validElementsAmount
     *
     * @throws ElementCountException
     */
    public function testValidateElementsAmountReturnTrueIfElementsAmountIsValid(
        array $elementList,
        string $element,
        int $expectedAmount = 1
    ): void {
        $validationResult = $this->htmlValidator->validateElementsAmount($elementList, $element, $expectedAmount);

        $this->assertTrue($validationResult);
    }
}