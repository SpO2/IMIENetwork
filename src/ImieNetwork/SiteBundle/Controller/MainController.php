<?php

namespace ImieNetwork\SiteBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Compenent\Form\FormBuilder;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\Security\Core\SecurityContextInterface;

use ImieNetwork\SiteBundle\Entity\Utilisateur;

use Doctrine\ORM\EntityRepository;


/**
 * Main controller.
 *
 */
class MainController extends Controller
{   
    public function indexAction()
    {
        $user = $this->get('security.context')->getToken()->getUser();
        $session = new Session();
        if($user == "anon.")
            return $this->redirect($this->generateUrl('ImieNetworkSiteBundle_security_login'));
        if($this->get('security.context')->isGranted('ROLE_ENTREPRISE'))
        {
            return $this->redirect($this->generateUrl('entrepriseIndex'));
        }
        if($this->get('security.context')->isGranted('ROLE_ELEVE'))
        {
            return $this->redirect($this->generateUrl('eleveIndex'));
        }
        if($this->get('security.context')->isGranted('ROLE_ADMIN'))
        {
            return $this->redirect($this->generateUrl('administrationIndex'));
        }
        if($this->get('security.context')->isGranted('ROLE_SUPER_ADMIN'))
        {
            return $this->redirect($this->generateUrl('sonata_admin_dashboard'));
        }
        else
            return $this->redirect($this->generateUrl('fos_user_security_login'));
    }

    public function loginAction()
    {
        $request = $this->getRequest();
        $session = $request->getSession();

        // get the error if any (works with forward and redirect -- see below)
        if ($request->attributes->has(SecurityContextInterface::AUTHENTICATION_ERROR)) {
            $error = $request->attributes->get(SecurityContextInterface::AUTHENTICATION_ERROR);
        } elseif (null !== $session && $session->has(SecurityContextInterface::AUTHENTICATION_ERROR)) {
            $error = $session->get(SecurityContextInterface::AUTHENTICATION_ERROR);
            $session->remove(SecurityContextInterface::AUTHENTICATION_ERROR);
        } else {
            $error = '';
        }

        if ($error) {
            // TODO: this is a potential security risk (see http://trac.symfony-project.org/ticket/9523)
            $error = $error->getMessage();
        }
        // last username entered by the user
        $lastUsername = (null === $session) ? '' : $session->get(SecurityContextInterface::LAST_USERNAME);

        $csrfToken = $this->container->has('form.csrf_provider')
            ? $this->container->get('form.csrf_provider')->generateCsrfToken('authenticate')
            : null;

        return $this->renderLogin(array(
            'last_username' => $lastUsername,
            'error'         => $error,
            'csrf_token' => $csrfToken,
        ));
    }
    
    protected function renderLogin(array $data)
    {
        $template = sprintf('ImieNetworkSiteBundle:Security:login.html.%s', $this->container->getParameter('fos_user.template.engine'));

        return $this->container->get('templating')->renderResponse($template, $data);
    }

    public function checkAction()
    {
        throw new \RuntimeException('You must configure the check path to be handled by the firewall using form_login in your security firewall configuration.');
    }

    public function logoutAction()
    {
        throw new \RuntimeException('You must activate the logout in your security firewall configuration.');
    }

    public function menuAction()
    {
        return $this->render('ImieNetworkSiteBundle:Accueil:menu.html.twig');
    }
}

