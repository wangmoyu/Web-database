<?php

if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns//
    // using select function//
    $query = "select * from music where Track like '%".$valueToSearch."%' or Artist like '%".$valueToSearch."%' or Volume like '%".$valueToSearch."%' or Release_year like '%".$valueToSearch."%'";
    $search_result = filterTable($query);
    
}
 else {
    $query = "SELECT * FROM music";
    $search_result = filterTable($query);
}

// function to connect and execute the query//
function filterTable($query)
{
    $connect = mysqli_connect("cs1.ucc.ie", "mw16", "jie5Voow", "mscim2018_mw16");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>DATA SEARCH</title>
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
        <form name = 'myForm' action = "search.php" method = "post">
        <p>
        
        <input type="submit" name="search" value="Search">
        <input type="text" name="valueToSearch" placeholder="Keywords To Search">(Year/Artist/Track/Volume)</input><br><br>
        </p>
        
            
            <table style="width:100%;">
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
        </form>
        
    </body>
</html>
