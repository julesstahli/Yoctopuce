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
  </div>
  <script type="text/javascript">


  setInterval(() => {
    axios.get("/api/measure").then(response => {
      let tr = document.createElement("tr");

      for(let dataName of ["temperature", "brightness", "humidity", "pression", "created_at"]){
        let td = document.createElement("td");
        td.innerHTML = response.data[dataName];
        tr.appendChild(td);
      }
      console.log(tr);
      document.getElementById("tbl").appendChild(tr);
    });

  }, 1000);
  </script>
@endsection
