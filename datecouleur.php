<?php
if(isset($_SESSION['idbdd'])){ 
	requete_general($base, $connexion, $tableparam, $_SESSION['idbdd'], $connexion);
	}else{$titrecomplet="UmbrielSystem";}
	
	if(isset($_SESSION['idbdd'])){ 
		mysql_select_db($base, $connexion);
		$requeterutili=sprintf("SELECT * FROM ".$varserv['valeur4']." WHERE id='".$datarechercheutilisateur['id']."'");
		$requeterutili152 = mysql_query($requeterutili, $connexion) or die(mysql_error());
		$varrequeterutili = mysql_fetch_assoc($requeterutili152);
				$requetedateserveur=sprintf("SELECT * FROM ".$tableparam." WHERE type='serveur' AND valeur4='".$varserv['valeur4']."'");
				$requetedateserveur1 = mysql_query($requetedateserveur, $connexion) or die(mysql_error());
				$variablerds = mysql_fetch_assoc($requetedateserveur1);
			$varagemax=($variablerds['valeur7']-$variablerds['valeur14'])-1;
			$varagemin=$variablerds['valeur7']-$variablerds['valeur13'];
			$jourplusun=$variablerds['valeur6']+1;
//Si naissance ann�e inf�rieure � 1996 (rouge)
if($varrequeterutili['naissance_annee']<$varagemax){$datecouleur="FF0000";}
//Si naissance ann�e sup�rieure � 1996 (d�veloppement)
else if($varrequeterutili['naissance_annee']>$varagemax){
		//Si naissance ann�e sup�rieure � 200 (rouge)
		if($varrequeterutili['naissance_annee']>$varagemin){$datecouleur="FF0000";}
		else if($varrequeterutili['naissance_annee']>$varagemin){$datecouleur="008000";}
		//Si naissance ann�e �gale � 2000 (d�veloppement)
		else if($varrequeterutili['naissance_annee']==$varagemin){
				//Si naissance mois inf�rieure � 5 (vert)
				if($varrequeterutili['naissance_mois']<$variablerds['valeur6']){$datecouleur="008000";}
				//Si naissance mois sup�rieure � 5 (rouge)
				else if($varrequeterutili['naissance_mois']>$variablerds['valeur6']){$datecouleur="FF0000";}
				//Si naissance mois �gale  � 5 (d�veloppement)
				else if($varrequeterutili['naissance_mois']==$variablerds['valeur6']){
						//Si naissance jour inf�rieure � 6 (vert)
						if($varrequeterutili['naissance_jour']<$jourplusun){$datecouleur="008000";}
						//Si naissance jour sup�rieure � 5 (rouge)
						else if($varrequeterutili['naissance_jour']>$variablerds['valeur6']){$datecouleur="FF0000";}
				}
		//Si naissance mois autre (vert)
		}else{$datecouleur="008000";}
//Si naissance ann�e �gale � 1996 (d�veloppement)
}else if($varrequeterutili['naissance_annee']==$varagemax){
		//Si naissance mois sup�rieure � 5 (vert)
		if($varrequeterutili['naissance_mois']>$variablerds['valeur6']){$datecouleur="#008000";}
		//Si naissance mois inf�rieure � 5 (rouge)		
		else if($varrequeterutili['naissance_mois']<$variablerds['valeur6']){$datecouleur="#FF0000";}
		//Si naissance mois �gale � 5 (d�veloppement)
		else if($varrequeterutili['naissance_mois']==$variablerds['valeur6']){
				//Si naissance jour sup�rieure � 5 (vert)
				if($varrequeterutili['naissance_jour']>$variablerds['valeur6']){$datecouleur="#008000";}
				//Si naissance jour inf�rieure � 6 (rouge)
				else if($varrequeterutili['naissance_jour']<$jourplusun){$datecouleur="#FF0000";}
		}
}
		if($varrequeterutili['naissance_annee']>$varagemax && $varrequeterutili['naissance_annee']<$varagemin){$agecouleur = "00C000";}
		else if($varrequeterutili['naissance_annee']=$varagemax){$agecouleur = "C0C000";}
		else if($varrequeterutili['naissance_annee']=$varagemin){$agecouleur = "C0C000";}
		else{$agecouleur = "C00000";}
}else{$datecouleur="000000"; $agecouleur = "000000";}
?>