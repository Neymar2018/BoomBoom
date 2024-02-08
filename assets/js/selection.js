console.dir(localStorage.getItem("user"));
// utilisation d'une API à partir d'un menu contextuel
var search = document.getElementById("search");
var result = document.getElementById("result");
var titres = document.getElementById("titres");
var titreArray = [];
function addTitre(title) {
    if (titreArray.length < 5) {
        titreArray.push(title);
        result.innerHTML = "";
        search.value = "";
        titres.innerHTML = "";
        titreArray.forEach((value) => {
            titres.innerHTML += "<div>" + value + "</div>";
        })
    }
}
search.addEventListener("input", () => {
    result.innerHTML = "";
    if (search.value.length > 3) {

        fetch(`https://musicbrainz.org/ws/2/recording/?query=${search.value}&fmt=json&limit=20`)
            .then(res => res.json())
            .then(json => {
                // boucle foreach
                json.recordings.forEach(element => {
                    result.innerHTML += `<div class="select"
                     onclick="addTitre('${element.title}-${element['artist-credit'][0].name}')">
                    Titre : ${element.title} - 
                    Artiste : ${element['artist-credit'][0].name}
                    </div>`
                });
            })
    }
})
var registerend = document.forms["registerend"]
document.querySelector(".placeholder").addEventListener("click",(event)=>{
    event.preventDefault();
    registerend.titre1.value = titreArray[0];
    registerend.titre2.value = titreArray[1];
    registerend.titre3.value = titreArray[2];
    registerend.titre4.value = titreArray[3];
    registerend.titre5.value = titreArray[4];
    registerend.submit();
})