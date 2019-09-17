<?php
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: login.php');
	exit();
}
include('includes/connections.php');
if(isset($_POST['search']))
{
    $fnameSearch = mysqli_real_escape_string($conn, $_POST['fnameSearch']);
    // $adrSearch = mysqli_real_escape_string($conn, $_POST['adrSearch']);
    $query = "SELECT * FROM `dghdbtbl` WHERE CONCAT(`fname`, ' ' ,`lname`) LIKE '%".$fnameSearch; $query .="%' OR `adr` LIKE '%".$fnameSearch; $query .="%' LIMIT 40";
    $search_result = filterTable($query);
}
else {
    $query = "SELECT * FROM `dghdbtbl` LIMIT 40";
    $search_result = filterTable($query);
}
function filterTable($query)
{
    $connect = mysqli_connect("localhost", "root", "", "dghcdb");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="search.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,600&display=swap" rel="stylesheet">

</head>
<body>
    <header>
        <h1>DGCH Customer Dashboard</h1>
            <nav>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Add New Customer</a></li>
                <li><a href="#">Home</a></li>
                <li><a href="#">Logout</a></li>
            </ul>
        </nav>
        <form class="searchfield" action="search.php" method="post">
                <div class="container">
                    <h2>Enter Customer's Name or Address</h2>
                    <input class="searchbox" type="text" name="fnameSearch" tabindex="1" autocomplete="off">
                    <!-- <input class="searchbox" type="text" name="adrSearch" placeholder="Customer's Name" tabindex="2" autocomplete="off"> -->
                    <input type="submit" name="search" value="SEARCH">
                </div>
        </form>
    </header>
    <section>
            <table id="tableMain">
            <tr>
                <th>ID</th>
                <th>Customer Name</th>
                <th>Address</th>
                <th>Landmark</th>
                <th>Tank Type</th>
                <!-- <th>Send to SuperHub</th> -->
            </tr>
            <?php
            include("includes/connections.php");
                
                
                while($row = mysqli_fetch_assoc($search_result)){
    
                        $user_id = $row["ID"];
    
                        $db_ID = $row["ID"];
                        $db_fname = $row["fname"];
                        $db_lname = $row["lname"];
                        $db_adr = $row["adr"];
                        $db_lmark = $row["lmark"];
                        $db_ttype = $row["ttype"];
                        
                        echo    "<tr class='breakrow'>
                                <td>$db_ID</td>
                                <td>$db_fname $db_lname</td>
                                <td>$db_adr</td>
                                <td>$db_lmark</td>
                                <td>$db_ttype</td>";
                        // echo    "<td><select>
                        //         <option>----</option>
                        //         <option value='BAY'>Bayan</option>
                        //         <option value='BB'>Bambang</option>
                        //         <option value='TIP'>Tipas</option>
                        //         <option value='MLQ'>MLQ</option>
                        //         <option value='SIG'>Signal</option>
                        //         </select><button type='submit' value='Submit'>Send</button>
                        //         </td>";
                        echo    "</tr>";
                        echo    "<tr class='datarow' style='display:none'><td colspan='5'>
                                <a href='#'>Edit Customer Info</a>
                                <a href='#'>Delete Customer Data</a></td></tr></div>";
                }
        ?>
        </table>
        </section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script>
        //collapse and expand sections

//$('.breakrow').click(function(){
$('#tableMain').on('click', 'tr.breakrow',function(){
    $(this).nextUntil('tr.breakrow').slideToggle(100);
});
</script>
</body>
</html>
