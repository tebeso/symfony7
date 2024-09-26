<?php

namespace App;

use eftec\bladeone\BladeOne;
use Exception;

class Helpers
{
    /**
     * @param string $template
     * @param array  $data
     *
     * @return void
     *
     * @throws Exception
     */
    public function render(string $template, array $data = []): void
    {
        $views = __DIR__ . '/../templates';
        $cache = __DIR__ . '/../var/cache';
        $blade = new BladeOne($views, $cache, BladeOne::MODE_AUTO);

        echo $blade->run($template, $data);
    }
}