@extends('template')

@section('title', 'Index')

@section('content')
  <div id="chart"></div>
  <script type="text/javascript">


  setInterval(() => {
    axios.get("/api/measure").then(response => {
      console.log(response.data.temperature);
      console.log(response.data.created_at);
    });

  }, 1000);









  </script>
@endsection
