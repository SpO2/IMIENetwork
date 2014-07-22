<?php
namespace ImieNetwork\SiteBundle\DataFixtures\ORM;
 
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

use ImieNetwork\SiteBundle\Entity\Secteuractivite;
use ImieNetwork\SiteBundle\Entity\Utilisateur;
use ImieNetwork\SiteBundle\Entity\Ville;
use ImieNetwork\SiteBundle\Entity\Experience;
use ImieNetwork\SiteBundle\Entity\Utilisateurpropriete;
use ImieNetwork\SiteBundle\Entity\Proprieteetendue;
use ImieNetwork\SiteBundle\Entity\Groupepropriete;
use ImieNetwork\SiteBundle\Entity\Groupe;
use ImieNetwork\SiteBundle\Entity\Module;
use ImieNetwork\SiteBundle\Entity\Evenement;
use ImieNetwork\SiteBundle\Entity\Evenementutilisateur;
use ImieNetwork\SiteBundle\Entity\Promotion;
use ImieNetwork\SiteBundle\Entity\Competence;
use ImieNetwork\SiteBundle\Entity\Utilisateurcompetence;
use ImieNetwork\SiteBundle\Entity\Typecontrat;
use ImieNetwork\SiteBundle\Entity\Offre;

class LoadAllData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $em)
    {
        /* Ville */
        $first_ville = new Ville();
        $first_ville->setLibelle('Rennes');
        $first_ville->setCodePostal('35000');
        
        $second_ville = new Ville();
        $second_ville->setLibelle('Paris');
        $second_ville->setCodePostal('75000');
        
        $third_ville = new Ville();
        $third_ville->setLibelle('Marseille');
        $third_ville->setCodePostal('13000');
    
        
        /* Secteuractivite */
        $first_secteuractivite = new Secteuractivite();
        $first_secteuractivite->setLibelle('Développeur');
        
        $second_secteuractivite = new Secteuractivite();
        $second_secteuractivite->setLibelle('Réseau');
        
        
        /* Module */
        $first_module = new Module();
        $first_module->setLibelle('Module Un');
        $first_module->setCode('Code Module Un');
        
        $second_module = new Module();
        $second_module->setLibelle('Module Deux');
        $second_module->setCode('Code Module Deux');
        
        
        /* Groupe */
        $first_groupe = new Groupe();
        $first_groupe->setLibelle('Groupe Un');
        $first_groupe->addModule($first_module);
        
        $second_groupe = new Groupe();
        $second_groupe->setLibelle('Groupe Deux');
        $second_groupe->addModule($second_module);
        
        
        /* Proprieteetendue*/
        $first_proprieteetendue = new Proprieteetendue();
        $first_proprieteetendue->setLibelle('Propriété étendue Un');
        
        $second_proprieteetendue = new Proprieteetendue();
        $second_proprieteetendue->setLibelle('Propriété étendue Deux');
        
        
        /* Groupepropriete */
        $first_groupepropriete = new Groupepropriete();
        $first_groupepropriete->setValeur("Valeur Un groupe propriété");
        $first_groupepropriete->setGroupe($first_groupe);
        $first_groupepropriete->setPropriete($first_proprieteetendue);
        
        $second_groupepropriete = new Groupepropriete();
        $second_groupepropriete->setValeur("Valeur Deux groupe propriété");
        $second_groupepropriete->setGroupe($second_groupe);
        $second_groupepropriete->setPropriete($second_proprieteetendue);
        
        
        /* Competence */
        $first_competence = new Competence();
        $first_competence->setLibelle('Competence Un');
        
        $second_competence = new Competence();
        $second_competence->setLibelle('Competence Deux');
        
        
        /* Typecontrat */
        $first_typecontrat = new Typecontrat();
        $first_typecontrat->setLibelle("CDI 1");
        
        $second_typecontrat = new Typecontrat();
        $second_typecontrat->setLibelle("CDD 2");
        
        $third_typecontrat = new Typecontrat();
        $third_typecontrat->setLibelle("Alternance 3");
        
    
        /* Utilisateur */
        $first_user = new Utilisateur();
        $first_user->setUsername('user1');
        $first_user->setUsernamecanonical('user1');
        $first_user->setEmail('user1@imie.fr');
        $first_user->setEmailcanonical('user1@imie.fr');
        $first_user->setEnabled(true);
        $first_user->setPassword("dykIbjhfbmmU9i7U1YM49gUuXqdgkSKSrpnaWyYVAGjC/WgDSRLtwyk/aqi5OHkRqg9NXeTGFfCc8kk6NcR2SQ==");
        $first_user->setLocked(false);
        $first_user->setExpired(false);
        $first_user->setRoles(array('ROLE_ADMIN'));
        $first_user->setCredentialsexpired(0);
        $first_user->setNom('nomuser1');
        $first_user->setPrenom('prenomuser1');
        $first_user->setAdresse('adresse user1');
        $first_user->setTelephone('0123456789');   
        $first_user->setDatecreation(new \DateTime('NOW'));
        $first_user->setDatemodification(new \DateTime('NOW'));
        $first_user->setLangue('français');
        $first_user->setVille($first_ville);
        $first_user->addMesSecteursActivite($first_secteuractivite);
        $first_user->addGroupe($first_groupe);

        
        /* Experience */
        $first_experience = new Experience();
        $first_experience->setLibelle('First experience');
        $first_experience->setDateDebut(new \DateTime('2014-01-01'));
        $first_experience->setDateFin(new \DateTime('2014-02-02'));
        $first_experience->setDescription('première expérience saisie');
        $first_experience->setUtilisateur($first_user);
        
        
        /* Proprieteetendue */
        $first_userpropriete = new Utilisateurpropriete();
        $first_userpropriete->setValeur('Propriété utilisateur Un');
        $first_userpropriete->setUtilisateur($first_user);
        $first_userpropriete->setProprieteEtendue($first_proprieteetendue);
        
        
        /* Evenement */
        $first_evenement = new Evenement();
        $first_evenement->setLibelle('Evenement Un');
        $first_evenement->setDescription("Description de l'évenement Un");
        $first_evenement->setDateDebut(new \DateTime('2014-07-05'));
        $first_evenement->setDateModification(new \DateTime('2014-07-03'));
        $first_evenement->setDateFin(new \DateTime('2015-07-30'));
        $first_evenement->setStatut(true);
        $first_evenement->setAuteur($first_user);
        
        
        /* Evenementutilisateur */
        $first_evenementutilisateur = new Evenementutilisateur();
        $first_evenementutilisateur->setParticipe(true);
        $first_evenementutilisateur->setEvenement($first_evenement);
        $first_evenementutilisateur->setUtilisateur($first_user);
        
        
        /* Promotion */
        $first_promotion = new Promotion();
        $first_promotion->setLibelle('Promotion 2010');
        $first_promotion->setAnnee(2010);
        $first_promotion->setEmail('promotion2010@imie.fr');
        $first_promotion->setUtilisateurs($first_user);
        
        
        /* Utilisateurcompetence */
        $first_usercompetence = new Utilisateurcompetence();
        $first_usercompetence->setNote(2);
        $first_usercompetence->setCompetence($first_competence);
        $first_usercompetence->setUtilisateur($first_user);
        
        
        /* Offre */
        $first_offre = new Offre();
        $first_offre->setTitre('Offre Un');
        $first_offre->setDescription('Description offre un');
        $first_offre->setDetailcontact('Detail contact offre un');
        $first_offre->setDuree('5');
        $first_offre->setTypeposte('Type poste offre un');
        $first_offre->setTypecontrat($first_typecontrat);
        $first_offre->setUtilisateur($first_user);
        
        
        /* Utilisateur2 */
        $second_user = new Utilisateur();
        $second_user->setUsername('user2');
        $second_user->setUsernamecanonical('user2');
        $second_user->setEmail('user2@imie.fr');
        $second_user->setEmailcanonical('user2@imie.fr');
        $second_user->setEnabled(true);
        $second_user->setPassword("dykIbjhfbmmU9i7U1YM49gUuXqdgkSKSrpnaWyYVAGjC/WgDSRLtwyk/aqi5OHkRqg9NXeTGFfCc8kk6NcR2SQ==");
        $second_user->setLocked(false);
        $second_user->setExpired(false);
        $second_user->setRoles(array('ROLE_ELEVE'));
        $second_user->setCredentialsexpired(0);
        $second_user->setNom('nomuser2');
        $second_user->setPrenom('prenomuser2');
        $second_user->setAdresse('adresse user2');
        $second_user->setTelephone('0123456789');   
        $second_user->setDatecreation(new \DateTime('NOW'));
        $second_user->setDatemodification(new \DateTime('NOW'));
        $second_user->setLangue('français');
        $second_user->setVille($second_ville);
        $second_user->addMesSecteursActivite($second_secteuractivite);
        $second_user->addGroupe($second_groupe);

        
        /* Experience */
        $second_experience = new Experience();
        $second_experience->setLibelle('First experience');
        $second_experience->setDateDebut(new \DateTime('2014-01-01'));
        $second_experience->setDateFin(new \DateTime('2014-02-02'));
        $second_experience->setDescription('première expérience saisie');
        $second_experience->setUtilisateur($second_user);
        
        
        /* Proprieteetendue */
        $second_userpropriete = new Utilisateurpropriete();
        $second_userpropriete->setValeur('Propriété utilisateur Un');
        $second_userpropriete->setUtilisateur($second_user);
        $second_userpropriete->setProprieteEtendue($second_proprieteetendue);
        
        
        /* Evenement */
        $second_evenement = new Evenement();
        $second_evenement->setLibelle('Evenement Deux');
        $second_evenement->setDescription("Description de l'évenement Deux");
        $second_evenement->setDateDebut(new \DateTime('2014-07-05'));
        $second_evenement->setDateModification(new \DateTime('2014-07-03'));
        $second_evenement->setDateFin(new \DateTime('2014-08-30'));
        $second_evenement->setStatut(true);
        $second_evenement->setAuteur($second_user);
        
        
        /* Evenementutilisateur */
        $second_evenementutilisateur = new Evenementutilisateur();
        $second_evenementutilisateur->setParticipe(true);
        $second_evenementutilisateur->setEvenement($second_evenement);
        $second_evenementutilisateur->setUtilisateur($second_user);
        
        
        /* Promotion */
        $second_promotion = new Promotion();
        $second_promotion->setLibelle('Promotion 2014');
        $second_promotion->setAnnee(2014);
        $second_promotion->setEmail('promotion2014@imie.fr');
        $second_promotion->setUtilisateurs($second_user);
        
        
        /* Utilisateurcompetence */
        $second_usercompetence = new Utilisateurcompetence();
        $second_usercompetence->setNote(4);
        $second_usercompetence->setCompetence($second_competence);
        $second_usercompetence->setUtilisateur($second_user);
        
        
        /* Offre */
        $second_offre = new Offre();
        $second_offre->setTitre('Offre Deux');
        $second_offre->setDescription('Description offre deux');
        $second_offre->setDetailcontact('Detail contact offre deux');
        $second_offre->setDuree('8');
        $second_offre->setTypeposte('Type poste offre Deux');
        $second_offre->setTypecontrat($second_typecontrat);
        $second_offre->setUtilisateur($second_user);
        
        
        /*persist*/
        $em->persist($first_ville);
        $em->persist($second_ville);
        $em->persist($third_ville);
        $em->persist($first_secteuractivite);
        $em->persist($second_secteuractivite);
        $em->persist($first_module);
        $em->persist($second_module);
        $em->persist($first_groupe);
        $em->persist($second_groupe);
        $em->persist($first_proprieteetendue);
        $em->persist($second_proprieteetendue);
        $em->persist($first_groupepropriete);
        $em->persist($second_groupepropriete);
        $em->persist($first_competence);
        $em->persist($second_competence);
        $em->persist($first_typecontrat);
        $em->persist($second_typecontrat);
        $em->persist($third_typecontrat);
        $em->persist($first_user);
        $em->persist($first_experience);
        $em->persist($first_userpropriete);
        $em->persist($first_evenement);
        $em->persist($first_evenementutilisateur);
        $em->persist($first_promotion);
        $em->persist($first_usercompetence);
        $em->persist($first_offre);
        $em->persist($second_user);
        $em->persist($second_experience);
        $em->persist($second_userpropriete);
        $em->persist($second_evenement);
        $em->persist($second_evenementutilisateur);
        $em->persist($second_promotion);
        $em->persist($second_usercompetence);
        $em->persist($second_offre);
        
        
        /* flush */
        $em->flush();

        
    }
    
    public function getOrder()
    {
        return 34;
    }
}