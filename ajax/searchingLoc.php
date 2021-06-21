
<?php
        require "dbutil.php";
        $db = DbUtil::loginConnection();

        $stmt = $db->stmt_init();

        if($stmt->prepare("select lname,setting,activity, address, description, price from location where lname like ?") or die(mysqli_error($db))) {
                $searchString = '%' . $_GET['searchLastName'] . '%';
                $stmt->bind_param(s, $searchString);
                $stmt->execute();
                $stmt->bind_result($lname,$setting,$activity,$address,$description,$price);
                echo $lname;
                echo "<table border=1><th>Location</th><th>Setting</th><th>Activity</th><th>Address</th><th>Description</th><th>Price</th>\n";
                while($stmt->fetch()) {
                        echo "<tr><td>$lname</td><td>$setting</td><td>$activity</td><td>$address</td><td>$description</td><td>$price</td></tr>";
                }
                echo "</table>";

                $stmt->close();
        }

        $db->close();


?>
