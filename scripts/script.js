
window.addEventListener("load", () => {
    if (document.querySelector("#start") != null){
        document.querySelector("#start").addEventListener("click", start);

        document.querySelector("#rangsor").addEventListener("click", rangsor);
    }
    /*
    Enter leütése esetén meghívódik a start gomb click eseménye
    */
    document.querySelector("#nevField").addEventListener("keypress", function (event){

        if (event.keyCode === 13) {
            event.preventDefault();
            document.querySelector("#start").click();
        }
    });

});


/*
Első alkalommal nem csak kérdést kér, hanem inicializálja a session változókat az init.php-val
*/
function start()
{
    let nev = document.querySelector("#nevField").value;
    let uzenet = document.querySelector("#uzenet");
    if (nev != "")
    {
        uzenet.innerHTML = "";
        let initXhttp = new XMLHttpRequest();
        initXhttp.open("GET", `init.php?nev=${nev}`, false);
        initXhttp.send();
        getKerdes();
    }
    else
    {
        uzenet.innerHTML = "Írjon be egy nevet!";
    }
}
/*
A ranglista.php segítségével megjeleníti a jelenlegi ranglistát
*/
function rangsor() {
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200)
        {
            document.querySelector("#tartalom").innerHTML = this.responseText;
        }
    };

    xhttp.open("GET", `ranglista.php`, true);
    xhttp.send();
}


/*
Ha van rádiógomb kijelölve, akkor a következő kérdést elkéri
*/
function kovetkezoKerdes()
{
    let uzenet = document.querySelector("#uzenet");
    if (ellenorizRadio())
    {
        uzenet.innerHTML = "";
        getKerdes();
    }
    else
    {
        uzenet.innerHTML = "Válassz egyet!";
    }
}


/*
A beetoltKerdes.php-tól elkér egy kérdést és megjeleníti a tartalom id-vel rendelkező divben
ha már egy kérdés be volt töltve, akkor a tipp paraméterrel a választ visszaküldi az előző kérdésre
*/
function getKerdes()
{
    let tipp = document.querySelector("input[type=radio]:checked");

    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200)
        {
            document.querySelector("#tartalom").innerHTML = this.responseText;

        }
    };

    xhttp.open("GET", `betoltKerdes.php?${(tipp != null) ? `tipp=${tipp.id}` : ``}`, true);
    xhttp.send();

}


/*
Bool függvény, ami megmondja, hogy ki van-e jelölve rádiógomb
*/
function ellenorizRadio()
{
    return document.querySelectorAll("input[type=radio]:checked").length > 0;
}

/*
Ha van rádiógomb kijelölve, akkor a valaszellenor.php-tól elkéri a helyes válasz id-jét,
majd a jó választ tartalmazó div háttérszínét zöldre, míg a rosszét pirosra színezi,
illetve disabled-re állítja az összes rádiógombot
*/
function ellenorizValasz()
{
    let uzenet = document.querySelector("#uzenet");

    if (ellenorizRadio())
    {
        uzenet.innerHTML = "";
        let xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200)
            {
                [rossz, jo] = this.responseText.split(",");
                document.getElementById(`${rossz}`).parentElement.style.background = `rgba(255,0,0,0.4)`;
                document.getElementById(`${jo}`).parentElement.style.background = `rgba(0,255,0,0.4)`;
                for (let i = 1; i < 5; i++) {
                    document.getElementById(`${i}`).disabled = true;
                }
            }
        };
        let valasz_szama = document.querySelector("input[type=radio]:checked").id;
        xhttp.open("GET", `valaszellenor.php?valasz_szama=${valasz_szama}`, true);
        xhttp.send();
    }
    else
    {
        uzenet.innerHTML = "Válassz egyet!";
    }
}


