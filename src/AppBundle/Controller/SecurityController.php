<?php
namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class SecurityController extends Controller
{
	public function loginAction(Request $request)
	{
		$authenticationUtils = $this->get('security.authentication_utils');
		$error = $authenticationUtils->getLastAuthenticationError();
		$lastUserName = $authenticationUtils->getLastUserName();

		return $this->render('security/login.html.php', array(
				'last_username' => $lastUserName,
				'error' => $error,
			)
		);
	}
	
}