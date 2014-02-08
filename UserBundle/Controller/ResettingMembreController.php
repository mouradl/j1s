<?php

/*
 * This file is part of the FOSUserBundle package.
 *
 * (c) FriendsOfSymfony <http://friendsofsymfony.github.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tuni\UserBundle\Controller;

use Symfony\Component\DependencyInjection\ContainerAware;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Security\Core\Exception\AccountStatusException;
use FOS\UserBundle\Model\UserInterface;

/**
 * Controller managing the resetting of the password
 *
 * @author Thibault Duplessis <thibault.duplessis@gmail.com>
 * @author Christophe Coevoet <stof@notk.org>
 */
class ResettingMembreController extends ContainerAware
{
    const SESSION_EMAIL = 'fos_user_send_resetting_email/email';
     
    /**
        * Shortcut to return the Doctrine Registry service.
        *
        * @return Registry
        *
        * @throws \LogicException If DoctrineBundle is not available
      */
 
    public function getDoctrine()
 {
    if (!$this->container->has('doctrine')) {
            throw new \LogicException('The DoctrineBundle is not registered in your application.');
 }
 
    return $this->container->get('doctrine');
 }
 
 /**
     * Request reset user password: show form
     */
    public function requestAction()
    {       
        
      
        return $this->container->get('templating')->renderResponse('FOSUserBundle:Resetting:requestMembre.html.'.$this->getEngine(),  $this->init());
    }

    /**
     * Request reset user password: submit form and send email
     */
    public function sendEmailAction()
    {
        $username = $this->container->get('request')->request->get('username');

        /** @var $user UserInterface */
        $user = $this->container->get('fos_user.user_manager')->findUserByUsernameOrEmail($username);

        if (null === $user) {
            return $this->container->get('templating')->renderResponse('FOSUserBundle:Resetting:requestMembre.html.'.$this->getEngine(),array_merge($this->init(), array('invalid_username' => $username)));
        }

        if ($user->isPasswordRequestNonExpired($this->container->getParameter('fos_user.resetting.token_ttl'))) {
            return $this->container->get('templating')->renderResponse('FOSUserBundle:Resetting:passwordAlreadyRequestedMembre.html.'.$this->getEngine(),$this->init());
        }

        if (null === $user->getConfirmationToken()) {
            /** @var $tokenGenerator \FOS\UserBundle\Util\TokenGeneratorInterface */
            $tokenGenerator = $this->container->get('fos_user.util.token_generator');
            $user->setConfirmationToken($tokenGenerator->generateToken());
        }

        $this->container->get('session')->set(static::SESSION_EMAIL, $this->getObfuscatedEmail($user));
        $this->container->get('fos_user.mailer')->sendResettingEmailMessage($user);
        $user->setPasswordRequestedAt(new \DateTime());
        $this->container->get('fos_user.user_manager')->updateUser($user);

        return new RedirectResponse($this->container->get('router')->generate('fos_user_resetting_check_email'));
    }

    /**
     * Tell the user to check his email provider
     */
    public function checkEmailAction()
    {
        $session = $this->container->get('session');
        $email = $session->get(static::SESSION_EMAIL);
        $session->remove(static::SESSION_EMAIL);

        if (empty($email)) {
            // the user does not come from the sendEmail action
            return new RedirectResponse($this->container->get('router')->generate('fos_user_resetting_request'));
        }

        return $this->container->get('templating')->renderResponse('FOSUserBundle:Resetting:checkEmailMembre.html.'.$this->getEngine(),array_merge($this->init(), array(
            'email' => $email,
        )));
    }

    /**
     * Reset user password
     */
    public function resetAction($token)
    {
        $user = $this->container->get('fos_user.user_manager')->findUserByConfirmationToken($token);

        if (null === $user) {
            $_SESSION['error_page'] = 'l\'utilisateur avec confirmation token '.$token.' n\'existe pas';
            return new RedirectResponse($this->container->get('router')->generate("tuni_annonce_error_page"));
            //throw new NotFoundHttpException(sprintf('The user with "confirmation token" does not exist for value "%s"', $token));
        }

        if (!$user->isPasswordRequestNonExpired($this->container->getParameter('fos_user.resetting.token_ttl'))) {
            return new RedirectResponse($this->container->get('router')->generate('fos_user_resetting_request'));
        }

        $form = $this->container->get('fos_user.resetting.form');
        $formHandler = $this->container->get('fos_user.resetting.form.handler');
        $process = $formHandler->process($user);

        if ($process) {
            $this->setFlash('fos_user_success', 'resetting.flash.success');
            $response = new RedirectResponse($this->getRedirectionUrl($user));
            $this->authenticateUser($user, $response);

            return $response;
        }

        return $this->container->get('templating')->renderResponse('FOSUserBundle:Resetting:resetMembre.html.'.$this->getEngine(),array_merge($this->init(), array(
            'token' => $token,
            'form' => $form->createView(),
        )));
    }

    /**
     * Authenticate a user with Symfony Security
     *
     * @param \FOS\UserBundle\Model\UserInterface        $user
     * @param \Symfony\Component\HttpFoundation\Response $response
     */
    protected function authenticateUser(UserInterface $user, Response $response)
    {
        try {
            $this->container->get('fos_user.security.login_manager')->loginUser(
                $this->container->getParameter('fos_user.firewall_name'),
                $user,
                $response);
        } catch (AccountStatusException $ex) {
            // We simply do not authenticate users which do not pass the user
            // checker (not enabled, expired, etc.).
        }
    }

    /**
     * Generate the redirection url when the resetting is completed.
     *
     * @param \FOS\UserBundle\Model\UserInterface $user
     *
     * @return string
     */
    protected function getRedirectionUrl(UserInterface $user)
    {
        return $this->container->get('router')->generate('fos_user_profile_show');
    }

    /**
     * Get the truncated email displayed when requesting the resetting.
     *
     * The default implementation only keeps the part following @ in the address.
     *
     * @param \FOS\UserBundle\Model\UserInterface $user
     *
     * @return string
     */
    protected function getObfuscatedEmail(UserInterface $user)
    {
        $email = $user->getEmail();
        if (false !== $pos = strpos($email, '@')) {
            $email = '...' . substr($email, $pos);
        }

        return $email;
    }

    /**
     * @param string $action
     * @param string $value
     */
    protected function setFlash($action, $value)
    {
        $this->container->get('session')->getFlashBag()->set($action, $value);
    }

    protected function getEngine()
    {
        return $this->container->getParameter('fos_user.template.engine');
    }
    public function init(){
        $em = $this->getDoctrine()->getManager();
        $repository = $this->getDoctrine()
                                        ->getManager()
                                        ->getRepository('TuniAnnonceBundle:Temoignage'); 
                         $Temoignages=$repository->findBy(array('isPublier' => TRUE));
            $Categories = $em->getRepository('TuniAnnonceBundle:Categorie')->findAll();     
            $SousCategories = $em->getRepository('TuniAnnonceBundle:SousCategorie')->findAll();
            $Menus = $em->getRepository('TuniAnnonceBundle:Menu')->findAll();     
                $Slides = $em->getRepository('TuniAnnonceBundle:Slider')->findAll();$Socials = $em->getRepository('TuniAnnonceBundle:Social')->findAll();      
        $Regions = $em->getRepository('TuniAnnonceBundle:Region')->findAll();  
          $query = $em->createQuery("
    SELECT a
    FROM TuniAnnonceBundle:Annonce a
    WHERE a.typeAnnonce = 1
    ORDER BY a.id DESC
    
");
        $query->setMaxResults(3);
        $lastAnnonces = $query
                ->getResult();

        $query22 = $em->createQuery("
    SELECT a
    FROM TuniAnnonceBundle:Annonce a
    WHERE a.typeAnnonce = 2
    ORDER BY a.id DESC
    
");
        $query22->setMaxResults(3);
        $lastAnnonces22 = $query22
                ->getResult();
        $membre = NULL;
        if ($this->container->get('security.context')->isGranted('ROLE_USER')) {
            //User is logged in    
            $user = $this->container->get('security.context')->getToken()->getUser();
            $id = $user->getId();
            $membre = $em->getRepository('TuniAnnonceBundle:Membre')->findOneBy(array('utilisateur' => $id));
        }
        return array('membre' => $membre, 'Categories' => $Categories, 'Menus' => $Menus, 'Slides' => $Slides, 'Socials' => $Socials, 'Regions' => $Regions,
            'SousCategories' => $SousCategories,
            'Temoignages' => $Temoignages,
            'lastAnnonces' => $lastAnnonces,
            'lastAnnonces22' => $lastAnnonces22                                                                      );
    }
}
