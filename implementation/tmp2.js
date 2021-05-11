function statut(statut){
    switch(statut){
        case "TERMINÉE":
            $('#modalok').modal('show');
            break;
        case "SUSPENDUE":
            $('#modalsuspendue').modal('show');
            break;
        case "EN COURS":
            $('#modalencours').modal('show');
            break;
    }

}


function statut(statut){
	if (statut=="TERMINÉE") {
		$('#modalok').modal('show');
	}
	if (statut=="SUSPENDUE") {
		$('#modalsuspendue').modal('show');
	}
	if (statut=="EN COURS") {
		$('#modalencours').modal('show');
	}
}