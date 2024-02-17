function aggiungiFrase() {
    var nuovaFrase = document.getElementById('nuovaFrase').value;

    if (nuovaFrase.trim() !== "") {
        // Simuliamo l'aggiunta della frase a una lista (sarà effettivo con un backend e un database)
        var listaFrasi = document.getElementById('listaFrasi');
        var nuovoElemento = document.createElement('li');
        nuovoElemento.innerText = nuovaFrase;
        listaFrasi.appendChild(nuovoElemento);

        // Pulisce l'input dopo l'aggiunta della frase
        document.getElementById('nuovaFrase').value = "";
    }
}
