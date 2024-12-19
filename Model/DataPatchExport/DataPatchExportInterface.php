<?php
/**
 * Copyright © Qoliber. All rights reserved.
 *
 * @category    Qoliber
 * @package     Qoliber_DataPatchCreator
 * @author      Jakub Winkler <jwinkler@qoliber.com>
 */

namespace Qoliber\DataPatchCreator\Model\DataPatchExport;

interface DataPatchExportInterface
{
    /**
     * Sets Identifies in data processing
     *
     * @return $this
     */
    public function setDataIdentifiers(array $dataIdentifiers): self;

    /**
     * Gets an Object identifiers
     */
    public function getIdentifier(): string;

    /**
     * Prepares array from an object which will be passed to template variables
     */
    public function prepareObjectArray(): array;

    /**
     * Creates a single DataPatch File
     */
    public function prepareDataPatch(): array;

    /**
     * Return a DataPatch File name based on object class and Identifiers
     */
    public function getDataPatchClassName(): string;

    /**
     * Sets Mass Export
     *
     * @return $this
     */
    public function setMassExport(bool $massExport): self;

    /**
     * Is Mass export set
     */
    public function isMassExport(): bool;

    /**
     * Prepare Mass Patch files / zip package and return file array
     */
    public function prepareMassPatches(array $patchIds): array;

    /**
     * Get all Identifiers (IDs) for data pach
     */
    public function getAllIdentifiers(): array;
}
