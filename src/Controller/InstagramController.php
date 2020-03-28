<?php

namespace App\Controller;

use KnpU\OAuth2ClientBundle\Client\ClientRegistry;
use KnpU\OAuth2ClientBundle\Client\Provider\InstagramClient;
use League\OAuth2\Client\Provider\Instagram;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class InstagramController extends AbstractController
{
    /**
     * Link to this controller to start the "connect" process
     *
     * @Route("/connect/instagram", name="connect_instagram_start")
     * @param ClientRegistry $clientRegistry
     * @return RedirectResponse
     */
    public function connectAction(ClientRegistry $clientRegistry)
    {
        return $clientRegistry
            ->getClient('instagram') // key used in config/packages/knpu_oauth2_client.yaml
            ->redirect(['public_profile', 'email'], null);
    }

    /**
     * After going to Facebook, you're redirected back here
     * because this is the "redirect_route" you configured
     * in config/packages/knpu_oauth2_client.yaml
     *
     * @Route("/connect/instagram/check", name="connect_instagram_check")
     * @param Request $request
     * @param ClientRegistry $clientRegistry
     * @return RedirectResponse
     */
    public function connectCheckAction(Request $request, ClientRegistry $clientRegistry)
    {
        /** @var InstagramClient $client */
        $client = $clientRegistry->getClient('instagram');

        /** @var Instagram $user */
        $user = $client->fetchUser();
        return $this->redirectToRoute('home');
    }
}
