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

namespace Qoliber\DataPatchCreator\Controller\Adminhtml\Export;

class ProductAttribute extends AbstractController
{
    /**
     * @inheritDoc
     */
    public function getDataIdentifiers(): array
    {
        return ['attribute_id' => (int)$this->getRequest()->getParam('attribute_id')];
    }
}
