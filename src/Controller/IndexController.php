<?php

namespace App\Controller;

use App\Entity\EmailTemplate;
use App\Entity\LocaleTemplates;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\LocaleTemplateType;
use App\Repository\LocaleTemplatesRepository;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;

class IndexController extends AbstractController
{

    /**
     * @Route("/", name="settings.locale_overview")
     */
    public function localeoverview(LocaleTemplatesRepository $localeTemplatesRepository)
    {
        $LocaleTemplates = $localeTemplatesRepository->findBy([
            'deletedAt' => null
        ]);
        return $this->render('settings/locale.html.twig', [
            'LocaleTemplates' => $LocaleTemplates
        ]);
    }

    /**
     * @Route("/language/new", name="settings.locale_new")
     */
    public function newlocale(Request $request)
    {
        $localeTemplate = new LocaleTemplates();

        $form = $this->createForm(LocaleTemplateType::class, $localeTemplate);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $this->getDoctrine()->getManager()->persist($localeTemplate);
            $this->getDoctrine()->getManager()->flush();

            $this->addFlash('success', 'Added a new Language');

            return $this->redirectToRoute('settings.locale_overview');
        }

        return $this->render('settings/new_locale.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/language/{id}/edit", name="settings.locale_edit", methods={"GET","POST"}))
     */
    public function editlocale(LocaleTemplates $localeTemplates)
    {
        $form = $this->createForm(LocaleTemplateType::class, $localeTemplates);
        if($form->isSubmitted() && $form->isValid()){
            $this->getDoctrine()->getManager()->persist($localeTemplate);
            $this->getDoctrine()->getManager()->flush();

            $this->addFlash('success', 'Updated Language');

            return $this->redirectToRoute('settings.locale_overview');
        }
        return $this->render('settings/new_locale.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
