<?php

namespace App\Controller;

use App\Entity\Project;
use App\Entity\Subscription;
use App\Entity\User;
use App\Form\ProjectType;
use App\Repository\CategoryRepository;
use App\Repository\ProjectRepository;
use App\Repository\StatusRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/project")
 */
class ProjectController extends AbstractController
{
    /**
     * @Route("/", name="project_index", methods={"GET"})
     * @param ProjectRepository $projectRepository
     * @param CategoryRepository $categoryRepository
     * @return Response
     */
    public function index(ProjectRepository $projectRepository, CategoryRepository $categoryRepository): Response
    {
        return $this->render('project/index.html.twig', [
            'projects' => $projectRepository->findAll(),
            'CloseProjects' => $projectRepository->findClosedToBeFinanced(),
            'Category' => $categoryRepository->findAll(),
            'LovedProjects' => $projectRepository->findMostLoved()
        ]);
    }

    /**
     * @Route("/new", name="project_new", methods={"GET","POST"})
     * @IsGranted("IS_AUTHENTICATED_FULLY")
     * @param Request $request
     * @param StatusRepository $statusRepository
     * @return Response
     */
    public function new(Request $request, StatusRepository $statusRepository): Response
    {
        $project = new Project();
        $form = $this->createForm(ProjectType::class, $project);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $project->setUser($this->getUser());
            $project->setStatu($statusRepository->findAll()[0]);
            $project->setReport(0);
            $entityManager->persist($project);
            $entityManager->flush();
            return $this->redirectToRoute('project_index');
        }

        return $this->render('project/new.html.twig', [
            'project' => $project,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="project_show", methods={"GET"})
     * @param Project $project
     * @return Response
     */
    public function show(Project $project): Response
    {
        return $this->render('project/show.html.twig', [
            'project' => $project,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="project_edit", methods={"GET","POST"})
     * @IsGranted("IS_AUTHENTICATED_FULLY")
     * @param Request $request
     * @param Project $project
     * @return Response
     */
    public function edit(Request $request, Project $project): Response
    {
        if ($this->getUser() === $project->getUser()) {
            $form = $this->createForm(ProjectType::class, $project);
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                $this->getDoctrine()->getManager()->flush();

                return $this->redirectToRoute('project_index');
            }

            return $this->render('project/edit.html.twig', [
                'project' => $project,
                'form' => $form->createView(),
            ]);
        } else {
            return $this->render('project/show.html.twig', [
                'project' => $project,
            ]);
        }
    }

    /**
     * @Route("/{id}", name="project_delete", methods={"DELETE"})
     * @IsGranted("IS_AUTHENTICATED_FULLY")
     * @param Request $request
     * @param Project $project
     * @return Response
     */
    public function delete(Request $request, Project $project): Response
    {
        if ($this->getUser() === $project->getUser()) {
            if ($this->isCsrfTokenValid('delete' . $project->getId(), $request->request->get('_token'))) {
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->remove($project);
                $entityManager->flush();
            }

            return $this->redirectToRoute('project_index');
        } else {
            return $this->render('project/show.html.twig', [
                'project' => $project,
            ]);
        }
    }

    /**
     * @Route("/{id}/like", name="project_like", methods={"GET","POST"})
     * @param Project $project
     * @return Response
     */
    public function like(Project $project): Response
    {
        /** @var User $user */
        $user = $this->getDoctrine()->getManager()->getRepository(User::class)->findOneBy(['username' => $this->getUser()->getUsername()]);
        $project->addLikep($user);
        $project->removeDislike($user);
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($user);
        $entityManager->flush();
        return $this->render('project/show.html.twig', [
            'project' => $project,
        ]);
    }

    /**
     * @Route("/{id}/unlike", name="project_unlike", methods={"GET","POST"})
     * @param Project $project
     * @return Response
     */
    public function unLike(Project $project): Response
    {
        /** @var User $user */
        $user = $this->getDoctrine()->getManager()->getRepository(User::class)->findOneBy(['username' => $this->getUser()->getUsername()]);
        $project->removeLike($user);
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($user);
        $entityManager->flush();
        return $this->render('project/show.html.twig', [
            'project' => $project,
        ]);
    }

    /**
     * @Route("/{id}/dislike", name="project_dislike", methods={"GET","POST"})
     * @param Project $project
     * @return Response
     */
    public function dislike(Project $project): Response
    {
        /** @var User $user */
        $user = $this->getDoctrine()->getManager()->getRepository(User::class)->findOneBy(['username' => $this->getUser()->getUsername()]);
        $project->addDislike($user);
        $project->removelike($user);
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($user);
        $entityManager->persist($project);
        $entityManager->flush();
        return $this->render('project/show.html.twig', [
            'project' => $project,
        ]);
    }

    /**
     * @Route("/{id}/undislike", name="project_undislike", methods={"GET","POST"})
     * @param Project $project
     * @return Response
     */
    public function unDislike(Project $project): Response
    {
        /** @var User $user */
        $user = $this->getDoctrine()->getManager()->getRepository(User::class)->findOneBy(['username' => $this->getUser()->getUsername()]);
        $project->removeDislike($user);
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($user);
        $entityManager->persist($project);
        $entityManager->flush();
        return $this->render('project/show.html.twig', [
            'project' => $project,
        ]);
    }

    /**
     * @Route("/{id}/sub", name="project_sub", methods={"GET","POST"})
     * @param Project $project
     * @return Response
     */
    public function subscribe(Project $project): Response
    {
        $project->addSubscribe($this->getDoctrine()->getManager()->getRepository(User::class)->findOneBy(['username' => $this->getUser()->getUsername()]));
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($project);
        $entityManager->flush();
        return $this->render('project/show.html.twig', [
            'project' => $project,
        ]);
    }

    /**
     * @Route("/{id}/unsub", name="project_unsub", methods={"GET","POST"})
     * @param Project $project
     * @return Response
     */
    public function unSubscribe(Project $project): Response
    {
        $project->removeSubscribe($this->getDoctrine()->getManager()->getRepository(User::class)->findOneBy(['username' => $this->getUser()->getUsername()]));
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($project);
        $entityManager->flush();
        return $this->render('project/show.html.twig', [
            'project' => $project,
        ]);
    }
}
