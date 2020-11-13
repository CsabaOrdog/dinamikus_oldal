

window.addEventListener("load",()=>{
    document.querySelector("#start").addEventListener("click",function() {
        let nev = document.querySelector("#nevField").value;
        if(nev != 0){
            let initXhttp = new XMLHttpRequest();
            initXhttp.open("GET",`init.php?nev=${nev}`, true);

            let xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("tartalom").innerHTML = this.responseText;
                }
            };

            xhttp.open("GET", "ajax_info.txt", true);
            xhttp.send();
        }
    })
})
