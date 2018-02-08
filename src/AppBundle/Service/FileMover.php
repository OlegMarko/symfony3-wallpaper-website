<?php

namespace AppBundle\Service;

use Symfony\Component\Filesystem\Filesystem;

class FileMover
{
    /**
     * @var Filesystem
     */
    private $filesystem;

    /**
     * FileMover constructor.
     *
     * @param Filesystem $filesystem
     */
    public function __construct(Filesystem $filesystem)
    {
        $this->filesystem = $filesystem;
    }

    public function move($argument1, $argument2)
    {
        $this->filesystem->rename($argument1, $argument2);

        return true;
    }
}
