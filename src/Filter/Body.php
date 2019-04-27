<?php

namespace WinterUni\GoogleDoc\Filter;

use Symfony\Component\DomCrawler\Crawler;

class Body
{
    /**
     * @param string $payload
     *
     * @return string
     */
    public function removeH1(string $payload): string
    {
        $crawler = new Crawler();
        $crawler->addHtmlContent($payload);

        $crawler->filter('h1')->each(function (Crawler $crawler) {
            foreach ($crawler as $node) {
                $node->parentNode->removeChild($node);
            }
        });

        return $crawler->html();
    }
}