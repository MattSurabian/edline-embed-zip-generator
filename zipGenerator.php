<?php
$filename = '/tmp/edline-embed-'.uniqid(true).'.zip';
$zip = new ZipArchive();

// Build index.html in memory
$content = "<!DOCTYPE html>\n<html>\n<head>\n<title>Embeded Content</title>\n<style>\niframe{width:800px;height:600px;}\n</style>\n</head>\n<body>\n";
// Edline is HTTPS, should try to load iframe content over HTTPS otherwise insecure errors prevent loading
$content .= str_replace('="http://', '="https://', $_POST['embed_content']);
$content .= "\n</body>\n</html>";

// create the zip archive and add index.html into it
$zip->open($filename, ZipArchive::CREATE);
$zip->addFromString('index.html',$content);
$zip->close();

header("Cache-Control: public");
header("Content-Description: File Transfer");
header("Content-Disposition: attachment; filename='edline-embed.zip");
header("Content-Type: application/zip; ");
header("Content-Transfer-Encoding: binary");

readfile($filename);

unlink($filename);