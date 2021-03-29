<?php

use Public\inc\Class\ToolBox;
use Public\inc\Class\VerifForm;

require('../../Core/Autoloader/Autoloader.php');

require('../inc/Class/ToolBox.php');

$toolbox = new ToolBox();

echo "key1 : ".$_POST["key1"];
echo "key2 : ".$_POST["key2"];
echo "key3 : ".floatval($_POST["key3"]);
echo "key4 : ".floatval($_POST["key4"]);