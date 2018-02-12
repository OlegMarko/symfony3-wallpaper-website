<?php

namespace AppBundle\Service;

use Symfony\Component\Filesystem\Filesystem;

class LocalFilesystemFileMover implements FileMover
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

    /**
     * Move file to new path.
     *
     * @param $existingPath
     * @param $newPath
     *
     * @return bool
     */
    public function move($existingPath, $newPath)
    {
        $this->filesystem->rename($existingPath, $newPath);

        return true;
    }
}
