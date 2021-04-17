<?php

/* DEV: v1.2021.02.27
 * 
 * This is an example script!
 */

require_once '../vendor/autoload.php';

use codesaur\Globals\Get;
use codesaur\Globals\Post;
use codesaur\Globals\Server;

$get = new Get();
if ($get->has('name')) {
    echo "GET['name']: " . $get->value('name') . '<br /><br />';
}

$post = new Post();
if ($post->has('name')) {
    echo "POST['name']: " . $post->value('name') . '<br /><br />';
}

$server = new Server();
echo 'Your IP: ' . $server->getRemoteAddr();
