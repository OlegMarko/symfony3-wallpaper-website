<?php

namespace AppBundle\Event\Listener;

use AppBundle\Entity\Wallpaper;
use AppBundle\Service\FileMover;
use AppBundle\Service\WallpaperFilePathHelper;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Event\PreUpdateEventArgs;

class WallpaperUploadListener
{
    /**
     * @var FileMover
     */
    private $fileMover;

    /**
     * @var WallpaperFilePathHelper
     */
    private $wallpaperFilePathHelper;

    /**
     * WallpaperUploadListener constructor.
     *
     * @param FileMover $fileMover
     * @param WallpaperFilePathHelper $wallpaperFilePathHelper
     */
    public function __construct(
        FileMover $fileMover,
        WallpaperFilePathHelper $wallpaperFilePathHelper
    ) {
        $this->fileMover = $fileMover;
        $this->wallpaperFilePathHelper = $wallpaperFilePathHelper;
    }

    public function prePersist(LifecycleEventArgs $eventArgs)
    {
        $entity = $eventArgs->getEntity();

        if (false === $entity instanceof Wallpaper) {
            return false;
        }

        /**
         * @var $entity Wallpaper
         */

        $file = $entity->getFile();

        $temporaryLocation = $file->getPathname();
        $newFileLocation = $this->wallpaperFilePathHelper->getNewFilePath(
            $file->getClientOriginalName()
        );

        $this->fileMover->move($temporaryLocation, $newFileLocation);

        [
            0 => $width,
            1 => $height
        ] = getimagesize($newFileLocation);

        $entity
            ->setFilename(
                $file->getClientOriginalName()
            )
            ->setWidth($width)
            ->setHeight($height)
        ;

        return true;
    }

    public function preUpdate(PreUpdateEventArgs $eventArgs)
    {
    }
}