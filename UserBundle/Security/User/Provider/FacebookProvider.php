<?php

namespace Tuni\UserBundle\Security\User\Provider;

use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use \BaseFacebook;
use \FacebookApiException;
use Tuni\AdminBundle\Entity\Membre;
use Doctrine\Common\Persistence\ObjectManager;
class FacebookProvider implements UserProviderInterface
{   /**
     *
     * @var ObjectManager 
     */
    protected $em;

    /**
     * @var \Facebook
     */
    protected $facebook;
    protected $userManager;
    protected $validator;
    protected $container;

    public function __construct(BaseFacebook $facebook, $userManager, $validator,$container)
    {
        $this->facebook = $facebook;
        $this->userManager = $userManager;
        $this->validator = $validator;
        $this->container = $container;
        //$this->em = new ObjectManager();
        $em = $this->getDoctrine()->getManager();
        //var_dump($em);
        //die('yes');
    }
    public function getDoctrine()
 {
    if (!$this->container->has('doctrine')) {
        
            throw new \LogicException('The DoctrineBundle is not registered in your application.');
 }
   
    return $this->container->get('doctrine');
 }
    public function supportsClass($class)
    {
        return $this->userManager->supportsClass($class);
    }

    public function findUserByFbId($fbId)
    {
        return $this->userManager->findUserBy(array('facebookId' => $fbId));
    }

    public function loadUserByUsername($username)
    {
        $user = $this->findUserByFbId($username);

        try {
            $fbdata = $this->facebook->api('/me');
        } catch (FacebookApiException $e) {
            $fbdata = null;
        }

        if (!empty($fbdata)) {
            if (empty($user)) {
                $user = $this->userManager->createUser();
                $user->setEnabled(true);
                $user->setPassword('');
                //$this->setFBMembre($fbdata);
            }
            //var_dump($this->container);
            //
            
            // TODO use http://developers.facebook.com/docs/api/realtime
            $user->setFBData($fbdata);

            if (count($this->validator->validate($user, 'Facebook'))) {
                // TODO: the user was found obviously, but doesnt match our expectations, do something smart
                throw new UsernameNotFoundException('The facebook user could not be stored');
            }
            $this->userManager->updateUser($user);
            $repository = $this->getDoctrine()->getManager()->getRepository('TuniAdminBundle:Membre'); 
                         $membre=$repository->findOneBy(array('utilisateur' => $user->getId()));
            if(empty($membre))
                $this->setFBMembre($fbdata);
        }

        if (empty($user)) {
            throw new UsernameNotFoundException('The user is not authenticated on facebook');
        }

        return $user;
    }

    public function refreshUser(UserInterface $user)
    {
        if (!$this->supportsClass(get_class($user)) || !$user->getFacebookId()) {
            throw new UnsupportedUserException(sprintf('Instances of "%s" are not supported.', get_class($user)));
        }

        return $this->loadUserByUsername($user->getFacebookId());
    }
    public function setFBMembre($fbdata)
    {   
        $entity  = new Membre();
        
        $repository = $this->getDoctrine()->getManager()->getRepository('TuniAdminBundle:Utilisateur'); 
                         $utilisateurCree=$repository->findOneBy(array('email' => $fbdata['email']));
            $entity->setUtilisateur($utilisateurCree);
           $repositoryStatutMembre = $this->getDoctrine()->getManager()->getRepository('TuniAdminBundle:StatutMembre'); 
                         $StatutMembre=$repositoryStatutMembre->findOneBy(array('statut' =>'Particulier'));
            
            $entity->setStatutMembre($StatutMembre);
            
            $d = new \DateTime('now');
            $z = $d->format('Y-m-d H:i:s');
            
            $entity->setRegistredUser($d);
			if( $fbdata["gender"]== "male")
            $entity->setCivilite("M.");
			else
			$entity->setCivilite('Mdm');
			
            $entity->setNom($fbdata['first_name']);
            $entity->setPrenom($fbdata['last_name']);
            $entity->setAge(0);
            $entity->setTel('+99999999999');
            $entity->setFax('+99999999999');
            $entity->setAdresse(' ');
            $this->getDoctrine()->getManager()->persist($entity);
            $this->getDoctrine()->getManager()->flush();
            //var_dump($fbdata);
            //die();
    }
}