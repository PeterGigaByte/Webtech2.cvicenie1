document.getElementById("0").addEventListener("click",()=>{
    sortTable(0,"text");
});
document.getElementById("1").addEventListener("click",()=>{
    sortTable(1,"number");
});
document.getElementById("2").addEventListener("click",()=>{
    sortTable(2,"text");
});
function sortTable(n,type) {
    let table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0, img, header;
    table = document.getElementById("table");
    switching = true;
    // Set the sorting direction to ascending:
    dir = "asc";
    /* Make a loop that will continue until
    no switching has been done: */
    while (switching) {
        // Start by saying: no switching is done:
        switching = false;
        rows = table.rows;
        /* Loop through all table rows (except the
        first, which contains table headers): */
        for (i = 1; i < (rows.length - 1); i++) {
            // Start by saying there should be no switching:
            shouldSwitch = false;
            /* Get the two elements you want to compare,
            one from current row and one from the next: */
            x = rows[i].getElementsByTagName("TD")[n];
            y = rows[i + 1].getElementsByTagName("TD")[n];
            if(type === "text") {
                /* Check if the two rows should switch place,
                based on the direction, asc or desc: */
                if (dir === "asc") {
                    if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                        // If so, mark as a switch and break the loop:
                        shouldSwitch = true;
                        break;
                    }
                } else if (dir === "desc") {
                    if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                        // If so, mark as a switch and break the loop:
                        shouldSwitch = true;
                        break;
                    }
                }
            }
            else if(type === "number"){
                x = x.innerHTML.split(" ");
                x = x[0];
                y = y.innerHTML.split(" ");
                y = y[0];
                //check if the two rows should switch place:
                if (dir === "asc") {
                    if (Number(x) > Number(y)) {
                        //if so, mark as a switch and break the loop:
                        shouldSwitch = true;
                        break;
                    }

                }
                else if (dir === "desc") {
                    if (Number(x) < Number(y)) {
                        //if so, mark as a switch and break the loop:
                        shouldSwitch = true;
                        break;
                    }
                }
            }
        }
        if (shouldSwitch) {
            /* If a switch has been marked, make the switch
            and mark that a switch has been done: */
            rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
            switching = true;
            // Each time a switch is done, increase this count by 1:
            switchcount ++;
        } else {
            /* If no switching has been done AND the direction is "asc",
            set the direction to "desc" and run the while loop again. */
            if (switchcount === 0 && dir === "asc") {
                dir = "desc";
                switching = true;
            }
        }
    }
    header = document.getElementById(n);
    if(dir === "desc"){
        img = '<img class="sorting-image" src="icons/down.png" alt="a-z">'
    }else{
        img = '<img class="sorting-image" src="icons/up.png" alt="a-z">'
    }
    if(n===0){
        header.innerHTML = 'Názov súboru ' + img;
        document.getElementById("1").innerHTML = 'Veľkosť';
        document.getElementById("2").innerHTML = 'Dátum nahrania';
    }else if(n===1){
        header.innerHTML = 'Veľkosť ' + img;
        document.getElementById("0").innerHTML = 'Názov súboru';
        document.getElementById("2").innerHTML = 'Dátum nahrania';
    }else if(n === 2){
        header.innerHTML = 'Dátum nahrania  ' + img;
        document.getElementById("0").innerHTML = 'Názov súboru';
        document.getElementById("1").innerHTML = 'Veľkosť';
    }

}
