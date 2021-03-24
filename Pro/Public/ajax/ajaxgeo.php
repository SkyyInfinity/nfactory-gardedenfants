<?php
session_start();

use Public\inc\Class\ToolBox;
use Public\inc\Class\VerifForm;

require('../../Core/Autoloader/Autoloader.php');

require('../inc/Class/ToolBox.php');

$toolbox = new ToolBox();

echo $_POST['label'];