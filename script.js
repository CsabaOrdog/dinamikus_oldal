
let kerdes_szama = 0;

window.addEventListener("load",()=>{
    document.querySelector("#start").addEventListener("click",function() {
        let nev = document.querySelector("#nevField").value;

        if(nev != 0){
            let initXhttp = new XMLHttpRequest();
            initXhttp.open("GET",`init.php?nev=${nev}`, true);
            getQuestion(kerdes_szama++);
        }
    })
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



function getQuestion(){
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("urlap").innerHTML = this.responseText;
        }
    };

    xhttp.open("GET", `question.php?kerdes_szama=${kerdes_szama}`, true);
    xhttp.send();
}
