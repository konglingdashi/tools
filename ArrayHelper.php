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

            if (is_string($arr[$key])) {
                continue;
            } elseif (is_numeric($arr[$key])) {
                $arr[$key] = (string)$arr[$key];
            } elseif (is_bool($arr[$key])) {
                $arr[$key] = $arr[$key] ? 'true' : 'false';
            } elseif (is_array($arr[$key])) {
                $arr[$key] = self::toString($arr[$key]);
            } elseif (is_object($arr[$key])) {
                $arr[$key] = get_class($arr[$key]);
            } elseif (is_resource($arr[$key])) {
                $arr[$key] = 'resource of type (' . get_resource_type($arr[$key]) . ')';
            } else {
                $arr[$key] = (string)$arr[$key];
            }

        }//end of foreach

        return $arr;

    }//end of function

}//end of class
