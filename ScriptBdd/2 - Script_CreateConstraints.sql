/*--------------------------------------------------------------------------*/
/* TABLE : 'offre'                                               	    */
/* Clé Primaire = id                                                        */
/*--------------------------------------------------------------------------*/
ALTER TABLE offre
ADD CONSTRAINT FK_Offre_TypeCt FOREIGN KEY (idTypecontrat)  REFERENCES typecontrat(id)  ON UPDATE CASCADE  ON DELETE CASCADE,
ADD CONSTRAINT FK_Offre_Util   FOREIGN KEY (idutilisateur)  REFERENCES utilisateur(id)  ON UPDATE CASCADE  ON DELETE CASCADE;

/*--------------------------------------------------------------------------*/
/* TABLE : 'evenementutilisateur'                       	            */
/* Clé Primaire =                                                           */
/*--------------------------------------------------------------------------*/
ALTER TABLE evenementutilisateur
ADD CONSTRAINT FK_Part_Util FOREIGN KEY (idutilisateur)  REFERENCES utilisateur(id)  ON UPDATE CASCADE  ON DELETE CASCADE,
ADD CONSTRAINT FK_Part_Evnt FOREIGN KEY (idevenement)    REFERENCES evenement(id)    ON UPDATE CASCADE  ON DELETE CASCADE;

/*--------------------------------------------------------------------------*/
/* TABLE : 'utilisateur'                                             	    */
/* Clé Primaire = id                                                        */
/*--------------------------------------------------------------------------*/
ALTER TABLE utilisateur
ADD CONSTRAINT FK_Part_Vill FOREIGN KEY (idville)  REFERENCES ville(id)  ON UPDATE CASCADE  ON DELETE CASCADE;

/*--------------------------------------------------------------------------*/
/* TABLE : 'groupeutilisateur'                                         	    */
/* Clé Primaire =                                                           */
/*--------------------------------------------------------------------------*/
ALTER TABLE groupeutilisateur
ADD CONSTRAINT FK_GpUser_Util FOREIGN KEY (idutilisateur)  REFERENCES utilisateur(id)  ON UPDATE CASCADE  ON DELETE CASCADE,
ADD CONSTRAINT FK_GpUser_Gp   FOREIGN KEY (idgroupe)       REFERENCES groupe(id)       ON UPDATE CASCADE  ON DELETE CASCADE;

/*--------------------------------------------------------------------------*/
/* TABLE : 'experience'                                           	    */
/* Clé Primaire = id                                                        */
/*--------------------------------------------------------------------------*/
ALTER TABLE experience
ADD CONSTRAINT FK_Exp_Util FOREIGN KEY (idutilisateur)  REFERENCES utilisateur(id)  ON UPDATE CASCADE  ON DELETE CASCADE;

/*--------------------------------------------------------------------------*/
/* TABLE : 'document'                                                       */
/* Clé Primaire =                                                           */
/*--------------------------------------------------------------------------*/
ALTER TABLE document
ADD CONSTRAINT FK_DocUtil_Util  FOREIGN KEY (idutilisateur)  REFERENCES utilisateur(id)  ON UPDATE CASCADE  ON DELETE CASCADE;

/*--------------------------------------------------------------------------*/
/* TABLE : 'documentmessage'                                                */
/* Clé Primaire =                                                           */
/*--------------------------------------------------------------------------*/
ALTER TABLE documentmessage
ADD CONSTRAINT FK_DocMess_Doc   FOREIGN KEY (iddocument)  REFERENCES document(id)  ON UPDATE CASCADE  ON DELETE CASCADE,
ADD CONSTRAINT FK_DocMess_Mess  FOREIGN KEY (idmessage)   REFERENCES message(id)   ON UPDATE CASCADE  ON DELETE CASCADE;

/*--------------------------------------------------------------------------*/
/* TABLE : 'message'                                                        */
/* Clé Primaire =                                                           */
/*--------------------------------------------------------------------------*/
ALTER TABLE message
ADD CONSTRAINT FK_Mess_Util    FOREIGN KEY (idutilisateur)   REFERENCES utilisateur(id)   ON UPDATE CASCADE  ON DELETE CASCADE,
ADD CONSTRAINT FK_Mess_TpMess  FOREIGN KEY (idtypemessage)   REFERENCES typemessage(id)   ON UPDATE CASCADE  ON DELETE CASCADE,
ADD CONSTRAINT FK_Mess_Conv    FOREIGN KEY (idconversation)  REFERENCES conversation(id)  ON UPDATE CASCADE  ON DELETE CASCADE;


/*--------------------------------------------------------------------------*/
/* TABLE : 'utilisateurpromotion'                                           */
/* Clé Primaire =                                                           */
/*--------------------------------------------------------------------------*/
ALTER TABLE utilisateurpromotion
ADD CONSTRAINT FK_utilPromo_Util  FOREIGN KEY (idutilisateur)  REFERENCES utilisateur(id)  ON UPDATE CASCADE  ON DELETE CASCADE,
ADD CONSTRAINT FK_ElvPromo_Promo  FOREIGN KEY (idpromotion)    REFERENCES promotion(id)    ON UPDATE CASCADE  ON DELETE CASCADE;

/*--------------------------------------------------------------------------*/
/* TABLE : 'offrecomp'                                                      */
/* Clé Primaire =                                                           */
/*--------------------------------------------------------------------------*/
ALTER TABLE offrecomp
ADD CONSTRAINT FK_OffCmp_Off  FOREIGN KEY (idoffre)       REFERENCES offre(id)       ON UPDATE CASCADE  ON DELETE CASCADE,
ADD CONSTRAINT FK_OffCmp_Cmp  FOREIGN KEY (idcompetence)  REFERENCES competence(id)  ON UPDATE CASCADE  ON DELETE CASCADE;

/*--------------------------------------------------------------------------*/
/* TABLE : 'invitation'                                                     */
/* Clé Primaire = id                                                        */
/*--------------------------------------------------------------------------*/
ALTER TABLE invitation
ADD CONSTRAINT FK_Invit_Mess   FOREIGN KEY (id)  REFERENCES message(id)  ON UPDATE CASCADE  ON DELETE CASCADE;

/*--------------------------------------------------------------------------*/
/* TABLE : 'enquete'                                                        */
/* Clé Primaire = id                                                        */
/*--------------------------------------------------------------------------*/
ALTER TABLE enquete
ADD CONSTRAINT FK_Enq_Mess   FOREIGN KEY (id)  REFERENCES message(id)  ON UPDATE CASCADE  ON DELETE CASCADE;

/*--------------------------------------------------------------------------*/
/* TABLE : 'conversation'                                                   */
/* Clé Primaire = id                                                        */
/*--------------------------------------------------------------------------*/
ALTER TABLE conversation
ADD CONSTRAINT FK_Conv_Util   FOREIGN KEY (idutilisateur)  REFERENCES utilisateur(id)  ON UPDATE CASCADE  ON DELETE CASCADE;

/*--------------------------------------------------------------------------*/
/* TABLE : 'utilisateuractivite'                                            */
/* Clé Primaire = id                                                        */
/*--------------------------------------------------------------------------*/
ALTER TABLE utilisateuractivite
ADD CONSTRAINT FK_UtAct_Util   FOREIGN KEY (idutilisateur)  REFERENCES utilisateur(id)       ON UPDATE CASCADE  ON DELETE CASCADE,
ADD CONSTRAINT FK_UtAct_Act    FOREIGN KEY (idactivite)     REFERENCES secteuractivite(id)  ON UPDATE CASCADE  ON DELETE CASCADE;

/*--------------------------------------------------------------------------*/
/* TABLE : 'evenement'                                                      */
/* Clé Primaire = id                                                        */
/*--------------------------------------------------------------------------*/
ALTER TABLE evenement
ADD CONSTRAINT FK_Evt_Util   FOREIGN KEY (idutilisateur)  REFERENCES utilisateur(id)  ON UPDATE CASCADE  ON DELETE CASCADE;

/*--------------------------------------------------------------------------*/
/* TABLE : 'groupepropriete'                                                */
/* Clé Primaire =                                                           */
/*--------------------------------------------------------------------------*/
ALTER TABLE groupepropriete
ADD CONSTRAINT FK_GpProp_Gp     FOREIGN KEY (idgroupe)     REFERENCES groupe(id)            ON UPDATE CASCADE  ON DELETE CASCADE,
ADD CONSTRAINT FK_GpProp_Prop   FOREIGN KEY (idpropriete)  REFERENCES proprieteetendue(id)  ON UPDATE CASCADE  ON DELETE CASCADE;

/*--------------------------------------------------------------------------*/
/* TABLE : 'utilisateurpropriete'                                           */
/* Clé Primaire =                                                           */
/*--------------------------------------------------------------------------*/
ALTER TABLE utilisateurpropriete
ADD CONSTRAINT FK_UtProp_Ut     FOREIGN KEY (idutilisateur)  REFERENCES utilisateur(id)       ON UPDATE CASCADE  ON DELETE CASCADE,
ADD CONSTRAINT FK_UtProp_Prop   FOREIGN KEY (idpropriete)    REFERENCES proprieteetendue(id)  ON UPDATE CASCADE  ON DELETE CASCADE;

/*--------------------------------------------------------------------------*/
/* TABLE : 'groupemodule'                                                   */
/* Clé Primaire = id                                                        */
/*--------------------------------------------------------------------------*/
ALTER TABLE groupemodule
ADD CONSTRAINT FK_GpModu_Gp   FOREIGN KEY (idgroupe)  REFERENCES groupe(id)  ON UPDATE CASCADE  ON DELETE CASCADE,
ADD CONSTRAINT FK_GpModu_Mod  FOREIGN KEY (idmodule)  REFERENCES module(id)  ON UPDATE CASCADE  ON DELETE CASCADE;

/*--------------------------------------------------------------------------*/
/* TABLE : 'utilisateurcompetence'                                          */
/* Clé Primaire = id                                                        */
/*--------------------------------------------------------------------------*/
ALTER TABLE utilisateurcompetence
ADD CONSTRAINT FK_UtCp_Gp   FOREIGN KEY (idutilisateur)  REFERENCES utilisateur(id)  ON UPDATE CASCADE  ON DELETE CASCADE,
ADD CONSTRAINT FK_UtCp_CP   FOREIGN KEY (idcompetence)   REFERENCES competence(id)   ON UPDATE CASCADE  ON DELETE CASCADE;

/*--------------------------------------------------------------------------*/
/* TABLE : 'conversationutilisateur'                                        */
/* Clé Primaire = id                                                        */
/*--------------------------------------------------------------------------*/
ALTER TABLE conversationutilisateur
ADD CONSTRAINT FK_ConvUt_Conv   FOREIGN KEY (idconversation)  REFERENCES conversation(id)  ON UPDATE CASCADE  ON DELETE CASCADE,
ADD CONSTRAINT FK_ConvUt_Util   FOREIGN KEY (idutilisateur)   REFERENCES utilisateur(id)   ON UPDATE CASCADE  ON DELETE CASCADE;

/*--------------------------------------------------------------------------*/
/* TABLE : 'offredept'                                                      */
/* Clé Primaire = id                                                        */
/*--------------------------------------------------------------------------*/
ALTER TABLE offreville
ADD CONSTRAINT FK_OffVill_Off   FOREIGN KEY (idoffre)   REFERENCES offre(id)  ON UPDATE CASCADE  ON DELETE CASCADE,
ADD CONSTRAINT FK_OffDept_Dept  FOREIGN KEY (idville)   REFERENCES ville(id)  ON UPDATE CASCADE  ON DELETE CASCADE;
