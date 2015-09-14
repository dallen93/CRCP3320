<?
$sortOrder = $_POST["sortOrder"];
if ($sortOrder == NULL || $sortOrder == "") {
  $sortOrder = "rank";
} 
?>
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
  <script>
  function replaceList() {
    var xhr = new XMLHttpRequest();
    //alert('hi');
    xhr.onreadystatechange = function() {
      if (xhr.readyState == 4 && xhr.status == 200) {
        document.getElementById("albums").innerHTML = xhr.responseText;
      }
    }
    xhr.open("POST", "http://dallen03.humanoriented.com/albumTable.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded; charset=UTF-8");
    var sortOrder = document.getElementById("sortOrder").value;
    xhr.send("sortOrder=" + sortOrder);
  }
  </script>
</head>

<body>
  <h1>Top 100 Albums of All Time</h1>
  <h2>At least, according to someone.</h2>
  <form action="topalbums.php" method="POST">
    Order by
    <select id="sortOrder" name="sortOrder">
      <option <? if ($sortOrder == "rank") { ?>selected="selected"<? } ?>value="rank">Rank</option>
      <option <? if ($sortOrder == "title") { ?>selected="selected"<? } ?> value="title">Title</option>
      <option <? if ($sortOrder == "year") { ?>selected="selected"<? } ?> value="year">Year</option>
    </select>
    <input type="submit" value="Sort!" onclick="replaceList(); return false;" />
  </form>
  
  <div id="albums">
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

$sql = "SELECT * FROM albums ORDER BY " . $sortOrder;

$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
    echo "<tr>\n" . "\t<td>" . $row["rank"] . "</td>\n<td>" . $row["title"]. "</td>\n<td>" . $row["year"]. "</td>\n</tr>\n";
}
$conn->close();
?>
</table>
</div>
</body>
</html>