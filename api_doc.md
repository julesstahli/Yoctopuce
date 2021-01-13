# Yoctopuce api

## Measures

### /api/measures

#### Params

| Name | Value | Default |
| --- | --- | --- |
| limit | integer | null |

```javascript
axios.get([endpoint]/api/measures?limit=50).then(data => {
  console.log(data);
}, error => {
  console.error(error);
});
```
