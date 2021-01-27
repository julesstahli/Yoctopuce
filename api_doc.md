Yoctopuce api
=============

Measures
--------

### /api/measures

Get multiple measures

<ul>
  <li>Pression</li>
  <li>Humidity</li>
  <li>Brightness</li>
</ul>

Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l'imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. <br> Il n'a pas fait que survivre cinq siècles, mais s'est aussi adapté à la bureautique informatique, sans que son contenu n'en soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en page de texte, comme Aldus PageMaker. <br> Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l'imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n'a pas fait que survivre cinq siècles, mais s'est aussi adapté à la bureautique informatique, sans que son contenu n'en soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en page de texte, comme Aldus PageMaker.

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


