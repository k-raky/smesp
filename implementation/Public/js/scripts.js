$(document).ready(function(){

	var colors = ['#007bff'];

	var chLine = document.getElementById("chLine");
	var chartData = {
		labels: ["JAN", "FEV", "MAR", "AVR", "MAI", "JUI", "JUL", "AOU", "SEP", "OCT", "NOV", "DEC"],
		datasets: [{
			data: [10, 5, 13, 12, 9, 10, 7, 13, 11, 8, 14, 15],
			backgroundColor: colors[0]
		}]
	};

	if (chLine) {
		new Chart(chLine, {
		type: 'line',
		data: chartData,
		options: {
			scales: {
				xAxes: [{
					barPercentage: 0.4,
					categoryPercentage: 0.5
				}],
				yAxes: [{
					ticks: {
						beginAtZero: false
					}
				}]
			},
			legend: {
				display: false
			},
			responsive: true
		}
		});
	}

	var chPie = document.getElementById("chPie");
	const dataPie = {
		labels: [
		  'Electricite',
		  'Menuiserie',
		  'Maconnerie',
		  'Plomberie',
		  'Climatiseur',
		  'Autres'
		],
		datasets: [{
		  label: 'My First Dataset',
		  data: [200, 50,70,100,90,40],
		  backgroundColor: [
			'rgb(255, 99, 132)',
			'rgb(54, 162, 235)',
			'rgb(255, 205, 86)',
			'red',
			'green',
			'orange',
		  ],
		  hoverOffset: 4
		}]
	  };

	  if (chPie) {
		new Chart(chPie, {
		type: 'pie',
		data: dataPie,
		});
	}



	$("#search").on("keyup", function() {
		var value = $(this).val().toLowerCase();
		$("#table tr").filter(function() {
		  $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
		});
	  });

	


})


  function change(delai,ref,statut,button1,type,button2,button3,button4,titre){
	if (delai>4)
	{
	  document.getElementById(ref).style.color='red';
	  document.getElementById(button1).style.backgroundColor='red';
	  document.getElementById(button3).style.backgroundColor='red';
	  document.getElementById(button4).style.backgroundColor='red';

	}
	if (statut=="TERMINÉE") {
	  document.getElementById(ref).style.color='green';
	  document.getElementById(button2).style.display="block";

	}
	if (statut=="SUSPENDUE") {
	  document.getElementById(ref).style.color='orange';
	}
	if (type=="Autre" && titre=="CHEF SUPREME") {
		document.getElementById(button1).style.display="block";
	  }
	if (statut=="EN ATTENTE" && titre=="CHEF DE POLE") {
		document.getElementById(button3).style.display="block";
	}
	if (statut=="EN COURS" && titre=="AUCUN") {
		document.getElementById(button4).style.display="block";
	}
  }


  function voirfiche(ref){
	location.href="/Vue/ficheremplie.php?refremplie="+ref;
  }


  function statut(statut,titre){
	if (statut=="EN ATTENTE" && titre=="CHEF SUPPREME") {
		$('#modalattribuer').modal('show');
	}
	if (statut=="EN ATTENTE" && titre=="CHEF DE POLE") {
		$('#modalattribuerTech').modal('show');
	}
	if (statut=="SUSPENDUE" && titre!="AUCUN") {
	  $('#modalsuspendue').modal('show');
	}
	if (statut=="EN COURS" && titre!="AUCUN") {
	  $('#modalencours').modal('show');
	}
	if (statut=="SUSPENDUE" && titre=="AUCUN") {
		$('#modalsuspendueTech').modal('show');
	}
  }

  function openmodal(){
	$('#modalvalider').modal('show');
}


  function getref(ref,nom,type,cause,priorite,message){
	  document.getElementById('currentref1').value=ref;
	  document.getElementById('currentref2').value=ref;
	  document.getElementById("nomautre").innerText=nom;
	  document.getElementById("typeautre").innerText=type;
	  document.getElementById("causeautre").innerText=cause;
	  document.getElementById("prioautre").innerText=priorite;
	  document.getElementById("message").innerText=message;
  	}

  	function getrefService(ref){
		document.getElementById('currentref').value=ref;
	}

	function infos2(ref,nom,contact,fonction,type,cause,prio,delai){
		document.getElementById('refsus').value=ref;
		document.getElementById("reftache").value=ref;
		document.getElementById("demandeur").innerText=nom;
		document.getElementById("contactfiche").innerText=contact;
		document.getElementById("fonctionfiche").innerText=fonction;
		document.getElementById("typefiche").innerText=type;
		document.getElementById("causefiche").innerText=cause;
		document.getElementById("prioritefiche").innerText=prio;
		document.getElementById("dureetache").value=delai;
	  }
	
	  function infos3(ref,date,nom,contact,fonction,type,cause,depart,prio,statut,delai,motif){
		document.getElementById("refinfos").innerText=ref;
		document.getElementById("date").innerText=date;
		document.getElementById("nom").innerText=nom;
		document.getElementById("contact").innerText=contact;
		document.getElementById("fonction").innerText=fonction;
		document.getElementById("type").innerText=type;
		document.getElementById("cause").innerText=cause;
		document.getElementById("depart").innerText=depart;
		document.getElementById("prio").innerText=prio;
		document.getElementById("statut").innerText=statut;
		document.getElementById("delai").innerText=delai;
		document.getElementById("motifsuspension").innerText=motif;
		document.getElementById("refrep").value=ref;
	
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