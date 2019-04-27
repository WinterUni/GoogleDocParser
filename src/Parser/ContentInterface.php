<?php

namespace WinterUni\GoogleDoc\Parser;

interface ContentInterface
{
    /**
     * @param string $payload
     *
     * @return string
     */
    public function getBody(string $payload): string;

    /**
     * @param string $payload
     *
     * @return string
     */
    public function getTitle(string $payload): string;
}