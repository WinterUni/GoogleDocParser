<?php

namespace WinterUni\GoogleDoc\Scraper;

use Symfony\Component\DomCrawler\Crawler;
use WinterUni\GoogleDoc\Exception\ElementCountException;
use WinterUni\GoogleDoc\Filter\Body;
use WinterUni\GoogleDoc\Validator\Html as HtmlValidator;

/**
 * Class Html
 *
 * @package WinterUni\GoogleDoc\Scraper
 */
class Html implements ContentInterface
{
    /** @var HtmlValidator */
    private $validator;

    /** @var Body */
    private $bodyFilter;

    /**
     * HtmlContent constructor.
     *
     * @param HtmlValidator $validator
     * @param Body          $bodyFilter
     */
    public function __construct(HtmlValidator $validator, Body $bodyFilter)
    {
        $this->validator = $validator;
        $this->bodyFilter = $bodyFilter;
    }

    /**
     * @param string $payload
     * @param bool   $removeH1
     *
     * @return string
     */
    public function getBody(string $payload, bool $removeH1 = true): string
    {
        preg_match('/<body(.*?)>(.*?)<\/body>/', $payload, $matches);

        if (!array_key_exists(2, $matches)) {
            return '';
        }

        $body = $matches[2];

        if ($removeH1) {
            $body = $this->bodyFilter->removeH1($body);
        }

        return $body;
    }

    /**
     * @param string $payload
     * @param string $element
     * @param int    $expectedAmount
     *
     * @return string
     *
     * @throws ElementCountException
     */
    public function getTitle(string $payload, string $element = 'h1', $expectedAmount = 1): string
    {
        $headers = [];

        $crawler = new Crawler();
        $crawler->addHtmlContent($payload);

        $crawler->filter($element)->each(function (Crawler $node) use (&$headers) {
            $headers[] = $node->text();
        });

        if (empty($headers)) {
            return '';
        }

        if (!$this->validator->isValidElementsAmount($headers, $expectedAmount)) {
            throw new ElementCountException(
                'There should be only ' . count($headers) . $element . 'element! Check your content!'
            );
        }

        return $headers[0];
    }

    /**
     * @param string $payload
     *
     * @return string
     */
    public function getCustomStyle(string $payload): string
    {
        preg_match('/<style type="text\/css">(.*?)<\/style>/', $payload, $matches);

        if (!array_key_exists(1, $matches)) {
            return '';
        }

        return $matches[1];
    }
}