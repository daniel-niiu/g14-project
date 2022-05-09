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

    if (isset($_GET['pageno'])) {
        $pageno = $_GET['pageno'];
    } else {
        $pageno = 1;
    }
    $no_of_records_per_page = 10;
    $offset = ($pageno-1) * $no_of_records_per_page;
 
    $total_pages_sql = "SELECT COUNT(*) FROM member WHERE member_id LIKE '%".$_REQUEST['term']."%' OR member_name LIKE '%".$_REQUEST['term']."%'"; 
    $result = mysqli_query($conn,$total_pages_sql);
    $total_rows = mysqli_fetch_array($result)[0];
    $total_pages = ceil($total_rows / $no_of_records_per_page);

    $sql = "SELECT * FROM member WHERE member_id LIKE '%".$_REQUEST['term']."%' OR member_name LIKE '%".$_REQUEST['term']."%' LIMIT $offset, $no_of_records_per_page"; 
    if($stmt = mysqli_prepare($conn, $sql)){
        // Bind variables to the prepared statement as parameters
        /*
        mysqli_stmt_bind_param($stmt, "s", $param_term);
        
        // Set parameters
        $param_term = '%' . $_REQUEST["term"] . '%' . " OR member_name LIKE " .'%' . $_REQUEST["term"] . '%';  
        echo $stmt;
        */
        // Attempt to execute the prepared statement
        $string = "";
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
            
            // Check number of rows in the result set
            if(mysqli_num_rows($result) > 0){
                $string = "<table class=\"w-full text-sm text-left text-gray-500 dark:text-gray-400\">
                    <thead class=\"text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400\">
                        <tr>
                            <th scope=\"col\" class=\"px-6 py-3\">Member id</th>
                            <th scope=\"col\" class=\"px-6 py-3\">Member name</th>
                            <th scope=\"col\" class=\"px-6 py-3\">Member type</th>
                            <th scope=\"col\" class=\"px-6 py-3\">Contact no</th>
                            <th scope=\"col\" class=\"px-6 py-3\">
                                <span class=\"sr-only\">Edit</span>
                            </th>
                        </tr>
                    </thead><tbody>";
                // Fetch result rows as an associative array
                while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                    if(strpos($row["member_id"], $_REQUEST['term'] ) !== false || strpos($row["member_name"], $_REQUEST['term'] ) !== false){
                        //echo "<a href=view-member.php?Id=".$row["member_id"]."><p>" . $row["member_id"] . "</p></a>";
                        $string .= "
                        <tr class='border-b dark:bg-gray-800 dark:border-gray-700 odd:bg-white even:bg-gray-50 odd:dark:bg-gray-800 even:dark:bg-gray-700'>
                            <th scope='row' class='px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap'><a href='view-member.php?name=member&Id=".$row["member_id"]."' class='dark:hover:text-blue-500 md:hover:text-blue-700'>".$row['member_id']."</a></th>
                            <td class='px-6 py-4'>".$row['member_name']."</td>
                            <td class='px-6 py-4'>".$row['member_type']."</td>
                            <td class='px-6 py-4'>".$row['member_tel']."</td>
                            <td class='px-6 py-4 text-right'><a href='edit-member.php?name=member&Id=".$row["member_id"]."' class='font-medium text-blue-600 dark:text-blue-500 hover:underline'>Edit</a></td>
                        </tr>";
                    } 
                }
                $string .= "
                    </tbody>
                </table>

                <nav aria-label=\"Page navigation\" class=\"mt-6 mb-2 text-center\">
                  <ul class=\"inline-flex -space-x-px\">
                    <li>";
                    if($pageno <= 1){ 
                        $string .= "<a href=\"?name=member&aside=search-member\" class=\"py-2 px-3 ml-0 leading-tight text-gray-500 bg-white rounded-l-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white\">";
                    } 
                    else { 
                        $string .= "<a href=\"?name=member&aside=search-member&pageno=".($pageno - 1)."\" class=\"py-2 px-3 ml-0 leading-tight text-gray-500 bg-white rounded-l-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white\">";
                    }
                    $string .= "<i class=\"fa-solid fa-angle-left\"></i> Previous
                        </a>
                    </li>"; 
                    if($pageno >= $total_pages){ 
                        $string .= "
                        <li>
                            <a href=\"?name=member&aside=search-member\" class=\"py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white\">2</a>
                        </li>";
                    }
                    else { 
                        $string .= "
                        <li>
                            <a href=\"?name=member&aside=search-member&pageno=".($pageno + 1)."\" class=\"py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white\">".($pageno + 1)."\</a>
                        </li>"; 
                    } 
                    $string .= " 
                    <li>
                        <a href=\"#\" class=\"py-2 px-3 leading-tight text-gray-500 bg-white rounded-r-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white\">
                          Next <i class=\"fa-solid fa-angle-right\"></i>
                        </a>
                    </li>
                  
                    </ul>; 
                </nav>";
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