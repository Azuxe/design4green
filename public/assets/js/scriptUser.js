document.addEventListener('DOMContentLoaded', function () {
    //States
    let isGraphDisplayed = true;
    let isTableCreated = false;

    //DOM-Elements
    let grapheConsommationMaison = document.getElementById("grapheConsommationMaison");
    let entryElements = document.getElementsByClassName('hiddenValues');

    //var 
    let arrayData = new Array(2);

    displayGraph();
    let toggleBtn = document.getElementsByClassName('toggleBtn')[0];
    toggleBtn.addEventListener("click", toggleTable);

    function displayGraph() {
        arrayData[0] = entryElements[0].getAttribute("data-dates").split(', ');
        arrayData[1] = entryElements[0].getAttribute("data-consos").split(', ');

        //Displaying the chart
        Chartist.Line('.ct-chart', {
            labels: arrayData[0],
            series: [
                arrayData[1]
            ]
        });
    }

    function toggleTable() {
      
        if (!isTableCreated) {
            createTable();
        }

        let table = document.getElementById("consoTable")

        if (isGraphDisplayed) {
            toggleBtn.innerHTML = "Afficher un Graphe";
            isGraphDisplayed = false;
            grapheConsommationMaison.style.display = "none";
            table.style.display = "block";
        } else {
            toggleBtn.innerHTML = "Afficher un Tableau";
            isGraphDisplayed = true;
            grapheConsommationMaison.style.display = "flex";
            table.style.display = "none";
        }
    }


    function createTable() {
        let table = document.createElement("table");
        table.setAttribute("id", "consoTable")
        let tr = document.createElement("tr");
        let thDate = document.createElement("th");
        let thDateContent = document.createTextNode("Date");
        let thConso = document.createElement("th");
        let thConsoContent = document.createTextNode("Consommation (kwh)");

        thConso.append(thConsoContent);
        thDate.append(thDateContent);

        tr.append(thDate);
        tr.append(thConso);

        table.append(tr);

        for (let i = 0; i < arrayData[0].length; i++) {
            let tr = document.createElement("tr");
            let tdDate = document.createElement("td");
            let tdConso = document.createElement("td");

            let tdDateContent = document.createTextNode(arrayData[0][i]);
            let tdConsoContent = document.createTextNode(arrayData[1][i]);

            tdDate.append(tdDateContent);
            tdConso.append(tdConsoContent);

            tr.append(tdDate);
            tr.append(tdConso);

            table.append(tr);
        }

        grapheConsommationMaison.parentNode.appendChild(table);

        isTableCreated = true;
    }
});