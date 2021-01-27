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
      <canvas id="myChart" width="400" height="400"></canvas>

    </div>
  </div>
  <script type="text/javascript">


  var ctx = document.getElementById('myChart').getContext('2d');
  var myChart = new Chart(ctx, {
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

myChart.canvas.parentNode.style.width = '50%';
myChart.canvas.parentNode.style.height = '500px';
  function addData(chart, label, data) {
    chart.data.labels.push(label);
    chart.data.datasets.forEach((dataset) => {
        dataset.data.push(data);
    });
    chart.update();
}

  axios.get("/api/measures?limit=60").then(response => {

      response.data.reverse();

      response.data.forEach((data) => {
        let date = new Date(data["created_at"]);
        addData(myChart, `${date.getHours()}:${date.getMinutes()}:${date.getSeconds()}`, data["temperature"]);
      });
      myChart.options.scales.yAxes[0]["ticks"].suggestedMin = response.data[0]["temperature"]*1;
      myChart.options.scales.yAxes[0]["ticks"].suggestedMax = response.data[0]["temperature"]*1;
  });







  setInterval(() => {
    axios.get("/api/measure").then(response => {
      let tr = document.createElement("tr");
      let tbl = document.getElementById("tbl");

      for(let dataName of ["temperature", "brightness", "humidity", "pression", "created_at"]){
        let td = document.createElement("td");
        td.innerHTML = response.data[dataName];
        tr.appendChild(td);
      }
      tbl.insertBefore(tr, tbl.firstChild);
      if (tbl.rows.length > 1) {
        tbl.lastElementChild.remove();
      }
    });

    axios.get("/api/measures?limit=1").then(response => {
      let date = new Date(response.data[0]["created_at"]);
      myChart.data.labels.push(`${date.getHours()}:${date.getMinutes()}:${date.getSeconds()}`);
      myChart.data.labels.shift();
      myChart.data.datasets.forEach((dataset) => {
        dataset.data.push(response.data[0]["temperature"]);
        dataset.data.shift();
      });

      myChart.update();
    });

  }, 1000);

  </script>
@endsection
