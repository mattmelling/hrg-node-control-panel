<?php

$buttons = parse_ini_file('buttons.ini', true);
$config = parse_ini_file('config.ini', true);
$nodeNumber = $config['node']['number'];

function process_command($nodeNumber, $cmd) {
    $sh = 'sudo /usr/sbin/asterisk -rx "rpt fun ' . $nodeNumber . ' ' . $cmd . '"';
    shell_exec($sh);
}

if(!isset($_GET['cmd'])) {
    exit(0);
}

$cmd = $_GET['cmd'];
if(!isset($buttons[$cmd])) {
    exit(0);
}

$btn = $buttons[$cmd];
if(!isset($btn['cmds'])) {
    exit(0);
}

foreach($btn['cmds'] as $cmd) {
    process_command($nodeNumber, $cmd);
}
