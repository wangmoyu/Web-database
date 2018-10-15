<?php
//php for getting data from sql//
{
    $query = "SELECT * FROM music";
    $connect = mysqli_connect("cs1.ucc.ie", "mw16", "jie5Voow", "mscim2018_mw16");
    $search_result = mysqli_query($connect, $query);
}
?>

<!DOCTYPE html>
<html>
<head>

<script>
//Sort function//
function sortTable1() {
  var table, rows, switching, i, x, y, shouldSwitch;
  table = document.getElementById("myTable");
  switching = true;
// a loop keeps continue until no switching has been done//
  while (switching) {
    switching = false;
    rows = table.getElementsByTagName("TR");
//Loop through all table rows //
    for (i = 1; i < (rows.length - 1); i++) {
      shouldSwitch = false;
      x = rows[i].getElementsByTagName("TD")[1];
      y = rows[i + 1].getElementsByTagName("TD")[1];
//check if the two rows should switch place//
      if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
//if so, mark as a switch and break//
        shouldSwitch= true;
        break;
      }
    }
    if (shouldSwitch) {
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
    }
  }
}
function sortTable2() {
  var table, rows, switching, i, x, y, shouldSwitch;
  table = document.getElementById("myTable");
  switching = true;
  while (switching) {
    switching = false;
    rows = table.getElementsByTagName("TR");
    for (i = 1; i < (rows.length - 1); i++) {
      shouldSwitch = false;
      x = rows[i].getElementsByTagName("TD")[2];
      y = rows[i + 1].getElementsByTagName("TD")[2];
      if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
        shouldSwitch= true;
        break;
      }
    }
    if (shouldSwitch) {
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
    }
  }
}
function sortTable3() {
  var table, rows, switching, i, x, y, shouldSwitch;
  table = document.getElementById("myTable");
  switching = true;
  while (switching) {
    switching = false;
    rows = table.getElementsByTagName("TR");
    for (i = 1; i < (rows.length - 1); i++) {
      shouldSwitch = false;
      x = rows[i].getElementsByTagName("TD")[4];
      y = rows[i + 1].getElementsByTagName("TD")[4];
      if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
        shouldSwitch= true;
        break;
      }
    }
    if (shouldSwitch) {
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
    }
  }
}
</script>

        <title>DATA SORT</title>
        <style>
            table,tr,th,td
            {
                
                border: 1px solid black;
            }
        </style>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
       <header>
          Welcome to my music world
       </header>
       <nav>
         <ul>
           <a href='https://cs1.ucc.ie/~mw16/welcome.html'><li>Home</li></a>
           <a href='https://cs1.ucc.ie/~mw16/search.php'><li>Search</li></a>
           <a href='https://cs1.ucc.ie/~mw16/sort.php'><li>Sort</li></a>
         </ul>
       </nav>
       <div>
       Sort By
       <button  class="button button1" onclick='sortTable1()'>Track</button>
       <button  class="button button2" onclick='sortTable2()'>Artist</button>
       <button  class="button button3" onclick='sortTable3()'>Release_year</button>
       <br><br>
       </div>
       <form name = 'myForm' action = "sort.php" method = "post">
        
        <p> 
            <table id="myTable" style="width:100%;">
                <tr>
                    <th>Id</th>
                    <th>Track</th>
                    <th>Artist</th>
                    <th>Volume</th>
                    <th>Year</th>
                </tr>

                <?php while($row = mysqli_fetch_array($search_result)):?>
                <tr>
                    <td><?php echo $row['music_id'];?></td>
                    <td><?php echo $row['Track'];?></td>
                    <td><?php echo $row['Artist'];?></td>
                    <td><?php echo $row['Volume'];?></td>
                    <td><?php echo $row['Release_year'];?></td>
                </tr>
                <?php endwhile;?>
            </table>            
        </p>
        </form>
        
    </body>
</html>
