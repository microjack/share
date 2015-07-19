<?php
/**
 * @author      wangjie
 * @email        1457252084@qq.com
 * @created     2015-05-31 16:00:20
 */
namespace Phalcon\Utils;

class ExtendedArray
{
    //Generate the random number of batches not repeated
    public static function array_rand($min, $max, $n) {
	$i = 0;
	$nums = array();
	while ($i < $n) {
		$x = mt_rand($min, $max);
		if (isset($nums[$x])) {
			break;
		}
		$nums[$x] = $x;
		$i ++;
	}
	shuffle($nums);
	return $nums;
    }



}