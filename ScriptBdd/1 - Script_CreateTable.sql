/*--------------------------------------------------------------------------*/
/* TABLE : 'typecontrat'                                                    */
/* Clé Primaire = cd                                                        */
/* Liste les différents types de contrats.                                  */
/*--------------------------------------------------------------------------*/
CREATE TABLE typecontrat (
  id       INTEGER       NOT NULL  AUTO_INCREMENT, 
  libelle  VARCHAR(255)  NOT NULL,
PRIMARY KEY(id)
);

/*--------------------------------------------------------------------------*/
/* TABLE : 'competence'                                                     */
/* Clé Primaire = id                                                        */
/* Liste les différents types de compétences.                               */
/*--------------------------------------------------------------------------*/
CREATE TABLE competence (
  id       INTEGER       NOT NULL  AUTO_INCREMENT, 
  libelle  VARCHAR(255)  NOT NULL,
PRIMARY KEY(id)
);

/*--------------------------------------------------------------------------*/
/* TABLE : 'ville'                                                          */
/* Clé Primaire = id                                                        */
/* Liste des départements.                                                  */
/*--------------------------------------------------------------------------*/
CREATE TABLE ville (
  id          INTEGER  NOT NULL  AUTO_INCREMENT,
  libelle     VARCHAR(255),
  codepostal  VARCHAR(20),  
PRIMARY KEY(id)
);

/*--------------------------------------------------------------------------*/
/* TABLE : 'secteuractivite'                                                */
/* Clé Primaire = id                                                        */
/* Liste les différents types de compétences.                               */
/*--------------------------------------------------------------------------*/
CREATE TABLE secteuractivite (
  id       INTEGER  NOT NULL  AUTO_INCREMENT, 
  libelle  VARCHAR(255)  NOT NULL,
PRIMARY KEY(id)
);

/*--------------------------------------------------------------------------*/
/* TABLE : 'utilisateuractivite'                                            */
/* Clé Primaire =                                                           */
/* Liaison entre utilisateur et secteuractivite                             */
/*--------------------------------------------------------------------------*/
CREATE TABLE utilisateuractivite (
id       INTEGER  NOT NULL  AUTO_INCREMENT,
  idutilisateur  INTEGER  NOT NULL, 
  idactivite     INTEGER  NOT NULL,
PRIMARY KEY(id)
);

/*--------------------------------------------------------------------------*/
/* TABLE : 'evenement'                                             	        */
/* Clé Primaire = id                                                        */
/* Liste les évènements créés par l'IMIE.                                   */
/*--------------------------------------------------------------------------*/
CREATE TABLE evenement (
  id                INTEGER  NOT NULL  AUTO_INCREMENT,
  idutilisateur     INTEGER  NOT NULL,
  libelle           VARCHAR(255),
  description       TEXT,
  datedebut         DATETIME,
  datemodification  DATETIME,
  datefin           DATETIME,
  statut            INTEGER,
PRIMARY KEY(id)
);

/*--------------------------------------------------------------------------*/
/* TABLE : 'utilisateur'                                             	    */
/* Clé Primaire = id                                                        */
/* Liste les différents comptes (Eleves, Entreprise, Administration).       */
/*--------------------------------------------------------------------------*/
CREATE TABLE utilisateur (
  id                INTEGER  NOT NULL  AUTO_INCREMENT,
  nom               VARCHAR(255),
  prenom            VARCHAR(255),
  adresse           TEXT,
  telephone         VARCHAR(100),
  statut            INTEGER,
  login             VARCHAR(30),
  pass              VARCHAR(15),
  email             VARCHAR(100),
  idville           Integer,
  datecreation      DATETIME,
  datemodification  DATETIME,
  langue            VARCHAR(100),
PRIMARY KEY(id)
);

/*--------------------------------------------------------------------------*/
/* TABLE : 'evenementutilisateur'            	 		                    */
/* Clé Primaire =                                                           */
/* Liste les différents comptes participant aux évènements.                 */
/*--------------------------------------------------------------------------*/
CREATE TABLE evenementutilisateur (
id       INTEGER  NOT NULL  AUTO_INCREMENT,
  idutilisateur  INTEGER  NOT NULL,
  idevenement    INTEGER  NOT NULL,
  participe      TINYINT(1),
PRIMARY KEY(id)
);

/*--------------------------------------------------------------------------*/
/* TABLE : 'groupe'                                     	                */
/* Clé Primaire = id                                                        */
/* Liste les différents groupes.                                            */
/*--------------------------------------------------------------------------*/
CREATE TABLE groupe (
  id       INTEGER  NOT NULL  AUTO_INCREMENT,
  libelle  VARCHAR(255),
PRIMARY KEY(id)
);

/*--------------------------------------------------------------------------*/
/* TABLE : 'groupepropriete'                                                */
/* Clé Primaire =                                                           */
/* Liste les différents groupes.                                            */
/*--------------------------------------------------------------------------*/
CREATE TABLE groupepropriete (
id       INTEGER  NOT NULL  AUTO_INCREMENT,
  idgroupe     INTEGER  NOT NULL,
  idpropriete  INTEGER  NOT NULL,
  valeur       INTEGER  NOT NULL,
PRIMARY KEY(id)
);

/*--------------------------------------------------------------------------*/
/* TABLE : 'groupeutilisateur'                            	 	            */
/* Clé Primaire = id                                                        */
/* Liste les différents groupes.                                            */
/*--------------------------------------------------------------------------*/
CREATE TABLE groupeutilisateur (
id       INTEGER  NOT NULL  AUTO_INCREMENT,
  idutilisateur   INTEGER  NOT NULL,
  idgroupe        INTEGER  NOT NULL,
PRIMARY KEY(id)
);

/*--------------------------------------------------------------------------*/
/* TABLE : 'proprieteetendue'                              	                */
/* Clé Primaire = id                                                        */
/* Liste les différentes propriétés des groupes.                            */
/*--------------------------------------------------------------------------*/
CREATE TABLE proprieteetendue (
  id        INTEGER  NOT NULL  AUTO_INCREMENT,
  libelle   VARCHAR(255),
PRIMARY KEY(id)
);

/*--------------------------------------------------------------------------*/
/* TABLE : 'utilisateurpropriete'                              	            */
/* Clé Primaire =                                                           */
/* Liaison entre les groupes et les propriétés.                             */
/*--------------------------------------------------------------------------*/
CREATE TABLE utilisateurpropriete (
id       INTEGER  NOT NULL  AUTO_INCREMENT,
  idutilisateur  INTEGER  NOT NULL,
  idpropriete    INTEGER  NOT NULL,
  valeur         TEXT,
PRIMARY KEY(id)
);

/*--------------------------------------------------------------------------*/
/* TABLE : 'module'                                     	                */
/* Clé Primaire = id                                                        */
/* Liste les différentes modules des groupes.                               */
/*--------------------------------------------------------------------------*/
CREATE TABLE module (
  id        INTEGER  NOT NULL  AUTO_INCREMENT,
  libelle   VARCHAR(255),
  code      VARCHAR(255),
PRIMARY KEY(id)
);

/*--------------------------------------------------------------------------*/
/* TABLE : 'groupemodule'                                     	            */
/* Clé Primaire = id                                                        */
/* Liste les différentes modules des groupes.                               */
/*--------------------------------------------------------------------------*/
CREATE TABLE groupemodule (
id       INTEGER  NOT NULL  AUTO_INCREMENT,
  idgroupe  INTEGER  NOT NULL,
  idmodule  INTEGER  NOT NULL,
PRIMARY KEY(id)
);

/*--------------------------------------------------------------------------*/
/* TABLE : 'offre'                                              	        */
/* Clé Primaire = id                                                        */
/* Liste les différentes offres créées par les utilisateurs.                */
/*--------------------------------------------------------------------------*/
CREATE TABLE offre (
  id                  INTEGER  NOT NULL  AUTO_INCREMENT,
  idutilisateur       INTEGER  NOT NULL,
  idtypecontrat       INTEGER  NOT NULL,
  titre               VARCHAR(255)  NOT NULL,
  description         TEXT,
  detailcontact       TEXT,
  duree               INTEGER,
  typeposte           VARCHAR(255),
  datedebut           DATETIME,
  datemodification    DATETIME,
  datefinpublication  DATETIME,  
  datefin             DATETIME,
PRIMARY KEY(id)
);

/*--------------------------------------------------------------------------*/
/* TABLE : 'enquete'                                              	        */
/* Clé Primaire = id                                                        */
/* Liste le parcours professionnel d'un élève.                              */
/*--------------------------------------------------------------------------*/
CREATE TABLE enquete (
  id   INTEGER  NOT NULL  AUTO_INCREMENT,
  url  TEXT,
PRIMARY KEY(id)
);

/*--------------------------------------------------------------------------*/
/* TABLE : 'invitation'                                          	        */
/* Clé Primaire = id                                                        */
/* Liste les invitations envoyées aux utilisateurs.                         */
/*--------------------------------------------------------------------------*/
CREATE TABLE invitation (
  id           INTEGER  NOT NULL,
  idevenement  INTEGER  NOT NULL,
PRIMARY KEY(id)
);

/*--------------------------------------------------------------------------*/
/* TABLE : 'experience'                                           	        */
/* Clé Primaire = id                                                        */
/* Liste les expériences pro d'un utilisateur.                              */
/*--------------------------------------------------------------------------*/
CREATE TABLE experience (
  id             INTEGER  NOT NULL  AUTO_INCREMENT,
  idutilisateur  INTEGER  NOT NULL,
  libelle        VARCHAR(255),
  datedebut      DATETIME  NOT NULL,
  datefin        DATETIME,
  description    TEXT,
PRIMARY KEY(id)
);
/*--------------------------------------------------------------------------*/
/* TABLE : 'utilisateurcompetence'                                          */
/* Clé Primaire =                                                           */
/* Liaison entre compétences et Utilisateur.                                */
/*--------------------------------------------------------------------------*/
CREATE TABLE utilisateurcompetence (
id       INTEGER  NOT NULL  AUTO_INCREMENT,
  idcompetence   INTEGER  NOT NULL,
  idutilisateur  INTEGER  NOT NULL,  
  note           INTEGER,
PRIMARY KEY(id)
);

/*--------------------------------------------------------------------------*/
/* TABLE : 'message'                                                        */
/* Clé Primaire = id                                                        */
/* Messages.                                                                */
/*--------------------------------------------------------------------------*/
CREATE TABLE message (
  id              INTEGER  NOT NULL,
  idutilisateur   INTEGER  NOT NULL,
  idtypeMessage   INTEGER  NOT NULL,
  idconversation  INTEGER  NOT NULL,
  contenu         TEXT,
  datemessage     DATETIME,  
PRIMARY KEY(id)
);

/*--------------------------------------------------------------------------*/
/* TABLE : 'typemessage'                                                    */
/* Clé Primaire = Id                                                        */
/* Messages.                                                                */
/*--------------------------------------------------------------------------*/
CREATE TABLE typemessage (
  id       INTEGER  NOT NULL  AUTO_INCREMENT,
  libelle  VARCHAR(255),
PRIMARY KEY(id)
);


/*--------------------------------------------------------------------------*/
/* TABLE : 'document'                                                       */
/* Clé Primaire = id                                                        */
/* Messages.                                                                */
/*--------------------------------------------------------------------------*/
CREATE TABLE document (
  id             INTEGER  NOT NULL,
  idutilisateur  INTEGER  NOT NULL,
  libelle        VARCHAR(255),
  url            TEXT,
  statut         INTEGER,  
PRIMARY KEY(id)
);

/*--------------------------------------------------------------------------*/
/* TABLE : 'conversation'                                                   */
/* Clé Primaire = id                                                        */
/* Liaison entres les conversations et les utilisateurs.                    */
/*--------------------------------------------------------------------------*/
CREATE TABLE conversation (
  id             INTEGER  NOT NULL  AUTO_INCREMENT,
  idutilisateur  INTEGER  NOT NULL,
  titre          VARCHAR(255),
  contenu        TEXT,
  dateconv       DATETIME,
PRIMARY KEY(id)
);

/*--------------------------------------------------------------------------*/
/* TABLE : 'conversationutilisateur'                                        */
/* Clé Primaire =                                                           */
/* Liaison entres les conversations et les utilisateurs.                    */
/*--------------------------------------------------------------------------*/
CREATE TABLE conversationutilisateur (
id       INTEGER  NOT NULL  AUTO_INCREMENT,
  idconversation  INTEGER  NOT NULL,
  idutilisateur   INTEGER  NOT NULL, 
PRIMARY KEY(id)
);

/*--------------------------------------------------------------------------*/
/* TABLE : 'documentmessage'                                                */
/* Clé Primaire =                                                           */
/* Liaison entre les documents et les messages.                             */
/*--------------------------------------------------------------------------*/
CREATE TABLE documentmessage (
id       INTEGER  NOT NULL  AUTO_INCREMENT,
  iddocument  INTEGER  NOT NULL,
  idmessage   INTEGER  NOT NULL, 
PRIMARY KEY(id)
);

/*--------------------------------------------------------------------------*/
/* TABLE : 'promotion'                                                      */
/* Clé Primaire = id                                                        */
/* Liste les promotions.                                                    */
/*--------------------------------------------------------------------------*/
CREATE TABLE promotion (
  id       INTEGER       NOT NULL  AUTO_INCREMENT,
  libelle  VARCHAR(255)  NOT NULL, 
  annee    INTEGER,
  email    VARCHAR(255),
PRIMARY KEY(id)
);

/*--------------------------------------------------------------------------*/
/* TABLE : 'utilisateurpromotion'                                           */
/* Clé Primaire =                                                           */
/* Liste Les promotions.                                                    */
/*--------------------------------------------------------------------------*/
CREATE TABLE utilisateurpromotion (
	id	INTEGER NOT NULL AUTO_INCREMENT,
  idutilisateur  INTEGER  NOT NULL,
  idpromotion    INTEGER  NOT NULL, 
PRIMARY KEY(id)
);

/*--------------------------------------------------------------------------*/
/* TABLE : 'offrecomp'                                                      */
/* Clé Primaire =                                                           */
/* Liaison entre les offres et les compétences.                             */
/*--------------------------------------------------------------------------*/
CREATE TABLE offrecomp (
id       INTEGER  NOT NULL  AUTO_INCREMENT,
  idoffre       INTEGER  NOT NULL,
  idcompetence  INTEGER  NOT NULL, 
PRIMARY KEY(id)
);

/*--------------------------------------------------------------------------*/
/* TABLE : 'offreville'                                                     */
/* Clé Primaire =                                                           */
/* Liaison entre les offres et les départements.                            */
/*--------------------------------------------------------------------------*/
CREATE TABLE offreville (
id       INTEGER  NOT NULL  AUTO_INCREMENT,
  idoffre  INTEGER  NOT NULL,
  idville  INTEGER  NOT NULL, 
PRIMARY KEY(id)
);