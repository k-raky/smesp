$(document).ready(function(){
    $("#search").on("keyup", function() {
      var value = $(this).val().toLowerCase();
      $("#table tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
    });
  });


  function change(delai,ref,statut,button1,type,button2){
    if (delai>4)
    {
      document.getElementById(ref).style.color='red';
      document.getElementById(button1).style.backgroundColor='red';
    }
    if (statut=="TERMINÉE") {
      document.getElementById(ref).style.color='green';
      document.getElementById(button2).style.visibility="visible";
    }
    if (statut=="SUSPENDUE") {
      document.getElementById(ref).style.color='orange';
    }
    if (type=="Autre") {
      document.getElementById(button1).style.visibility="visible";
    }
  }

  function voirfiche(ref){
    location.href="ficheremplie.php?refremplie="+ref;
  }

  function statut(statut){
    if (statut=="SUSPENDUE") {
      $('#modalsuspendue').modal('show');
    }
    if (statut=="EN COURS") {
      $('#modalencours').modal('show');
    }
  }

  function getref(ref,nom,type,cause,priorite,message){
    document.getElementById('currentref').value=ref;
      document.getElementById('currentref1').value=ref;
      document.getElementById('currentref2').value=ref;
      document.getElementById("nomautre").innerText=nom;
      document.getElementById("typeautre").innerText=type;
      document.getElementById("causeautre").innerText=cause;
      document.getElementById("prioautre").innerText=priorite;
      document.getElementById("message").innerText=message;
  }
  function infos(ref,date,nom,contact,fonction,type,cause,depart,priorite,statut,delai,motif,idtech,nomtech,contacttech,servicetech,dispo){
    if (statut=="EN COURS") {     
      document.getElementById("refinfos1").innerText=ref;
      document.getElementById("date1").innerText=date;
      document.getElementById("nom1").innerText=nom;
      document.getElementById("contact1").innerText=contact;
      document.getElementById("fonction1").innerText=fonction;
      document.getElementById("type1").innerText=type;
      document.getElementById("cause1").innerText=cause;
      document.getElementById("depart1").innerText=depart;
      document.getElementById("prio1").innerText=priorite;
      document.getElementById("statut1").innerText=statut;
      document.getElementById("delai1").innerText=delai; 
      
      document.getElementById("id1").innerText=idtech;
      document.getElementById("nomtech1").innerText=nomtech;
      document.getElementById("contacttech1").innerText=contacttech;
      document.getElementById("servicetech1").innerText=servicetech;
      document.getElementById("dispo1").innerText=dispo;
      
      
    }
    if (statut=="SUSPENDUE") {     
      document.getElementById("refinfos2").innerText=ref;
      document.getElementById("date2").innerText=date;
      document.getElementById("nom2").innerText=nom;
      document.getElementById("contact2").innerText=contact;
      document.getElementById("fonction2").innerText=fonction;
      document.getElementById("type2").innerText=type;
      document.getElementById("cause2").innerText=cause;
      document.getElementById("depart2").innerText=depart;
      document.getElementById("prio2").innerText=priorite;
      document.getElementById("statut2").innerText=statut;
      document.getElementById("delai2").innerText=delai;
      document.getElementById("motifsuspension2").innerText=motif;
      
      document.getElementById("id2").innerText=idtech;
      document.getElementById("nomtech2").innerText=nomtech;
      document.getElementById("contacttech2").innerText=contacttech;
      document.getElementById("servicetech2").innerText=servicetech;
      document.getElementById("dispo2").innerText=dispo;
    }
  }