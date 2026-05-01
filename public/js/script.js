  //Ajouter creer une tache

document.getElementById("taskForm").addEventListener("submit", function(e){
    e.preventDefault();

    const formData = new FormData(this);

  
    fetch("index.php?action=createTask", {
        method: "POST",
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        document.getElementById("message").innerHTML = "Tâche ajoutée";
    })
    .catch(error => console.error(error));
});

//Supprimer une tache
document.querySelectorAll(".delete-btn").forEach(button =>{
    button.addEventListener("click", function(){
        const id = this.dataset.id;

        fetch(`index.php?action=deleteTask&id=${id}`)
        .then(res => res.text())
        .then(() =>{
            this.closest(".task").remove();
        })
        .catch(err => console.error(err));
    });
});

//Update le statut de mes taches
document.querySelectorAll(".status-select").forEach(select =>{
    select.addEventListener("change", function(){
        const id = this.dataset.id;
        const statut = this.value;

        const formData = new FormData();
        formData.append("id", id);
        formData.append("statut", statut);

        fetch("index.php?action=updateStatus", {
            method: "POST",
            body: formData
        })
        .then(res => res.text())
        .then(() => {
            console.log("Statut mis à jour");
        })
        .catch(err => console.error(err));
    });
});

