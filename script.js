
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

function check(){
    let uzenet = document.querySelector("#uzenet");
    if(document.querySelectorAll("input[type=radio]:checked").length > 0){
        uzenet.innerHTML = "";
        getQuestion(kerdes_szama++);
    }
    else{
        uzenet.innerHTML = "Válassz egyet!";
    }
}



function getQuestion(szam){
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("urlap").innerHTML = this.responseText;
        }
    };

    xhttp.open("GET", `question.php?kerdes_szama=${szam}`, true);
    xhttp.send();
}

function start(){
    let nev = document.querySelector("#nevField").value;

    if (nev != 0) {
        let initXhttp = new XMLHttpRequest();
        initXhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                document.querySelector("body").innerHTML += this.responseText;
            }
        };
        initXhttp.open("GET", `init.php?nev=${nev}`, true);
        initXhttp.send();
        getQuestion(kerdes_szama++);
    }
}
