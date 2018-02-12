<?php

namespace AppBundle\Service;

interface FileMover
{
    /**
     * Move file to new path.
     *
     * @param $existingPath
     * @param $newPath
     *
     * @return bool
     */
    public function move($existingPath, $newPath);
}
