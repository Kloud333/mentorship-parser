<?php

namespace app\src;


use app\src\Models\Movie;
use app\src\Parsers\ParserInterface;
use app\src\Transporters\TransportInterface;

class Scrapper
{
    public $transporter;
    public $parser;

    /**
     * Scrapper constructor.
     * @param TransportInterface $transporter
     * @param ParserInterface $parser
     */
    public function __construct(TransportInterface $transporter, ParserInterface $parser)
    {
        $this->transporter = $transporter;
        $this->parser = $parser;
    }

    /**
     * @param $url
     * @return Movie
     */
    public function get($url): Movie
    {
        $content = $this->transporter->get($url);
        return $this->parser->parse($content);
    }


}