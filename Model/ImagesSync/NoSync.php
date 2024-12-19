<?php
/**
 * Copyright © Qoliber. All rights reserved.
 *
 * @category    Qoliber
 * @package     Qoliber_DataPatchCreator
 * @author      Jakub Winkler <jwinkler@qoliber.com
 * @author      Sebastian Strojwas <sstrojwas@qoliber.com>
 * @author      Wojciech M. Wnuk <wwnuk@qoliber.com>
 * @author      Lukasz Owczarczuk <lukasz@qoliber.com>
 */

namespace Qoliber\DataPatchCreator\Model\ImagesSync;

class NoSync implements ImageSyncInterface
{
    /**
     * @inheritDoc
     */
    public function dumpImage(string $imagePath): void
    {
    }

    /**
     * @inheritDoc
     */
    public function fetchImage(string $imagePath): void
    {
    }
}
