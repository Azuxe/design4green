<?php
namespace controllers\auth\files;

use Ubiquity\controllers\auth\AuthFiles;
 /**
 * Class AuthOperateurControllerFiles
 **/
class AuthOperateurControllerFiles extends AuthFiles{
	public function getViewIndex(){
		return "AuthOperateurController/index.html";
	}

	public function getViewInfo(){
		return "AuthOperateurController/info.html";
	}

	public function getViewNoAccess(){
		return "AuthOperateurController/noAccess.html";
	}

	public function getViewDisconnected(){
		return "AuthOperateurController/disconnected.html";
	}

	public function getViewMessage(){
		return "AuthOperateurController/message.html";
	}

	public function getViewBaseTemplate(){
		return "AuthOperateurController/baseTemplate.html";
	}


}
