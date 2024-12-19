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

namespace Qoliber\DataPatchCreator\Model\Config\Source;

use Magento\Framework\Data\OptionSourceInterface;

class SyncMethods implements OptionSourceInterface
{
    /** @var int  */
    public const EXPORT_TYPE_DOWNLOAD = 0;

    /** @var int  */
    public const EXPORT_TYPE_LOCAL_FILE = 1;

    /**
     * @inheritDoc
     */
    public function toOptionArray(): array
    {
        return [
            ['value' => "LocalFile", 'label' => __('Copy images to designated folder')],
        ];
    }
}
