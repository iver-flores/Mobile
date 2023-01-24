<?php
require_once "controllers/TemplateC.php";

require_once "controllers/GuardC.php";
require_once "models/GuardM.php";

require_once "controllers/AdminC.php";
require_once "models/AdminM.php";

require_once "controllers/InitC.php";
require_once "models/InitM.php";

require_once "controllers/CameraC.php";
require_once "models/CameraM.php";

require_once "controllers/DoorC.php";
require_once "models/DoorM.php";

require_once "controllers/UserC.php";
require_once "models/UserM.php";

require_once "controllers/AccessC.php";
require_once "models/AccsessM.php";

require_once "controllers/CdrC.php";
require_once "models/CdrM.php";

/*require_once "Controladores/secretariasC.php";
require_once "Modelos/secretariasM.php";

require_once "Controladores/consultoriosC.php";
require_once "Modelos/consultoriosM.php";

require_once "Controladores/doctoresC.php";
require_once "Modelos/doctoresM.php";

require_once "Controladores/pacientesC.php";
require_once "Modelos/pacientesM.php";

require_once "Controladores/citasC.php";
require_once "Modelos/citasM.php";

require_once "Controladores/adminC.php";
require_once "Modelos/adminM.php";

require_once "Controladores/inicioC.php";
require_once "Modelos/inicioM.php";*/

$template = new Template();
$template -> callTemplate();