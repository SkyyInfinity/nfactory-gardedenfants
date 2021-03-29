<?php

use Public\inc\Class\ToolBox;
use Public\inc\Class\VerifForm;

require('../../Core/Autoloader/Autoloader.php');

require('../inc/Class/ToolBox.php');

$toolbox = new ToolBox();

echo "Adresse : ".$_POST["key1"];
echo "Code Psstal: ".$_POST["key2"];
echo "long : ".floatval($_POST["key3"]);
echo "latt : ".floatval($_POST["key4"]);