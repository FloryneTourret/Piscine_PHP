#!/usr/bin/php
<?php

if(substr($argv[1], 0, 7) == 'http://')
    $folder = substr($argv[1], 7);
else if(substr($argv[1], 0, 8) == 'https://')
    $folder = substr($argv[1], 8);
else if(substr($argv[1], 0, 4) == 'www.')
{
    $folder = $argv[1];
    $argv[1] = 'http://'.$folder;
}
if (!file_exists('./'.$folder))
    mkdir('./'.$folder);


$result = @file_get_contents($argv[1]);

preg_match_all('/<img[^>]+src="([^"]*)"/i', $result, $matches);
foreach($matches[1] as $match)
{
    if (substr($match, 0, 1) == '/')
        $match = $argv[1].$match;
    $img = @file_get_contents($match);
    if (isset($img))
        @file_put_contents('./'.$folder.'/'.basename($match), $img);
}
return (0);
?>