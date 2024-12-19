<?php
/**
 * Created with Qoliber_DataPatchCreator
 * @author      Jakub Winkler <jwinkler@qoliber.com>
 * @author      Sebastian Strojwas <sstrojwas@qoliber.com>
 * @author      Wojciech M. Wnuk <wwnuk@qoliber.com>
 *
 * @category    Qoliber
 * @package     Qoliber_DataPatchCreator
 */

use Magento\Framework\Component\ComponentRegistrar;

ComponentRegistrar::register(
    \Magento\Framework\Component\ComponentRegistrar::MODULE,
    'Qoliber_DataPatchCreator',
    __DIR__
);
