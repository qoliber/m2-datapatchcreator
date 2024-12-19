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

namespace Qoliber\DataPatchCreator\Block\System\Config;

use Magento\Backend\Block\Widget\Button;
use Magento\Framework\View\Element\AbstractBlock;

class Edit extends \Magento\Config\Block\System\Config\Edit
{
    /**
     * @inheritDoc
     */
    protected function _prepareLayout(): AbstractBlock
    {
        if ($section = $this->getRequest()->getParam('section')) {
            $storeId = $this->getRequest()->getParam('store') ?? 0;
            $this->getToolbar()->addChild(
                'export_to_data_patch',
                Button::class,
                [
                    'id' => 'export_to_data_patch',
                    'label' => __('Export To DataPatch'),
                    'class' => 'action-secondary export_to_data_patch',
                    'on_click' => sprintf(
                        "location.href = '%s?section=%s&store=%s';",
                        $this->getBackUrl(),
                        $section,
                        $storeId
                    )
                ]
            );
        }

        return parent::_prepareLayout();
    }

    /**
     * @inheritDoc
     */
    protected function getBackUrl(): string
    {
        return $this->getUrl('dataPatchCreator/export/configuration');
    }
}
