<?php
/**
 * Copyright © Q-Solutions Studio: eCommerce Nanobots. All rights reserved.
 *
 * @category    Nanobots
 * @package     Nanobots_DataPatchCreator
 * @author      Jakub Winkler <jwinkler@qsolutionsstudio.com>
 */

namespace Nanobots\DataPatchCreator\Block\Adminhtml\Product\Attribute\Button;

use Magento\Cms\Block\Adminhtml\Page\Edit\GenericButton;
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
        if ($pageId = $this->getPageId()) {
            $data = [
                'label' => __('Export To DataPatch'),
                'on_click' => sprintf(
                    "location.href = '%s?page_id=%s';",
                    $this->getUrl('dataPatchCreator/export/cmsPage'),
                    $pageId
                ),
                'class' => 'action-secondary export-to-data-patch',
                'sort_order' => 100
            ];
        }
        return $data;
    }
}
