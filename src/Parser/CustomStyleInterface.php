<?php

namespace WinterUni\GoogleDoc\Parser;

interface CustomStyleInterface
{
    /**
     * @param string $payload
     *
     * @return string
     */
    public function getCustomStyle(string $payload): string;
}