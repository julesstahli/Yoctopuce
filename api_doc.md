Yoctopuce api
=============

Measures
--------

### /api/measures

Get multiple measures

Les lignes :
* Pression 
* Humidity 
* Brightness 

sont désaffichable.

fromID permet de séléctionner les mesures à partir d'un id choisi.

``` javascript
axios.get("[endpoint]/api/measures?limit=50&from=2020-01-13 00:00:00&to=2020-02-13 00:00:00").then(data => {
  console.log(data);
}, error => {
  console.error(error);
});
```

``` php
<?php
$ch = curl_init(); 
curl_setopt($ch, CURLOPT_URL, "[endpoint]/api/measures?limit=50&from=2020-01-13 00:00:00&to=2020-02-13 00:00:00"); 
$data = curl_exec($ch); 
curl_close($ch); 
```

Params

| Name | Value | Default |
| --- | --- | --- |
| fromID | numeric | null |
| limit | numeric | null |
| offset | numeric | 0 |
| from | datetime | null |
| to | datetime | null |
| pression | boolean | 1 |
| humidity | boolean | 1 |
| brightness | boolean | 1 |


