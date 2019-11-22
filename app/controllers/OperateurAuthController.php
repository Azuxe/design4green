<?php
namespace controllers;

 
use Ubiquity\utils\http\USession;
use Ubiquity\utils\http\URequest;
use models\Operateur;
use Ubiquity\controllers\Startup;
use Ubiquity\orm\DAO;

/**
 * Auth Controller BaseAuthController
 **/
class OperateurAuthController extends \Ubiquity\controllers\auth\AuthController
{

	protected function onConnect($connected)
	{
		$urlParts = $this->getOriginalURL();
		USession::set($this->_getUserSessionKey(), $connected);
		if (isset($urlParts)) {
			Startup::forward(implode("/", $urlParts));
		} else {
			Startup::forward("operateur");
		}
	}

	protected function _connect()
	{
		if (URequest::isPost()) {
			$username = URequest::post($this->_getLoginInputName());
			$password = URequest::post($this->_getPasswordInputName());
			return DAO::uGetOne(Operateur::class, "username=? and password= ?", false, [$username, $password]);
		}
		return;
	}

	/**
	 * {@inheritDoc}
	 * @see \Ubiquity\controllers\auth\AuthController::isValidUser()
	 */
	public function _isValidUser($action = null)
	{
		return USession::exists($this->_getUserSessionKey());
	}

	public function _getBaseRoute()
	{
		return 'AdminAuthController';
	}
	/**
	 * {@inheritDoc}
	 * @see \Ubiquity\controllers\auth\AuthController::_getLoginInputName()
	 */
	public function _getLoginInputName()
	{
		return "username";
	}

	public function _displayInfoAsString()
	{
		return true;
	}
}

