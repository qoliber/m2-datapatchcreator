<?php
/**
 * Copyright © Qoliber. All rights reserved.
 *
 * @category    Qoliber
 * @package     Qoliber_DataPatchCreator
 * @author      Jakub Winkler <jwinkler@qoliber.com
 */

namespace Qoliber\DataPatchCreator\Controller\Adminhtml\Export;

class CatalogRule extends AbstractController
{
    /**
     * @inheritDoc
     */
    public function getDataIdentifiers(): array
    {
        return [
            'rule_id' => $this->getRequest()->getParam('rule_id')
        ];
    }
}
