<?php
// src/AppBundle/Security/TokenAuthenticator.php
namespace AppBundle\Security;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Guard\AbstractGuardAuthenticator;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Doctrine\ORM\EntityManager;

use AppBundle\Entity\User;
use JWT;

class TokenAuthenticator extends AbstractGuardAuthenticator
{
    private $em;

    public function __construct(EntityManager $em) {
        $this->em = $em;
    }

    /**
    * Called on every request. Return whatever credentials you want,
    * or null to stop authentication.
    */
    public function getCredentials(Request $request) {
        if (!$token = $request->headers->get('X-AUTH-TOKEN')) {
            // no token? Return null and no other methods will be called
            return NULL;
        }
        // What you return here will be passed to getUser() as $credentials
        return array(
                'token' => $token,
                );
    }

    public function getUser($credentials, UserProviderInterface $userProvider) {
        $apiKey = $credentials['token'];

        try {
            $decoded = JWT::decode($apiKey, User::JWT_SECRET_KEY, array('HS256'));
        } catch(\Exception $e) {
            return null;
        }

        $decodedArray = (array) $decoded;
        $username = $decodedArray["sub"];
        if ( !isset($username)) {
            return null;
        }

        // if null, authentication will fail
        // if a User object, checkCredentials() is called
        return $this->em->getRepository('AppBundle:User')->findOneBy(array('username' => $username));
    }

    public function checkCredentials($credentials, UserInterface $user) {
        // check credentials - e.g. make sure the password is valid
        // no credential check is needed in this case
        // return true to cause authentication success
        return true;
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token, $providerKey) {
        // on success, let the request continue
        return null;
    }

    public function onAuthenticationFailure(Request $request, AuthenticationException $exception) {
        $data = array(
                'message' => strtr($exception->getMessageKey(), $exception->getMessageData())
                // or to translate this message
                // $this->translator->trans($exception->getMessageKey(), $exception->getMessageData())
                );

        return new JsonResponse($data, 403);
    }

    /**
    * Called when authentication is needed, but it's not sent
    */
    public function start(Request $request, AuthenticationException $authException = null) {
        $data = array(
                // you might translate this message
                'message' => 'Authentication Required'
                );
        return new JsonResponse($data, 401);
    }

    public function supportsRememberMe() {
        return false;
    }
}