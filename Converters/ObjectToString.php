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

namespace Qoliber\DataPatchCreator\Converters;

class ObjectToString
{
    /**
     * Update var_export to php5.6 array notation
     */
    private function _updateArrayNotation(string $exportedVariable): string
    {
        $newNotation = preg_replace("/^([ ]*)(.*)/m", '$1$1$2', $exportedVariable);
        $array = preg_split("/\r\n|\n|\r/", $newNotation);
        $array = preg_replace(
            ["/\s*array\s\($/", "/\)(,)?$/", "/\s=>\s$/", '/\bNULL\b/'],
            [null, ']$1', ' => [' , 'null'],
            $array
        );
        return implode(PHP_EOL, array_filter(["["] + $array));
    }

    /**
     * Add spaces to exported string, first row without indent
     */
    private function _indent(string $str, int $spaces): string
    {
        $parts = array_filter(explode("\n", $str));
        $firstRow = $parts[0];
        $parts = array_map(static function ($part) use ($spaces) {
            return str_repeat(' ', $spaces) . $part;
        }, array_splice($parts, 1));
        return implode("\n", array_merge([$firstRow], $parts));
    }

    /**
     * Converts DataArray to php5.6 array notation with indent
     */
    public function convertDataArrayToString(array $array, int $spaces = 12): string
    {
        return $this->_indent($this->_updateArrayNotation(var_export($array, true)), $spaces);
    }
}
