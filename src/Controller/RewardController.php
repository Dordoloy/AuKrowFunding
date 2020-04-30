<?php

namespace App\Controller;

use App\Entity\Reward;
use App\Form\RewardType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/reward")
 */
class RewardController extends AbstractController
{
    /**
     * @Route("/new", name="reward_new", methods={"GET","POST"})
     * @param Request $request
     * @return Response
     */
    public function new(Request $request): Response
    {
        $reward = new Reward();
        $form = $this->createForm(RewardType::class, $reward);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($reward);
            $entityManager->flush();

            return $this->redirectToRoute('reward_index');
        }

        return $this->render('reward/new.html.twig', [
            'reward' => $reward,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="reward_show", methods={"GET"})
     * @param Reward $reward
     * @return Response
     */
    public function show(Reward $reward): Response
    {
        return $this->render('reward/show.html.twig', [
            'reward' => $reward,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="reward_edit", methods={"GET","POST"})
     * @param Request $request
     * @param Reward $reward
     * @return Response
     */
    public function edit(Request $request, Reward $reward): Response
    {
        $form = $this->createForm(RewardType::class, $reward);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('reward_index');
        }

        return $this->render('reward/edit.html.twig', [
            'reward' => $reward,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="reward_delete", methods={"DELETE"})
     * @param Request $request
     * @param Reward $reward
     * @return Response
     */
    public function delete(Request $request, Reward $reward): Response
    {
        if ($this->isCsrfTokenValid('delete' . $reward->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($reward);
            $entityManager->flush();
        }

        return $this->redirectToRoute('reward_index');
    }
}
