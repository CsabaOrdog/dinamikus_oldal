
let kerdes_szama = 0;

window.addEventListener("load",()=>{
    document.querySelector("#start").addEventListener("click",start);

    document.querySelector("#nevField").addEventListener("keypress",function(event){
        //Enter leütése esetén meghívódik a start gomb click eseménye
        if(event.keyCode === 13){
            event.preventDefault();
            document.querySelector("#start").click();
        }
    });


})


function ellenoriz(){

    let uzenet = document.querySelector("#uzenet");
    if(ellenorizRadio()){
        uzenet.innerHTML = "";
        getKerdes(kerdes_szama++);
    }
    else{
        uzenet.innerHTML = "Válassz egyet!";
    }


}

function ellenorizRadio(){

    return document.querySelectorAll("input[type=radio]:checked").length > 0;
}

function ellenorizValasz(){
    if(ellenorizRadio()){
        let xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                [rossz, jo] = this.responseText.split(",");
                document.getElementById(`${rossz}`).parentElement.style.background= `rgba(255,0,0,0.4)`;
                document.getElementById(`${jo}`).parentElement.style.background = `rgba(0,255,0,0.4)`;
                for(let i = 1; i < 5; i++){
                    document.getElementById(`${i}`).disabled = true;
                }
            }
        };
        let valasz_szama = document.querySelector("input[type=radio]:checked").id;
        xhttp.open("GET", `valaszellenor.php?valasz_szama=${valasz_szama}`, true);
        xhttp.send();
    }
}

//A question.php-tól elkér egy kérdést és megjeleníti az urlap id-vel rendelkező űrlapon
function getKerdes(szam){

    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.querySelector("#urlap").innerHTML = this.responseText;
        }
    };

    xhttp.open("GET", `kerdes.php?kerdes_szama=${szam}`, true);
    xhttp.send();
}
//Első alkalommal nem csak kérdést kér, hanem inicializálja a session változókat az init.php-val
function start(){
    let nev = document.querySelector("#nevField").value;
    let uzenet = document.querySelector("#uzenet");
    if (nev != "") {
        uzenet.innerHTML = "";
        let initXhttp = new XMLHttpRequest();
        initXhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                document.querySelector("body").innerHTML += this.responseText;
                //EZ ITT NEMNEM
            }
        };

        initXhttp.open("GET", `init.php?nev=${nev}`, true);
        initXhttp.send();
        getKerdes(kerdes_szama++);
    }
    else{
        uzenet.innerHTML = "Írjon be egy nevet!";
    }
}
