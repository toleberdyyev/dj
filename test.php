<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>change demo</title>
  <style>
  div {
    color: red;
  }
  </style>
  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
</head>
<body>
 
<input type="checkbox" onchange="clicked()" value="26" id="service">
<script>
function clicked(){
var e = document.getElementById("service");
if(e.checked){
var strUser = e.value;
console.log(strUser)
}
}
</script>
 
</body>
</html>