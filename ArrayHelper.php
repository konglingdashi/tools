<?php
/**
 * Created by PhpStorm.
 * User: chaozhi.guo@jince.com
 * Date: 2017/2/15
 * Time: 17:21
 * 数组帮助类
 */
class ArrayHelper
{
    /**
     * 递归将数组里边所有元素都变为字符串(键不会修改)
     * 其中Object、Resource参考下面链接
     * @see  http://php.net/manual/zh/language.types.string.php#language.types.string.casting
     * @param array $arr
     * @return array
     */
    public static function toString(array $arr)
    {

        foreach ($arr as $key => $value) {

            if (is_string($value)) {
                continue;
            } elseif (is_numeric($value)) {
                $arr[$key] = (string)$value;
            } elseif (is_bool($value)) {
                $arr[$key] = $value? 'true' : 'false';
            } elseif (is_array($value)) {
                $arr[$key] = self::toString($value);
            } elseif (is_object($value)) {
                $arr[$key] = get_class($value);
            } elseif (is_resource($value)) {
                $arr[$key] = 'resource of type (' . get_resource_type($value) . ')';
            } else {
                $arr[$key] = (string)$value;
            }

        }//end of foreach

        return $arr;

    }//end of function

}//end of class
