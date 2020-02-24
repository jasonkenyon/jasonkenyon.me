<?php

namespace App;

class GetJigsawConfig {

    public function get()
    {
        
        if (file_exists('source/_assets/data/config.json')) {
            return json_decode(file_get_contents('source/_assets/data/config.json'));
        }

        return false;
    }

}