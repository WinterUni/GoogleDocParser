<?php

namespace Tests;

use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use WinterUni\GoogleDoc\DocData;
use WinterUni\GoogleDoc\Parser\Html as HtmlParser;

class DocDataTest extends TestCase
{
    /** @var HtmlParser|MockObject */
    private $contentParser;

    /** @var string */
    private $docContent = 'test_string';

    protected function setUp()
    {
        parent::setUp();

        $this->contentParser = $this->getMockBuilder(HtmlParser::class)->disableOriginalConstructor()->getMock();
    }

    public function testGetTitle(): void
    {
        $docData = new DocData($this->docContent, $this->contentParser);
        $this->contentParser->expects($this->once())->method('getTitle')->willReturn($this->docContent);

        $title = $docData->getTitle();

        $this->assertEquals($this->docContent, $title);
    }

    public function testGetBody(): void
    {
        $docData = new DocData($this->docContent, $this->contentParser);
        $this->contentParser->expects($this->once())->method('getBody')->willReturn($this->docContent);

        $title = $docData->getBody();

        $this->assertEquals($this->docContent, $title);
    }

    public function testGetStyleReturnCustomStyleString(): void
    {
        $docData = new DocData($this->docContent, $this->contentParser);
        $this->contentParser->expects($this->once())->method('getCustomStyle')->willReturn($this->docContent);

        $title = $docData->getCustomStyle();

        $this->assertEquals($this->docContent, $title);
    }
}