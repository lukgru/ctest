<?php

date_default_timezone_set("Europe/Warsaw");

\inc\registry\applicationRegistry::getInstance()->set("ROOT_DIR", dirname(dirname(__FILE__))."/");
\inc\registry\applicationRegistry::getInstance()->set("CONTROLLERS_DIR", dirname(dirname(__FILE__))."/inc/controllers/");

?>