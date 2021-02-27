<?php

/* DEV: v1.2021.02.27
 * 
 * This is an example script!
 */

require_once '../vendor/autoload.php';

use codesaur\Globals\Post;
use codesaur\Globals\Server;

$post = new Post();
if ($post->has('name')) {
    echo "POST['name']: " . $post->value('name') . '<br />';
}

$server = new Server();
echo 'Your IP: ' . $server->getRemoteAddr();
