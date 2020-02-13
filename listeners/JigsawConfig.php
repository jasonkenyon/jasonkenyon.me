<?php

namespace App\Listeners;

use TightenCo\Jigsaw\Jigsaw;

class JigsawConfig
{
    public function handle(Jigsaw $jigsaw)
    {

        $jigsaw->writeSourceFile('_assets/data/config.json', $jigsaw->getConfig());

    }
}