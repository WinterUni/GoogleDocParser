<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use WinterUni\GoogleDoc\Validator\Html;

class HtmlTest extends TestCase
{
    /** @var Html */
    private $htmlValidator;

    protected function setUp()
    {
        parent::setUp();

        $this->htmlValidator = new Html();
    }

    public function testTest()
    {
        $this->assertFalse(true);
    }

    public function testTrueTest()
    {
        $this->assertTrue(true);
    }
}