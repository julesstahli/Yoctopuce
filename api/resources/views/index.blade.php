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
          <th scope="col">Humidité</th>
          <th scope="col">Pression</th>
          <th scope="col">Date de mesure</th>
        </tr>
      </thead>
      <tbody id="tbl">
      </tbody>
    </table>
    <div class="charts">
      <div id="parentTemperature"></div>
      <div id="parentHumidity"></div>
      <div id="parentPression"></div>
    </div>
  </div>
  <script src="./javascripts/YoctoChart.js" charset="utf-8"></script>
  <script type="text/javascript">

  // Creation des charts
  let temperature = new YoctoChart("parentTemperature", "temperature", 1, 'rgba(210, 210, 210, 0.25)', 'rgba(210, 210, 210)', '100%', '400px');
  let humidity = new YoctoChart("parentHumidity", "humidity", 1, 'rgba(175, 175, 210, 0.25)', 'rgba(175, 175, 210)', '100%', '400px');
  let pression = new YoctoChart("parentPression", "pression", 1, 'rgba(210, 175, 175, 0.25)', 'rgba(210, 175, 175)', '100%', '400px');

  // Ajoute les derniers 60 query dans la chart lors du chargement de la page
  axios.get("/api/measures?limit=30").then(response => {
    let date;
    response.data.reverse();
    response.data.forEach((data) => {
      date = new Date(data["created_at"]);

      // Ajouter la date et la data à chaque fois dans chaques charts
      humidity.Initiate(date, data["humidity"]);
      temperature.Initiate(date, data["temperature"]);
      pression.Initiate(date, data["pression"]);

    });
  });

  let measureBefore;

  // Chaque seconde, ajouter la dernière mesure de la base de donnée
  setInterval(() => {
    // Recupere la dernière mesure de la base de donnée
    axios.get("/api/measure").then(response => {
      // Tester si la valeur a été ajouté juste avant
      if (measureBefore != response.data["id"]) {

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

        // Ajoute au début du tableau le <tr> créé juste au dessus
        tbl.insertBefore(tr, tbl.firstChild);

        // Si le tableau a plus de 1 ligne, enlever la dernière (permet de garder le plus récent uniquement à chaque fois)
        if (tbl.rows.length > 1) {
          tbl.lastElementChild.remove();
        }

        // Converti la date de la base de donnée en un format utilisable (format JS)
        let date = new Date(response.data["created_at"]);

        // Ajoute les labels aux charts
        temperature.AddLabel(date);
        humidity.AddLabel(date);
        pression.AddLabel(date);

        // Ajoute les données aux charts
        temperature.AddData(response.data["temperature"]);
        humidity.AddData(response.data["humidity"]);
        pression.AddData(response.data["pression"]);

        // Met à jour l'affichage des charts
        temperature.Update();
        humidity.Update();
        pression.Update();
      }
      measureBefore = response.data["id"];
    });
  }, 1000);
  </script>
@endsection
