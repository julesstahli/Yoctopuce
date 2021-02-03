@extends('template')

@section('title', 'Index')

@section('head')
  <link rel="stylesheet" href="./css/indexBlade.css">
@endsection

@section('content')

  <div class="row">
    <table class="table is-striped is-fullwidth">
      <thead>
        <tr>
          <th scope="col">Température</th>
          <th scope="col">Luminosité</th>
          <th scope="col">Humidité</th>
          <th scope="col">Pression</th>
          <th scope="col">Date de mesure</th>
        </tr>
      </thead>
      <tbody id="tbl">
      </tbody>
    </table>
    <div class="">
      <canvas id="temperatureChart" width="400" height="400"></canvas>
      <canvas id="humidityChart" width="400" height="400"></canvas>

    </div>
  </div>
  <script type="text/javascript">
/*
  class YoctoChart {
    static chartList = [];
    constructor(parent, name) {
      let tempChart = new Chart(ctx, {
        type: 'line',
        data: {
          lineColor : "#fffff",
          datasets: [{
            label: name,
            backgroundColor: 'rgba(210, 210, 210, 0.25)',
            borderColor: 'rgba(210, 210, 210)',
            borderWidth: 1
          }]
        },
        options: {
          maintainAspectRatio: false,
          scales: {
            yAxes: [{
              ticks: {
                suggestedMin: 20,
                suggestedMax: 25,
                stepSize: 1
              }
            }]
          }
        }
      });
      tempChart.canvas.parentNode.style.width = '50%';
      tempChart.canvas.parentNode.style.height = '500px';
      chartList.push(tempChart);
    }
    static ShowChartList() {
      this.chartList.forEach((e) => {

      });

    }

  }
  let c = new YoctoChart(null, "temperature");
*/

  let chartList = [];


  let temperatureContext = document.getElementById('temperatureChart').getContext('2d');
  let temperatureChart = new Chart(temperatureContext, {
    type: 'line',
    data: {
      lineColor : "#fffff",
      datasets: [{
        label: 'temperature',
        backgroundColor: 'rgba(210, 210, 210, 0.25)',
        borderColor: 'rgba(210, 210, 210)',
        borderWidth: 1
      }]
    },
    options: {
      maintainAspectRatio: false,
      scales: {
        yAxes: [{
          ticks: {
            suggestedMin: 20,
            suggestedMax: 25,
            stepSize: 1
          }
        }]
      }
    }
  });

  let humidityContext = document.getElementById('humidityChart').getContext('2d');
  let humidityChart = new Chart(humidityContext, {
    type: 'line',
    data: {
      lineColor : "#fffff",
      datasets: [{
        label: 'humidity',
        backgroundColor: 'rgba(175, 175, 210, 0.25)',
        borderColor: 'rgba(175, 175, 210)',
        borderWidth: 1
      }]
    },
    options: {
      maintainAspectRatio: false,
      scales: {
        yAxes: [{
          ticks: {
            suggestedMin: 20,
            suggestedMax: 25,
            stepSize: 1
          }
        }]
      }
    }
  });

  // Implementation de la chart en HTML
  temperatureChart.canvas.parentNode.style.width = '50%';
  temperatureChart.canvas.parentNode.style.height = '400px';

  humidityChart.canvas.parentNode.style.width = '50%';
  humidityChart.canvas.parentNode.style.height = '400px';

  chartList.push(temperatureChart);

  // Fonction qui ajoute de la data dans la chart
  function addData(chart, label, data) {
    chart.data.labels.push(label);
    chart.data.datasets.forEach((dataset) => {
      dataset.data.push(data);
    });
    chart.update();
  }

  // Ajoute les derniers 60 query dans la chart lors du chargement de la page
  axios.get("/api/measures?limit=20").then(response => {
    response.data.reverse();
    response.data.forEach((data) => {
      let date = new Date(data["created_at"]);
      addData(temperatureChart, `${date.getHours()}:${date.getMinutes()}:${date.getSeconds()}`, data["temperature"]);
      addData(humidityChart, `${date.getHours()}:${date.getMinutes()}:${date.getSeconds()}`, data["humidity"]);
    });
    temperatureChart.options.scales.yAxes[0]["ticks"].suggestedMin = response.data[0]["temperature"]*1;
    temperatureChart.options.scales.yAxes[0]["ticks"].suggestedMax = response.data[0]["temperature"]*1;

    humidityChart.options.scales.yAxes[0]["ticks"].suggestedMin = response.data[0]["humidity"]*1;
    humidityChart.options.scales.yAxes[0]["ticks"].suggestedMax = response.data[0]["humidity"]*1;
  });







  // Chaque seconde, ajouter la dernière mesure de la base de donnée
  setInterval(() => {
    axios.get("/api/measure").then(response => {

      // Prend la table actuel
      let tbl = document.getElementById("tbl");

      // Créer un <tr>
      let tr = document.createElement("tr");

      for(let dataName of ["temperature", "brightness", "humidity", "pression", "created_at"]){
        // Creer un nouveau cellule dans le <tr> du tableau
        let td = document.createElement("td");

        // Ajoute la valeur de la requete à l'api dans le <td> créé précédement
        td.innerHTML = response.data[dataName];

        // Ajoute le <td> dans le <tr>
        tr.appendChild(td);
      }

      // Ajoute au début du tableau le <tr> créé juste au dessus
      tbl.insertBefore(tr, tbl.firstChild);


      // Si le tableau a plus de 1 ligne, enlever la dernière (permet de garder le plus récent uniquement à chaque fois)
      if (tbl.rows.length > 1) {

        tbl.lastElementChild.remove();
      }
    });

    // Recupere la dernière mesure de la base de donnée
    axios.get("/api/measure").then(response => {

      // Converti la date de la base de donnée en un format utilisable (format JS)
      let date = new Date(response.data["created_at"]);

      // Ajoute le label en bas de la date de la dernière mesure (ajoute a droite dans la chart)
      temperatureChart.data.labels.push(`${date.getHours()}:${date.getMinutes()}:${date.getSeconds()}`);
      humidityChart.data.labels.push(`${date.getHours()}:${date.getMinutes()}:${date.getSeconds()}`);

      // Supprime le label de la date tout a gauche (ca permet de garder un nombre constant d'informations dans la chart)
      temperatureChart.data.labels.shift();
      humidityChart.data.labels.shift();

      // Ajoute la valeur de la dernière mesure tout a gauche et enlève celle à droite
      temperatureChart.data.datasets.forEach((dataset) => {
        dataset.data.push(response.data["temperature"]);
        dataset.data.shift();
      });

      humidityChart.data.datasets.forEach((dataset) => {
        dataset.data.push(response.data["humidity"]);
        dataset.data.shift();
      });

      // Met à jour l'affichage de la chart
      temperatureChart.update();
      humidityChart.update();
    });

  }, 1000);

  </script>
@endsection
