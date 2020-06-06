<?php
/**
 * Created by PhpStorm.
 * User: daniel
 * Date: 4/6/2020
 * Time: 14:17 PM
 */
class bank
{
    public $id;
    public $_IDRRef;
    public $_Code;
    public $_Description;
    public $_Fld1146;
    public $_Fld1147;
    public $_Fld1148;
    public $_Fld1149;


    /**
     * bank constructor.
     * @param $id
     * @param $_IDRRef
     * @param $_Code
     * @param $_Description
     * @param $_Fld1146
     * @param $_Fld1147
     * @param $_Fld1148
     * @param $_Fld1149

     */
    public function __construct($id, $_IDRRef, $_Code, $_Description,  $_Fld1146, $_Fld1147, $_Fld1148, $_Fld1149)
    {
        $this->id = $id;
        $this->_IDRRef = $_IDRRef;
        $this->_Code = $_Code;
        $this->_Description = $_Description;
        $this->_Fld1146 = $_Fld1146;
        $this->_Fld1147 = $_Fld1147;
        $this->_Fld1148 = $_Fld1148;
        $this->_Fld1149 = $_Fld1149;

    }
}
