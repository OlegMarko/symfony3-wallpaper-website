<?php

namespace AppBundle\Service;

class WallpaperFilePathHelper
{
    /**
     * @var string
     */
    private $wallpaperFileDirectory;

    /**
     * WallpaperFilePathHelper constructor.
     *
     * @param string $wallpaperFileDirectory
     */
    public function __construct(string $wallpaperFileDirectory)
    {
        $this->wallpaperFileDirectory = $wallpaperFileDirectory;
    }

    public function getNewFilePath(string $newFileName)
    {
        return $this->wallpaperFileDirectory . $newFileName;
    }
}