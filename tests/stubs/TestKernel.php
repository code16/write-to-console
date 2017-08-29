<?php

namespace Stubs;

class TestKernel extends \Illuminate\Foundation\Console\Kernel
{
    public function registerCommand($command)
    {
        $this->getArtisan()->add($command);
    }
}
