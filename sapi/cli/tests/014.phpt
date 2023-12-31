--TEST--
syntax highlighting
--SKIPIF--
<?php include "skipif.inc"; ?>
--FILE--
<?php

$php = getenv('TEST_PHP_EXECUTABLE_ESCAPED');

$filename = __DIR__."/014.test.php";
$code = '
<?php
$test = "var"; //var
/* test class */
class test {
    private $var = array();

    public static function foo(Test $arg) {
        echo "hello";
        var_dump($this);
    }
}

$o = new test;
?>
';

file_put_contents($filename, $code);

$filename_escaped = escapeshellarg($filename);
var_dump(`$php -n -s $filename_escaped`);
var_dump(`$php -n -s unknown`);

@unlink($filename);

echo "Done\n";
?>
--EXPECT--
string(1478) "<code><span style="color: #000000">
<br /><span style="color: #0000BB">&lt;?php<br />$test&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #DD0000">"var"</span><span style="color: #007700">;&nbsp;</span><span style="color: #FF8000">//var<br />/*&nbsp;test&nbsp;class&nbsp;*/<br /></span><span style="color: #007700">class&nbsp;</span><span style="color: #0000BB">test&nbsp;</span><span style="color: #007700">{<br />&nbsp;&nbsp;&nbsp;&nbsp;private&nbsp;</span><span style="color: #0000BB">$var&nbsp;</span><span style="color: #007700">=&nbsp;array();<br /><br />&nbsp;&nbsp;&nbsp;&nbsp;public&nbsp;static&nbsp;function&nbsp;</span><span style="color: #0000BB">foo</span><span style="color: #007700">(</span><span style="color: #0000BB">Test&nbsp;$arg</span><span style="color: #007700">)&nbsp;{<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;echo&nbsp;</span><span style="color: #DD0000">"hello"</span><span style="color: #007700">;<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #0000BB">var_dump</span><span style="color: #007700">(</span><span style="color: #0000BB">$this</span><span style="color: #007700">);<br />&nbsp;&nbsp;&nbsp;&nbsp;}<br />}<br /><br /></span><span style="color: #0000BB">$o&nbsp;</span><span style="color: #007700">=&nbsp;new&nbsp;</span><span style="color: #0000BB">test</span><span style="color: #007700">;<br /></span><span style="color: #0000BB">?&gt;<br /></span>
</span>
</code>"
Could not open input file: unknown
NULL
Done
