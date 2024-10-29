<?php

namespace App\Controller;

use App\Service\HomeownerParser;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class HomeownerController extends AbstractController
{
    private $parser;

    public function __construct(HomeownerParser $parser)
    {
        $this->parser = $parser;
    }

    public function parseHomeowners(): Response
    {
        $filename = '/Users/danish/Downloads/homeowners.csv';
        $people = $this->parser->parseCsv($filename);

        return $this->json($people);
    }
}
