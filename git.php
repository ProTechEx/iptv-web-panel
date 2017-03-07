<?php

function execPrint($command)
{
    $result = array();
    exec($command, $result);
    foreach ($result as $line) {
        echo $line."\n";
    }
}
echo '<pre>'.execPrint('cd /var/www/iptvpanel.x-mad.com/public_html && git pull').'</pre>';
