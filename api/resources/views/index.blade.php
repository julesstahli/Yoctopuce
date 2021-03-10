@extends('template')

@section('title', 'Index')

@section('head')
  <link rel="stylesheet" href="./css/indexBlade.css">
@endsection

@section('content')

  <div class="dashboard">
    <div class="dashboard_charts">
      <div class="chart">
        <div class="chart_infos">
          <h1 class="chart_infos_title">Temperature</h1>
        </div>
        <div id="parentTemperature"></div>
      </div>
      <div class="chart">
        <div class="chart_infos">
          <h1 class="chart_infos_title">Pressure</h1>
        </div>
        <div id="parentPression"></div>
      </div>
      <div class="chart">
        <div class="chart_infos">
          <h1 class="chart_infos_title">Humidity</h1>
        </div>
        <div id="parentHumidity"></div>
      </div>
    </div>
    <div class="dashboard_infos">
      <div class="dashboard_infos_cardcontainer">
        <div class="card">
          <h1 class="card_title">Real time <span>Sensors</span></h1>
          <span class="card_update">Updated now</span>
          <div class="card_databox">
            <div class="card_databox_data">
              <img class="card_databox_data_icon" src="./images/Drop.svg" alt="Drop Icon">
              <span id="dataHumidity" class="card_databox_data_text">20<span>%</span></span>
            </div>
            <div class="card_databox_data">
              <img class="card_databox_data_icon" src="./images/cloud.svg" alt="Drop Icon">
              <span id="dataPressure" class="card_databox_data_text">2500 <span>mbar</span></span>
            </div>
            <div class="card_databox_data">
              <img class="card_databox_data_icon" src="./images/Fire.svg" alt="Drop Icon">
              <span id="dataTemperature" class="card_databox_data_text">23<span>°C</span></span>
            </div>
          </div>
        </div>
        <div class="card">
          <h1 class="card_title"><span>Sensors</span> Status</h1>
          <span class="card_update">1 module connected</span>
          <div class="card_statusbox">
            <div class="card_statusbox_status">
              <i id="statusicon" class="card_statusbox_status_icon noanimation"></i><span id="statustext" class="card_statusbox_status_text">Weather module</span>
            </div>
          </div>
        </div>
        <div class="card">
          <h1 class="card_title">Log Activity</h1>
          <div id="logbox" class="card_logbox">
          </div>
        </div>
        <div class="card-git">
          <h1 class="card_title">Check out our GitHub repository</h1>
          <a class="card_button" href="https://github.com/julesstahli/Yoctopuce" target="_blank" rel="nofollow noreferrer">
            <img class="card_button_icon" src="./images/GitHub.svg" alt="GitHub Icon">
            Go to Github
          </a>
        </div>
      </div>
    </div>
  </div>
  <script src="./javascripts/YoctoChart.js" charset="utf-8"></script>
  <script type="text/javascript">

  // Creation des charts
  let temperature = new YoctoChart("parentTemperature", "temperature", 1, 'rgba(210, 210, 210, 0.25)', 'rgba(210, 210, 210)', '100%', '400px');
  let humidity = new YoctoChart("parentHumidity", "humidity", 1, 'rgba(175, 175, 210, 0.25)', 'rgba(175, 175, 210)', '100%', '400px');
  let pression = new YoctoChart("parentPression", "pression", 1, 'rgba(210, 175, 175, 0.25)', 'rgba(210, 175, 175)', '100%', '400px');

  // Ajoute les derniers 60 query dans la chart lors du chargement de la page
  axios.get("/api/history?limit=30").then(response => {
    let date;
    response.data.reverse();
    response.data.forEach((data) => {
      date = new Date(data["date"]);
      // Ajouter la date et la data à chaque fois dans chaques charts
      humidity.Initiate(date, data["humidity"]);
      temperature.Initiate(date, data["temperature"]);
      pression.Initiate(date, data["pression"]);


    });
    let logbox = document.getElementById('logbox');
    while (logbox.children.length > 3) {
      logbox.firstChild.remove();
      console.log(logbox.children.length);
    }
  });

  let measureBefore;

  // Chaque seconde, ajouter la dernière mesure de la base de donnée
  setInterval(() => {
    // Recupere la dernière mesure de la base de donnée
    axios.get("/api/measure").then(response => {

      // Tester si la valeur a été ajouté juste avant
      if (measureBefore != response.data["id"]) {
        let statusIcon = document.getElementById("statusicon");
        statusIcon.style.backgroundColor = "#47D266";
        statusIcon.classList.remove('noanimation');
        /*
        // Prend la table actuel
        let tbl = document.getElementById("tbl");

        // Créer un <tr>
        let tr = document.createElement("tr");


        for(let dataName of ["temperature", "humidity", "pression", "created_at"]){
        // Creer un nouveau cellule dans le <tr> du tableau
        let td = document.createElement("td");

        // Ajoute la valeur de la requete à l'api dans le <td> créé précédement
        td.innerHTML = response.data[dataName];

        // Ajoute le <td> dans le <tr>
        tr.appendChild(td);


      }
      */

      document.getElementById("dataHumidity").innerHTML = Math.round(response.data["humidity"]) + "<span>%</span>";
      document.getElementById("dataPressure").innerHTML = Math.round(response.data["pression"]) + " <span>mbar</span>";
      document.getElementById("dataTemperature").innerHTML = Math.round(response.data["temperature"]) + "<span>°C</span>";

      /*
      // Ajoute au début du tableau le <tr> créé juste au dessus
      tbl.insertBefore(tr, tbl.firstChild);

      // Si le tableau a plus de 1 ligne, enlever la dernière (permet de garder le plus récent uniquement à chaque fois)
      if (tbl.rows.length > 1) {
      tbl.lastElementChild.remove();
    }
    */
    // Converti la date de la base de donnée en un format utilisable (format JS)
    let date = new Date(response.data["created_at"]);

    let logbox = document.getElementById('logbox');

    logbox.innerHTML +=
    `<div class="card_logbox_log">
    <p class="card_logbox_log_title">Retrieve 3 data from the database</p>
    <span class="card_logbox_log_date">${String(date.getHours()).padStart(2, '0')}h${String(date.getMinutes()).padStart(2, '0')}:${String(date.getSeconds()).padStart(2, '0')}</span>
    </div>`;

    while (logbox.children.length > 3) {
      logbox.firstChild.remove();
      console.log(logbox.children.length);
    }



    /*
    // Ajoute les labels aux charts
    temperature.AddLabel(date);
    humidity.AddLabel(date);
    pression.AddLabel(date);

    // Ajoute les données aux charts
    temperature.AddData(response.data["temperature"]);
    humidity.AddData(response.data["humidity"]);
    pression.AddData(response.data["pression"]);
    */
    // Met à jour l'affichage des charts
    temperature.Update();
    humidity.Update();
    pression.Update();

  }
  else {
    let statusIcon = document.getElementById("statusicon");
    statusIcon.style.backgroundColor = "#C72E2E";
    statusIcon.classList.add('noanimation');
  }
  measureBefore = response.data["id"];
});
}, 1000);
</script>
@endsection
