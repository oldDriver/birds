<?php

// src/Security/Authentication/AuthenticationSuccessHandler.php

namespace App\Security\Authentication;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationSuccessHandlerInterface;

class AuthenticationSuccessHandler implements AuthenticationSuccessHandlerInterface
{
    public function __construct(private UrlGeneratorInterface $router)
    {
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token): RedirectResponse
    {
        $user = $token->getUser();
        $roles = $user->getRoles();
        if (in_array('ROLE_ADMIN', $roles)) {
            return new RedirectResponse($this->router->generate('admin'));
        }

        return new RedirectResponse($this->router->generate('app_dashboard'));
    }
}
