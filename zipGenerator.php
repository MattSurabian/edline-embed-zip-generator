<?php
$filename = 'edline-embed.html';
$content = '<!DOCTYPE html><html><head><title>Embeded Content</title><style>iframe{width: 800px;height:600px;}</style></head><body>';
$content .= $_POST['embed_content'];
$content .= '</body></html>';

header("Cache-Control: public");
header("Content-Description: File Transfer");
header("Content-Disposition: attachment; filename=$filename");
header("Content-Type: application/octet-stream; ");
header("Content-Transfer-Encoding: binary");

echo $content;
