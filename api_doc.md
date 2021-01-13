Yoctopuce api
=============

Measures
--------

### /api/measures

Get multiple measures

Params

| Name | Value | Default |
| --- | --- | --- |
| limit | integer | null |
| from | datetime | null |
| to | datetime | null |

```
Javascript using Axios
```
``` javascript
axios.get("[endpoint]/api/measures?limit=50&from=2020-01-13 00:00:00&to=2020-02-13 00:00:00").then(data => {
  console.log(data);
}, error => {
  console.error(error);
});
```

```
PHP
```
``` php
<?php
$ch = curl_init(); 
curl_setopt($ch, CURLOPT_URL, "[endpoint]/api/measures?limit=50&from=2020-01-13 00:00:00&to=2020-02-13 00:00:00"); 
$data = curl_exec($ch); 
curl_close($ch); 
```


### /api/measure

Get last measure

### /api/measures/average

Get avaerage measures

Params

| Name | Value | Default |
| --- | --- | --- |
| from | datetime | null |
| to | datetime | null |

## Temperature

### /api/temperature

## Humidity

### /api/humidity

## Pressure

### /api/pressure
