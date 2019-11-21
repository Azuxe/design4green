document.addEventListener('DOMContentLoaded', function () {

    const entryElements = document.getElementsByClassName('ct-chart');

    let arrayData = new Array(2);
    
    arrayData[0] = [];
    arrayData[1] = [];

    for(let i = 0; i < entryElements.length; i++){
        arrayData[0][i] = entryElements[i].getAttribute("data-date");
        arrayData[1][i] = entryElements[i].getAttribute("data-conso");
    }

    Chartist.Line('.ct-chart', {
        labels: arrayData[0],
        series: [
            arrayData[1],
            Array(entryElements.length).keys()
        ]
    }, {
        width : '80%',
        height: '500px'
    });

});