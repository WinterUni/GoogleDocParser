<?php

namespace WinterUni\GoogleDoc;

use WinterUni\GoogleDoc\Parser\ContentInterface;
use WinterUni\GoogleDoc\Parser\CustomStyleInterface;

class DocData
{
    /** @var string */
    private $docContent;

    /** @var ContentInterface */
    private $contentParser;

    /**
     * ContentProvider constructor.
     *
     * @param string $docContent
     * @param ContentInterface $contentParser
     */
    public function __construct(string $docContent, ContentInterface $contentParser)
    {
        $this->docContent = $docContent;
        $this->contentParser = $contentParser;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->contentParser->getTitle($this->docContent);
    }

    /**
     * @return string
     */
    public function getBody(): string
    {
        return $this->contentParser->getBody($this->docContent);
    }

    /**
     * @return string
     */
    public function getCustomStyle(): string
    {
        if ($this->contentParser instanceof CustomStyleInterface) {
            return $this->contentParser->getCustomStyle($this->docContent);
        }

        return '';
    }
}