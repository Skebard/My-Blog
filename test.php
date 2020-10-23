<?php
$dom = new DOMDocument();
//$dom->loadHTMLFile('https://www.upgrad.com/blog/php-project-ideas-topics-for-beginners/');
//$xml = simplexml_import_dom($dom);
//var_dump( $dom);
$dom->loadHTMLFile('https://www.upgrad.com/blog/php-project-ideas-topics-for-beginners/', LIBXML_HTML_NODEFDTD);
echo $dom->C14N();
?>