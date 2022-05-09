<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
    include '../db/dbconnection.php';  
 
// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
if(isset($_REQUEST["term"])){
    // Prepare a select statement
    $sql = "SELECT * FROM GLight WHERE GLight_id LIKE '%".$_REQUEST['term']."%'";  
    if($stmt = mysqli_prepare($conn, $sql)){
        // Bind variables to the prepared statement as parameters
        /*
        mysqli_stmt_bind_param($stmt, "s", $param_term);
        
        // Set parameters
        $param_term = '%' . $_REQUEST["term"] . '%' . " OR member_name LIKE " .'%' . $_REQUEST["term"] . '%';  
        echo $stmt;
        */
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
            
            // Check number of rows in the result set
            if(mysqli_num_rows($result) > 0){
                $string = "<table class='w-full text-sm text-left text-gray-500 dark:text-gray-400'>
                    <thead class=\"text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400\">
                        <tr>
                            <th scope=\"col\" class=\"px-6 py-3\">Light id</th>
                            <th scope=\"col\" class=\"px-6 py-3\">Member id</th>
                            <th scope=\"col\" class=\"px-6 py-3\">Price</th>
                            <th scope=\"col\" class=\"px-6 py-3\">Contact no</th>
                            <th scope=\"col\" class=\"px-6 py-3\">
                                <span class=\"sr-only\">Edit</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>";
                // Fetch result rows as an associative array
                while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                    if(strpos($row["GLight_id"], $_REQUEST['term'] ) !== false){
                        $string .= "
                        <tr class=\"border-b dark:bg-gray-800 dark:border-gray-700 odd:bg-white even:bg-gray-50 odd:dark:bg-gray-800 even:dark:bg-gray-700\">
                            <th scope=\"row\" class=\"px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap\">
                                <a href=\"view-glight.php?name=transaction&Id=".$row["GLight_id"]."\" class=\"dark:hover:text-blue-500 md:hover:text-blue-700\">".$row["GLight_id"]."</a>
                            </th>
                            <td class=\"px-6 py-4\">
                                ".$row["member_id"]."
                            </td>
                            <td class=\"px-6 py-4\">
                                ".$row["price"]."
                            </td>
                            <td class=\"px-6 py-4\">
                                ".$row["contact_num"]."
                            </td>
                            <td class=\"px-6 py-4 text-right\">
                                <a href=\"edit-glight.php?name=transaction&Id=".$row["GLight_id"]."\" class=\"font-medium text-blue-600 dark:text-blue-500 hover:underline\">Edit</a>
                            </td>
                        </tr> ";
                    } 
                }
                $string .= 
                    "</tbody>
                </table>";
                echo $string;
            } else{
                echo "<p>No matches found</p>";
            }
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
        }
    }
     
    // Close statement
    mysqli_stmt_close($stmt);
}
 
// close connection
mysqli_close($conn);
?>