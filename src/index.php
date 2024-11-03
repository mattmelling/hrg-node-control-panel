<?php

$config = parse_ini_file('config.ini', true);
$nodeNumber = $config['node']['number'];
$nodeTitle = $config['node']['title'];

$buttons = parse_ini_file('buttons.ini', true);

?>
<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $nodeTitle; ?> | <?php echo $nodeNumber; ?></title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="generator" content="">
        <meta name="description" content="<?php echo $nodeTitle; ?> - Control Panel">
        <meta name="robots" content="noindex, nofollow">
        <meta name="author" content="M0NFI,G7RPG,G4IYT">
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
        <link rel="icon" href="favicon.ico" type="image/x-icon">
        <link type="text/css" rel="stylesheet" href="style.css">
    </head>
    <body>
        <div id="container">
            <div id="header">
                <h1>
                    <a href="/index.php"><?php echo $nodeNumber; ?> - <?php echo $nodeTitle; ?></a>
                </h1>
            </div>
            <div class="buttons">
                <?php foreach($buttons as $key => $btn): ?>
                    <div id="<?php echo $key; ?>" class="button <?php echo (isset($btn['color']) ? 'button-' . $btn['color'] : ''); ?>">
                        <?php echo $btn['title']; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <script>
         <?php foreach($buttons as $key => $btn): ?>
         document.getElementById('<?php echo $key; ?>').addEventListener('click', function () {
             <?php if(isset($btn['href'])): ?>
             window.open('<?php echo $btn['href']; ?>', '_blank').focus();
             <?php endif; ?>
             <?php if(isset($btn['cmds'])): ?>
             fetch('control.php?cmd=<?php echo $key; ?>');
             <?php endif; ?>
         });
         <?php endforeach; ?>
        </script>
    </body>
</html>
