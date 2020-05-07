<?php
	//serveur de développement : wamp ou mamp
	if ($_SERVER['SERVER_NAME']=='localhost') {
		define ('SERVEUR_BD','localhost');
		define ('LOGIN_BD','root');
		define ('PASS_BD','root');
		define ('NOM_BD','movies');
	}
	// serveur de déploiement : mmi-agences ou Olympe
	else {
		define ('SERVEUR_BD','localhost');
		define ('LOGIN_BD','user');
		define ('PASS_BD','root');
		define ('NOM_BD','test');
	}
?>
