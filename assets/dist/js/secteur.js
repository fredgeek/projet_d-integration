
function secteur(ville){
    var vil="";
    switch(ville){
        case"1":
        vil="Individuelle";
        break;
        case"2":
        vil="Collective";
        break;
        case"3":
        vil="Collective";
        break;
        case"4":
        vil="Collective";
        break;
        case"5":
        vil="Individuelle";
        break;
        case"6":
        vil="Individuelle";
        break;
        case"7":
        vil="Individuelle";
        break;
        case"8":
        vil="Individuelle";
        break;
        case"9":
        vil="Collective";
        break;
    }
    return vil;
}
 function charge_secteur (){
   var tab_secteur =""; var nb_secteur = 0; var chaine_liste="";
   var text = document.getElementById("choix").value;
   var ville =text.substr(0,1);
  
   if (ville!="0")
   {
     //alert(text+"-"+ville);
     tab_secteur=secteur(ville)/*.split('|')*/;
     nb_secteur=tab_secteur.length;
    //alert(nb_secteur);

    chaine_liste ="<select class='custom-select form-control' disabled>";
    
    
    
           chaine_liste+="<option value='"+tab_secteur+"'> "+tab_secteur+"  </option>";
    
    chaine_liste +="</select>";
    document.getElementById("leschoix").innerHTML= chaine_liste;

   } else{
     alert('fou');
   }
 }
 function verif(){
   
}

