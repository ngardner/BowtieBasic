<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'head.tpl.php'; ?>
    <title><?=$Title;?></title>
</head>
<body class="<?=$bodyClassController.'-'.$bodyClassAction;?>">
    <?php include 'header.tpl.php'; ?>
    <div class="container">
        <?=$content;?>
    </div>
    <?php include 'footer.tpl.php'; ?>
    <?php include 'foot.tpl.php'; ?>
</body>
</html>