<?php
class CStringUtil
{
/* 字符串处理类 */
public static function _U($str)
{
    return iconv("gb2312","utf-8",$str);
}
// 取两串间字符串,如果$end省略，返回到末尾部分
public static function segment( $str, $begin, $end = '')
{
        $pos = strpos( $str, $begin);
        if( $pos === false)
                return "";
        $next_pos = $pos + strlen($begin);
        if ( $end == '')
                return substr( $str, $next_pos);
        $epos = strpos( $str, $end, $next_pos );
        if ( $epos === false)
                return substr( $str, $next_pos);
        return substr( $str, $next_pos, $epos - $next_pos);
}

// segment的不区分大小写
public static function segmenti( $str, $begin, $end = '')
{
        $pos = strpos( $str, $begin);
        if( $pos === false)
                return "";
        $next_pos = $pos + strlen($begin);
        if ( $end == '')
                return substr( $str, $next_pos);
        $epos = strpos( $str, $end, $next_pos );
        if ( $epos === false)
                return substr( $str, $next_pos);
        return substr( $str, $next_pos, $epos - $next_pos);
}

// 返回串间数组，例如<li>a1</li><li>a2</li>...
public static function segs($str, $begin, $end)
{
        $tmp = array();
        $offset = 0;
        $len = strlen($str);
        while( true )
        {
            $pos = strpos($str, $begin, $offset);
            if( $pos === false) break;

            $spos = $pos +  strlen($begin);
            if($spos >= $len) break;

            $epos = strpos($str, $end, $spos);
            if( $epos === false) break;

            $tmp[] = substr($str, $spos, $epos - $spos);
            $offset = $epos + strlen($end);
            if( $offset >= $len) break;
        }
        return $tmp;
}

// segs不区分大小写版本
public static function segsi($str, $begin, $end)
{
        $tmp = array();
        $offset = 0;
        $len = strlen($str);
        while( true )
        {
            $pos = stripos($str, $begin, $offset);
            if( $pos === false) break;

            $spos = $pos +  strlen($begin);
            if($spos >= $len) break;

            $epos = stripos($str, $end, $spos);
            if( $epos === false) break;

            $tmp[] = substr($str, $spos, $epos - $spos);
            $offset = $epos + strlen($end);
            if( $offset >= $len) break;
        }
        return $tmp;
}

// 左边部分
public static function left( $str, $sep)
{
        $pos = strpos($str, $sep);
        if( $pos === false)
                return '';
        return substr( $str, 0, $pos);
}

// 右边部分，最多$max个
public static function right2( $str, $sep, $max)
{
        $pos = strrpos($str, $sep);
        if( $pos === false)
                return "";
        return substr( $str, $pos + 1, $max);
}

// 右边部分
public static function right( $str, $sep)
{
        $pos = strrpos($str, $sep);
        if( $pos === false)
                return "";
        return substr( $str, $pos + 1);
}

// 包含
public static function contain($str, $k)
{
        $pos = strpos($str, $k);
        if( $pos === false)
                return false;
        return true;
}

// 包含多个
public static function contains($str, $ks)
{
	foreach($ks as $k) {
		$pos = strpos($str, $k);
		if( $pos === false) continue;
		else return true;
	}
	return false;
}

// 包含(忽略大小写)
public static function containi($str, $k)
{
        $pos = stripos($str, $k);
        if( $pos === false)
                return false;
        return true;
}

// 以$prefix开头
function startWith($str, $prefix)
{
        $res = strncmp($str, $prefix, strlen($prefix));
        if( $res == 0) return true;
        return false;
}

// 以$postfix结尾
function endWith($str, $postfix){
    return strrpos($str, $postfix) === strlen($str)-strlen($postfix);
}

/* Test Drive */
/* $aa = segs("<li>a</li><li>b</li><lli>cc</lia>...", "<li>", "</li>");
foreach($aa as $a)
    var_dump($a);
*/


}
?>
