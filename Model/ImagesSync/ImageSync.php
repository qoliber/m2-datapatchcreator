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

class ImageSync
{
    private const NO_SYNC_MODEL = 'NoSync';

    /*** @var ImageSyncInterface[] */
    protected $syncModels;

    public function __construct(
        array $syncModels
    ) {
        $this->syncModels = $syncModels;
    }

    /**
     * Gets sync objects
     *
     * @return array|ImageSyncInterface[]
     */
    public function getSyncModels(): array
    {
        return $this->syncModels;
    }

    /**
     * Get ImageSyncInterface
     *
     * @param string|null $syncModel
     */
    public function getSyncModel(?string $syncModel): ImageSyncInterface
    {
        if ($syncModel === null || $syncModel === ''
            || !is_array($this->syncModels)
            || $this->syncModels === []
            || !array_key_exists($syncModel, $this->syncModels)) {
            return $this->syncModels[self::NO_SYNC_MODEL];
        }

        return $this->syncModels[$syncModel];
    }
}
