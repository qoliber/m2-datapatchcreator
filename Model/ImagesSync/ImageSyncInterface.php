<?php
/**
 * Copyright © Qoliber. All rights reserved.
 *
 * @category    Qoliber
 * @package     Qoliber_DataPatchCreator
 * @author      Jakub Winkler <jwinkler@qoliber.com
 * @author      Sebastian Strojwas <sstrojwas@qoliber.com>
 * @author      Wojciech M. Wnuk <wwnuk@qoliber.com>
 */
namespace Qoliber\DataPatchCreator\Model\ImagesSync;

interface ImageSyncInterface
{
    /**
     * Method to move / upload / push image to designated source
     */
    public function dumpImage(string $imagePath): void;

    /**
     * Gets Image from Sync Model
     */
    public function fetchImage(string $imagePath): void;
}
