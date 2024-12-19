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

use Exception;
use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\App\Filesystem\DirectoryList;
use Magento\Framework\App\Response\Http\FileFactory;
use Magento\Framework\Exception\LocalizedException;
use Qoliber\DataPatchCreator\Model\Config\Source\ExportType;
use Qoliber\DataPatchCreator\Model\DataPatchExport\DataPatchExportInterface;

abstract class AbstractController extends Action
{
    /** @var DataPatchExportInterface  */
    protected $dataPatchExport;

    /** @var FileFactory */
    protected $fileFactory;

    /** @var ScopeConfigInterface  */
    protected $scopeConfig;

    public function __construct(
        ScopeConfigInterface $scopeConfig,
        FileFactory $fileFactory,
        Context $context,
        DataPatchExportInterface $dataPatchExport
    ) {
        $this->scopeConfig = $scopeConfig;
        $this->fileFactory = $fileFactory;
        $this->dataPatchExport = $dataPatchExport;
        parent::__construct($context);
    }

    /**
     * Gets identifiers
     */
    abstract public function getIdentifiers(): array;

    /**
     * @inheritDoc
     */
    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();

        $identifiersArray = $this->getIdentifiers();
        $patchesData = $this->dataPatchExport
            ->setMassExport(true)
            ->prepareMassPatches($identifiersArray);
        try {
            switch ($this->scopeConfig->getValue(ExportType::XPATH_EXPORT_TYPE)) {
                case ExportType::EXPORT_TYPE_DOWNLOAD: {
                    return $this->fileFactory->create(
                        $patchesData['fileName'],
                        $patchesData['content'],
                        DirectoryList::ROOT,
                        'application/zip'
                    );
                }
                case ExportType::EXPORT_TYPE_LOCAL_FILE: {
                    $this->messageManager->addSuccessMessage(
                        __(
                            '%1 Data Patch file(s) have been created, location: %2',
                            $patchesData['patchCount'],
                            $patchesData['patchLocation'],
                        )
                    );
                    $resultRedirect->setUrl($this->_redirect->getRefererUrl());
                    return $resultRedirect;
                }
                default: {
                    throw new LocalizedException(__('Unsupported export type'));
                }
            }
        } catch (LocalizedException|Exception $e) {
            $this->messageManager->addErrorMessage(
                __(
                    'Could not create a data patches, error: %1',
                    $e->getMessage(),
                )
            );
            $resultRedirect->setUrl($this->_redirect->getRefererUrl());
            return $resultRedirect;
        }
    }
}
