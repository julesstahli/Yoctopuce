class YoctoChart {
  static chart;
  constructor(parentId, name, stepSize, backgroundColor, borderColor, width, height) {

    // Créer le canvas
    let temp = document.createElement("canvas");

    // Mettre l'id au canvas
    temp.id = name;

    // Ajout du canvas créé en amont dans le parent
    document.getElementById(parentId).appendChild(temp);

    // Récupérer le context
    let context = document.getElementById(name).getContext('2d');

    // Créer la chart
    this.chart = new Chart(context, {
      type: 'line',
      data: {
        lineColor : "#fffff",
        datasets: [{
          label: name,
          backgroundColor: backgroundColor,
          borderColor: borderColor,
          borderWidth: 1
        }]
      },
      options: {
        legend: {
          display: false
        },
        title:{
          display:false,
          text: name
        },
        maintainAspectRatio: false,
        scales: {
          yAxes: [{
            ticks: {
              stepSize: stepSize
            }
          }]
        }
      }
    });
    // Changement de la taille de la chart
    this.chart.canvas.parentNode.style.width = width;
    this.chart.canvas.parentNode.style.height = height;
  }

  AddLabel(date, shift=true) {
    date = new Date(date);
    // Ajoute le label en dessous, la date de la dernière mesure (ajoute a droite dans la chart)
    this.chart.data.labels.push(`${String(date.getHours()).padStart(2, '0')}:${String(date.getMinutes()).padStart(2, '0')}:${String(date.getSeconds()).padStart(2, '0')}`);
    if (shift) {
      // Supprime le label de la date tout a gauche (ca permet de garder un nombre constant d'informations dans la chart)
      this.chart.data.labels.shift();
    }
  }

  AddData(data, shift=true) {
    this.chart.data.datasets.forEach((dataset) => {
      // Ajoute la valeur de la dernière mesure tout a gauche
      dataset.data.push(data);
      if (shift) {
        // Enlève la valeur a droite de la chart
        dataset.data.shift();
      }
    });
  }

  Initiate(date, data) {
    // Ajoute la date et la data (valeur)
    this.AddData(data, false);
    this.AddLabel(date, false);
    //this.chart.options.scales.yAxes[0]["ticks"].suggestedMin = data*1;
    //this.chart.options.scales.yAxes[0]["ticks"].suggestedMax = data*1;
  }
  Update() {
    // Mettre à jour la chart
    this.chart.update();
  }
}
