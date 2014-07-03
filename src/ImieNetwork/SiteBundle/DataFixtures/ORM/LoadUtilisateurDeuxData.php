<?php
namespace ImieNetwork\SiteBundle\DataFixtures\ORM;
 
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use ImieNetwork\SiteBundle\Entity\Utilisateur;
use ImieNetwork\SiteBundle\Entity\Experience;
use ImieNetwork\SiteBundle\Entity\Evenement;
use ImieNetwork\SiteBundle\Entity\Evenementutilisateur;
use ImieNetwork\SiteBundle\Entity\Offre;
use ImieNetwork\SiteBundle\Entity\Utilisateurcompetence;
use ImieNetwork\SiteBundle\Entity\Ville;
use ImieNetwork\SiteBundle\Entity\Secteuractivite;
use ImieNetwork\SiteBundle\Entity\Utilisateurpropriete;
use ImieNetwork\SiteBundle\Entity\Proprieteetendue;
use ImieNetwork\SiteBundle\Entity\Groupepropriete;
use ImieNetwork\SiteBundle\Entity\Groupe;
use ImieNetwork\SiteBundle\Entity\Module;
use ImieNetwork\SiteBundle\Entity\Typecontrat;
use ImieNetwork\SiteBundle\Entity\Promotion;
use ImieNetwork\SiteBundle\Entity\Competence;


class LoadUtilisateurDeuxData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $em)
    {
        $first_utilisateur = new Utilisateur();
        $first_utilisateur->setUsername('user2');
        $first_utilisateur->setUsernamecanonical('user2');
        $first_utilisateur->setEmail('user2@imie.fr');
        $first_utilisateur->setEmailcanonical('user2@imie.fr');
        $first_utilisateur->setEnabled(true);
        $first_utilisateur->setPassword("dykIbjhfbmmU9i7U1YM49gUuXqdgkSKSrpnaWyYVAGjC/WgDSRLtwyk/aqi5OHkRqg9NXeTGFfCc8kk6NcR2SQ==");
        $first_utilisateur->setLocked(false);
        $first_utilisateur->setExpired(false);
        //$first_utilisateur->setRoles(array(''));
        $first_utilisateur->setCredentialsexpired(0);
        $first_utilisateur->setNom('nomuser2');
        $first_utilisateur->setPrenom('prenomuser2');
        $first_utilisateur->setAdresse('adresse user2');
        $first_utilisateur->setTelephone('0987654321');
        $first_utilisateur->setDatecreation(new \DateTime('2014-07-03'));
        $first_utilisateur->setDatemodification(new \DateTime('2014-07-03'));
        $first_utilisateur->setLangue('français');
        
        $first_ville = new Ville();
        $first_ville->setLibelle('Paris');
        $first_ville->setCodePostal('75000');
        
        $first_utilisateur->setVille($first_ville);
        
        $first_secteuractivite = new Secteuractivite();
        $first_secteuractivite->setLibelle('Technicien');
        
        $first_utilisateur->setSecteuractivite($first_secteuractivite);
        
        $em->persist($first_utilisateur);
        $em->persist($first_ville);
        $em->persist($first_secteuractivite);
        
        $first_experience = new Experience();
        $first_experience->setLibelle('first experience');
        $first_experience->setDateDebut(new \DateTime('2014-03-01'));
        $first_experience->setDateFin(new \DateTime('2014-05-02'));
        $first_experience->setDescription('deuxième expérience saisie');
        $first_experience->setUtilisateur($first_utilisateur);
        
        $em->persist($first_experience);
        
        $first_competence = new Competence();
        $first_competence->setLibelle('Competence Deux');
                
        $em->persist($first_competence);
    
        $first_utilisateurcompetence = new Utilisateurcompetence();
        $first_utilisateurcompetence->setNote(2);
        $first_utilisateurcompetence->setCompetence($first_competence);
        $first_utilisateurcompetence->setUtilisateur($first_utilisateur);
        
        $em->persist($first_utilisateurcompetence);
        
        $first_module = new Module();
        $first_module->setLibelle('Module Deux');
        $first_module->setCode('Code Module Deux');
        
        $em->persist($first_module);
        
        $first_groupe = new Groupe();
        $first_groupe->setLibelle('Groupe Deux');
        $first_groupe->setModules($first_module);
        
        $em->persist($first_groupe);
        
        $first_proprieteetendue = new Proprieteetendue();
        $first_proprieteetendue->setLibelle('Propriété étendue Deux');
        
        $em->persist($first_proprieteetendue);
        
        $first_groupepropriete = new Groupepropriete();
        $first_groupepropriete->setValeur("Valeur un groupe propriété");
        $first_groupepropriete->setGroupe($first_groupe);
        $first_groupepropriete->setPropriete($first_proprieteetendue);
        
        $em->persist($first_groupepropriete);
                
        $first_typecontrat = new Typecontrat();
        $first_typecontrat->setLibelle("CDD");
        
        $em->persist($first_typecontrat);
        
        $first_offre = new Offre();
        $first_offre->setTitre('Offre Deux');
        $first_offre->setDescription('Description offre deux');
        $first_offre->setDetailcontact('Detail contact offre deux');
        $first_offre->setDuree('3');
        $first_offre->setTypeposte('Type poste offre deux');
        $first_offre->setTypecontrat($first_typecontrat);
        $first_offre->setUtilisateur($first_utilisateur);
        
        $em->persist($first_offre);
        
        $first_evenement = new Evenement();
        $first_evenement->setLibelle('Evenement Deux');
        $first_evenement->setDescription("Description de l'évenement deux");
        $first_evenement->setDateDebut(new \DateTime('2014-07-01'));
        $first_evenement->setDateModification(new \DateTime('2014-07-03'));
        $first_evenement->setDateFin(new \DateTime('2014-08-30'));
        $first_evenement->setStatut(true);
        $first_evenement->setAuteur($first_utilisateur);
        
        $em->persist($first_evenement);
        
        $first_evenementutilisateur = new Evenementutilisateur();
        $first_evenementutilisateur->setParticipe(true);
        $first_evenementutilisateur->setEvenement($first_evenement);
        $first_evenementutilisateur->setUtilisateur($first_utilisateur);
        
        $em->persist($first_evenementutilisateur);
        
        $first_promotion = new Promotion();
        $first_promotion->setLibelle('Promotion 2014');
        $first_promotion->setAnnee(2010);
        $first_promotion->setEmail('promotion2014@imie.fr');
        $first_promotion->setUtilisateurs($first_utilisateur);
        
        $em->persist($first_promotion);
        
        $first_utilisateurpropriete = new Utilisateurpropriete();
        $first_utilisateurpropriete->setValeur('Propriété utilisateur deux');
        $first_utilisateurpropriete->setUtilisateur($first_utilisateur);
        $first_utilisateurpropriete->setProprieteEtendue($first_proprieteetendue);
        
        $em->persist($first_utilisateurpropriete);
        
        $em->flush();

        
    }
    
    public function getOrder()
    {
        return 2; // the order in which fixtures will be loaded
    }
}