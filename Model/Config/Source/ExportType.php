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

class ExportType implements OptionSourceInterface
{
    /** @var int  */
    public const EXPORT_TYPE_DOWNLOAD = 0;

    /** @var int  */
    public const EXPORT_TYPE_LOCAL_FILE = 1;

    /** @var string  */
    public const XPATH_EXPORT_TYPE = 'qoliber_datapatchcreator/export/type';

    /**
     * @inheritDoc
     */
    public function toOptionArray(): array
    {
        return [
            ['value' => self::EXPORT_TYPE_DOWNLOAD, 'label' => __('Download dataPatch files')],
            ['value' => self::EXPORT_TYPE_LOCAL_FILE, 'label' => __('Save file(s) locally')]
        ];
    }
}
