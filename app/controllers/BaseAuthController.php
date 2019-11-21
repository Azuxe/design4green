<?php

namespace controllers;

use Ubiquity\utils\http\USession;
use Ubiquity\utils\http\URequest;
use models\Identifiant;
use Ubiquity\controllers\Startup;
use Ubiquity\orm\DAO;

/**
 * Auth Controller BaseAuthController
 **/
class BaseAuthController extends \Ubiquity\controllers\auth\AuthController
{

	protected function onConnect($connected)
	{
		$urlParts = $this->getOriginalURL();
		USession::set($this->_getUserSessionKey(), $connected);
		if (isset($urlParts)) {
			Startup::forward(implode("/", $urlParts));
		} else {
			Startup::forward("consommation");
		}
	}

	protected function _connect()
	{
		if (URequest::isPost()) {
			$username = URequest::post($this->_getLoginInputName());
			$password = URequest::post($this->_getPasswordInputName());
			$user = DAO::uGetOne(Identifiant::class, "username=? and password= ?", false, [$username, $password]);
			return $user;
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
		return 'BaseAuthController';
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