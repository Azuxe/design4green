document.addEventListener('DOMContentLoaded', function () {
    let isGraphDisplayed = true;
    let isTableCreated = false;

    let grapheConsommationMaison = document.getElementById("grapheConsommationMaison");

    // replace 'ct-chart' by the class given in index.html
    const entryElements = document.getElementsByClassName('hiddenValues');

    let arrayData = new Array(2);

    arrayData[0] = entryElements[0].getAttribute("data-dates").split(', ');
    arrayData[1] = entryElements[0].getAttribute("data-consos").split(', ');

    //Displaying the chart
    Chartist.Line('.ct-chart', {
        labels: arrayData[0],
        series: [
            arrayData[1]
        ]
    });

    document.getElementsByClassName("toggleBtn")[0].addEventListener("click", toggleTable);

    function toggleTable(){
        console.log("Toggle between table and graph")
        if(!isTableCreated){
            createTable();
        }

        let table = document.getElementById("consoTable")

        if(isGraphDisplayed){
            isGraphDisplayed = false;
            grapheConsommationMaison.style.display = "none";
            table.style.display = "block";
        }else{
            isGraphDisplayed = true;
            grapheConsommationMaison.style.display = "flex";
            table.style.display = "none";
        }
    }


    function createTable() {
        console.log("Creating table");
        //Displaying the grid
        let table = document.createElement("table");
        table.setAttribute("id", "consoTable")
        let tr = document.createElement("tr");
        let thDate = document.createElement("th");
        let thDateContent = document.createTextNode("Date");
        let thConso = document.createElement("th");
        let thConsoContent = document.createTextNode("Consommation");

        thConso.append(thConsoContent);
        thDate.append(thDateContent);

        tr.append(thDate);
        tr.append(thConso);

        table.append(tr);

        for (let i = 0; i < arrayData[0].length; i++) {
            let tr = document.createElement("tr");
            let td = document.createElement("td");

            let tdDate = document.createTextNode(arrayData[0][i]);
            let tdConso = document.createTextNode(arrayData[1][i]);

            td.append(tdDate);
            td.append(tdConso);

            tr.append(td);

            table.append(tr);
        }

        grapheConsommationMaison.parentNode.appendChild(table);

        isTableCreated = true;
    }
});