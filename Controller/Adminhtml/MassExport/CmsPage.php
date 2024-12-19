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

namespace Qoliber\DataPatchCreator\Controller\Adminhtml\MassExport;

class CmsPage extends AbstractController
{
    /**
     * @inheritDoc
     */
    public function getIdentifiers(): array
    {
        $ids = $this->getRequest()->getParam('selected') ?? $this->dataPatchExport->getAllIdentifiers();
        $identifiersArray = [];
        foreach ($ids as $id) {
            $identifiersArray[] = [
                'page_id' => $id
            ];
        }

        return $identifiersArray;
    }
}
