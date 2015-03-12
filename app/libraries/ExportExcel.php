<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of Export AS Excel
 *
 * @package     Library
 * @author      Eftakhairul Islma <eftakhairul@gmail.com>
 * @website     http://eftakhairul.com
 */
class ExportExcel
{
    function xlsBOF()
    {
        echo pack("ssssss", 0x809, 0x8, 0x0, 0x10, 0x0, 0x0);
        return;
    }
    function xlsEOF()
    {
        echo pack("ss", 0x0A, 0x00);
        return;
    }
    function xlsWriteNumber($Row, $Col, $Value)
    {
        echo pack("sssss", 0x203, 14, $Row, $Col, 0x0);
        echo pack("d", $Value);
        return;
    }
    function xlsWriteLabel($Row, $Col, $Value )
    {
        $L = strlen($Value);
        echo pack("ssssss", 0x204, 8 + $L, $Row, $Col, 0x0, $L);
        echo $Value;
        return;
    }
}