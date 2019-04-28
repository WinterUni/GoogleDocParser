<?php

namespace Tests;

use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use WinterUni\GoogleDoc\Document;
use WinterUni\GoogleDoc\Scraper\Html as HtmlScraper;

class DocumentTest extends TestCase
{
    /** @var HtmlScraper|MockObject */
    private $contentScraper;

    /** @var string */
    private $docContent = 'test_string';

    protected function setUp()
    {
        parent::setUp();

        $this->contentScraper = $this->getMockBuilder(HtmlScraper::class)->disableOriginalConstructor()->getMock();
    }

    public function testGetTitle(): void
    {
        $document = new Document($this->docContent, $this->contentScraper);
        $this->contentScraper->expects($this->once())->method('getTitle')->willReturn($this->docContent);

        $title = $document->getTitle();

        $this->assertEquals($this->docContent, $title);
    }

    public function testGetBody(): void
    {
        $document = new Document($this->docContent, $this->contentScraper);
        $this->contentScraper->expects($this->once())->method('getBody')->willReturn($this->docContent);

        $title = $document->getBody();

        $this->assertEquals($this->docContent, $title);
    }

    public function testGetStyleReturnCustomStyleString(): void
    {
        $document = new Document($this->docContent, $this->contentScraper);
        $this->contentScraper->expects($this->once())->method('getCustomStyle')->willReturn($this->docContent);

        $title = $document->getCustomStyle();

        $this->assertEquals($this->docContent, $title);
    }
}