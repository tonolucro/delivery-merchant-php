<?php
namespace Tonolucro\Delivery\Merchant\Helper;

class Validator
{
    /**
     * @param $str
     * @return bool|false|int
     */
    public static function isUID($str){
        if(!is_string($str)){
            return false;
        }
        return preg_match("/^([a-z0-9]){32}$/", $str);
    }

    /**
     * @param $value
     * @return bool
     */
    public static function isID( $value )
    {
        return self::isInteger($value);
    }

    /**
     * @param $value
     * @return bool
     */
    public static function isInteger( $value )
    {
        return is_integer($value);
    }

    /**
     * @param $value
     * @return bool
     */
    public static function isBool( $value )
    {
        return is_bool($value);
    }

    /**
     * @param $value
     * @return bool
     */
    public static function isEmpty( $value )
    {
        return empty($value);
    }

    /**
     * @param string $data
     * @return bool
     */
    public static function isDate( $data )
    {

        //Valida: d/m/Y
        $expdata = '/^(([0-9]{1,2})\/([0-9]{1,2})\/([0-9]{4})){1}$/';

        if( preg_match($expdata, $data)){
            $a = explode("/", $data);
            return checkdate($a[1], $a[0], $a[2]);
        }

        //Valida: Y-m-d
        $expdata = '/^(([0-9]{4})\-([0-9]{1,2})\-([0-9]{1,2})){1}$/';

        if( preg_match($expdata, $data)){
            $a = explode("-", $data);
            return checkdate($a[1], $a[2], $a[0]);
        }

        return false;
    }
}