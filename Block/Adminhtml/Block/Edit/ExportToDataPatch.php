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

namespace Qoliber\DataPatchCreator\Block\Adminhtml\Block\Edit;

use Magento\Cms\Block\Adminhtml\Block\Edit\GenericButton;
use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

/**
 * Class DeleteButton
 */
class ExportToDataPatch extends GenericButton implements ButtonProviderInterface
{
    /**
     * @inheritDoc
     */
    public function getButtonData(): array
    {
        $data = [];
        if ($blockId = $this->getBlockId()) {
            $data = [
                'label' => __('Export To DataPatch'),
                'on_click' => sprintf("location.href = '%s?block_id=%s';", $this->getBackUrl(), $blockId),
                'class' => 'action-secondary export-to-data-patch',
                'sort_order' => 100
            ];
        }

        return $data;
    }

    public function getBackUrl(): string
    {
        return $this->getUrl('dataPatchCreator/export/cmsBlock');
    }
}
