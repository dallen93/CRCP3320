<html>
<head>
  <title>Top 100 Albums of All Time</title>
  <meta name="description" content="A list of the top 100 
  albums of All Time, according to Rolling Stone.">
  <style>
    h1 {
      font-family: helvetica;
      font-weight: normal;
      color: #CC98FF;
    }
    h2 {
      font-family: sans-serif;
      font-weight: italic;
      color: #EE98FF;
    }
  </style>
</head>

<body>
  <h1>Top 100 Albums of All Time</h1>
  <h2>At least, according to someone.</h2>
  <form>
    <select>
      <option selected>Rank</option>
      <option>Title</option>
      <option>Year</option>
    </select>
    <button>Submit</button>
  </form>
  
<table>
  <thead>
    <tr>
      <td>Rank</td>
      <td>Title</td>
      <td>Year</td>
    </tr>
  </thead>
<?php
$servername = "crcp3320db.humanoriented.com";
$username = "crcp3320";
$password = "Crcp3320";
$dbname = "crcp3320";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
