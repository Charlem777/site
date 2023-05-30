// Fonction pour charger la liste des plats
function loadPlats() {
    const xhr = new XMLHttpRequest();
    xhr.open("GET", "get_plats.php", true);
    xhr.onreadystatechange = function () {
      if (xhr.readyState === 4 && xhr.status === 200) {
        const plats = JSON.parse(xhr.responseText);
        const platsList = document.getElementById("platsList");
        platsList.innerHTML = "";
        plats.forEach(function (plat) {
          const li = document.createElement("li");
          li.textContent = plat.nomPlat;
          li.addEventListener("click", function () {
            selectPlat(plat.idPlat);
          });
          platsList.appendChild(li);
        });
      }
    };
    xhr.send();
  }
  
  // Fonction pour charger les détails d'un plat sélectionné
  function loadPlatDetails() {
    const platId = document.getElementById("platSelect").value;
    if (platId !== "") {
      const xhr = new XMLHttpRequest();
      xhr.open("GET", "get_plat_details.php?id=" + platId, true);
      xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
          const plat = JSON.parse(xhr.responseText);
          document.getElementById("nomPlat").value = plat.nomPlat;
          document.getElementById("caloPlat").value = plat.caloPlat;
          document.getElementById("protPlat").value = plat.protPlat;
          document.getElementById("prixPlat").value = plat.prixPlat;
          document.getElementById("prixFinal").value = plat.prixFinal;
          document.getElementById("quantite").value = plat.quantite;
        }
      };
      xhr.send();
    } else {
      clearPlatDetails();
    }
  }
  
  
  // Fonction pour sélectionner un plat
  function selectPlat(platId) {
    document.getElementById("platSelect").value = platId;
    loadPlatDetails();
  }
  
  // Fonction pour effacer les détails du plat
  function clearPlatDetails() {
    document.getElementById("nomPlat").value = "";
    document.getElementById("caloPlat").value = "";
    document.getElementById("protPlat").value = "";
    document.getElementById("prixPlat").value = "";
    document.getElementById("prixFinal").value = "";
    document.getElementById("quantite").value = "";
  }
  
  // Fonction pour mettre à jour un plat
  function updatePlat() {
    const platId = document.getElementById("platSelect").value;
    const prixPlat = document.getElementById("prixPlat").value;
    const prixFinal = document.getElementById("prixFinal").value;
    const quantite = document.getElementById("quantite").value;
    var nomPlat = document.getElementById("nomPlat").value;
    const protPlat = document.getElementById("protPlat").value;
    const caloPlat = document.getElementById("caloPlat").value;
    
  
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "update_plat.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
      if (xhr.readyState === 4 && xhr.status === 200) {
        alert(xhr.responseText);
        loadPlats();
        clearPlatDetails();
      }
    };
    xhr.send(
        "idPlat=" + platId +
        "&nomPlat=" + nomPlat +
        "&caloPlat=" + caloPlat +
        "&protPlat=" + protPlat +
        "&prixPlat=" + prixPlat +
        "&prixFinal=" + prixFinal +
        "&quantite=" + quantite
      );
      
  }
  
  // Fonction pour supprimer un plat
  function deletePlat() {
    const platId = document.getElementById("platSelect").value;

    const xhr = new XMLHttpRequest();
    xhr.open("POST", "supprimer_plat.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        

        if (xhr.readyState === 4 && xhr.status === 200) {
            alert(xhr.responseText);
            loadPlats();
            clearPlatDetails();
        }
    };
   

    xhr.send("idPlat=" + platId);
}

  
  // Fonction pour ajouter un plat
  function addPlat() {
  const nomPlat = document.getElementById("nomPlatAdd").value;
    const caloPlat = document.getElementById("caloPlatAdd").value;
    const protPlat = document.getElementById("protPlatAdd").value;
    const prixPlat = document.getElementById("prixPlatAdd").value;
    const prixFinal = document.getElementById("prixFinalAdd").value;
    const quantite = document.getElementById("quantiteAdd").value;
 
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "ajouter_plat.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
      if (xhr.readyState === 4 && xhr.status === 200) {
        alert(xhr.responseText);
        loadPlats();
        document.getElementById("addPlatForm").reset();
      }
    };
    console.log(prixFinal);
    xhr.send(
        "&nomPlatAdd=" + nomPlat +
        "&caloPlatAdd=" + caloPlat +
        "&protPlatAdd=" + protPlat +
      "&prixPlatAdd=" + prixPlat +
      "&prixFinalAdd=" + prixFinal +
      "&quantiteAdd=" + quantite
    );
  }
  
  // Charger la liste des plats au chargement de la page
  window.addEventListener("load", function () {
    loadPlats();
  });
  