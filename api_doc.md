Yoctopuce api
=============

Measures
--------

### /api/measures

Get multiple measures
```html
<h2>Axios</h2>
```
```javascript
axios.get([endpoint]/api/measures?limit=50).then(data => {
  console.log(data);
}, error => {
  console.error(error);
});
```

Params

| Name | Value | Default |
| --- | --- | --- |
| limit | integer | null |
| from | datetime | null |
| to | datetime | null |

### /api/measure

Get last measure

## Temperature

### /api/temperature

## Humidity

### /api/humidity

## Pressure

### /api/pressure
