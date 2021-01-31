---
title: API Reference

language_tabs: # must be one of https://git.io/vQNgJ
  - php
  - javascript
  - elixir

toc_footers:
  - <a href='https://github.com/slatedocs/slate'>Documentation Powered by Slate</a>

includes:
  - errors

search: true

code_clipboard: true
---

# Introduction

Welcome to the Yocopuce project API! You can use our API to access Yoctopuce project API endpoints, which can get information on various measures in our database.

We have language bindings in PHP, Javascript, and Elixir! You can view code examples in the dark area to the right, and you can switch the programming language of the examples with the tabs in the top right.

# Authentication

Yoctopuce project doesn't uses API keys to allow access to the API.

# Measures

## Get all measures

``` php
<?php
$ch = curl_init(); 
curl_setopt($ch, CURLOPT_URL, "[endpoint]/api/measures?limit=3"); 
$data = curl_exec($ch); 
echo $data;
curl_close($ch);
```

``` javascript
// By using axios
axios.get("[endpoint]/api/measures?limit=3").then(data => {
  console.log(data);
}, error => {
  console.error(error);
});
```

``` elixir
# By using HTTPoison
"[endpoint]/api/measures?limit=3"
|> HTTPoison.get!
|> IO.inpect
```

> The above command returns JSON structured like this:

``` json
[
  {
    "id": 3,
    "pression": 16.542,
    "humidity": 32.928,
    "brightness": 21.602,
    "updated_date": "2020-01-27 14:37:22",
    "deleted_date": "2020-01-27 14:37:22"
  },
  {
    "id": 2,
    "pression": 14.973,
    "humidity": 29.754,
    "brightness": 19.782,
    "updated_date": "2020-01-27 14:37:17",
    "deleted_date": "2020-01-27 14:37:17"
  },
  {
    "id": 1,
    "pression": 15.878,
    "humidity": 30.435,
    "brightness": 17.987,
    "updated_date": "2020-01-27 14:37:12",
    "deleted_date": "2020-01-27 14:37:12"
  }
]
```

This endpoint retrieves all measures.

### HTTP Request

`GET http://yoctopuce.test/api/measures`

### Query Parameters

Parameter | Type | Default | Description
--- | --- | --- | ---
fromID | numeric | null | Return all measures from the specified ID
limit | numeric | null | Limit the number of results
offset | numeric | 0 | Offset on results
from | datetime | null | From specified date
to | datetime | null | To specified date
pression | boolean | 1 | If false exclude pression from results
humidity | boolean | 1 | If false exclude humidity from results
brightness | boolean | 1 | If false exclude brightness from results
order | string | desc | asc or desc

<aside class="notice">
Measures are updated every 5 seconds
</aside>

