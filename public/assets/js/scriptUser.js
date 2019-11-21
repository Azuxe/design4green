document.addEventListener('DOMContentLoaded', function () {

    const entryElements = document.getElementsByClassName('ct-chart');

    let arrayData = new Array(3);
    
    arrayData[0] = [];
    arrayData[1] = [];
    arrayData[2] = []

    for(let i = 0; i < entryElements.length; i++){
        arrayData[0][i] = entryElements[i].getAttribute("data-date");
        arrayData[1][i] = entryElements[i].getAttribute("data-conso");
        arrayData[2][i] = i;
    }

    //Displaying the chart

    Chartist.Line('.ct-chart', {
        labels: arrayData[0],
        series: [
            arrayData[1]
        ]
    });

    //Displaying the grid
    let table = document.createElement("table");
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

    for(let i = 0; i < arrayData[0].length; i++){
        let tr = document.createElement("tr");
        let td = document.createElement("td");

        let tdDate = document.createTextNode(arrayData[0][i]);
        let tdConso = document.createTextNode(arrayData[1][i]);

        td.append(tdDate);
        td.append(tdConso);

        tr.append(td);

        table.append(tr);
    }

    document.getElementById("grapheConsommationMaison").appendChild(table);

});