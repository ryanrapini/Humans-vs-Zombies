<?php include '../includes/header.include' ?>
<script type="text/javascript" src="/includes/jquery.tablesorter.min.js"></script> 
<div id="page">
	<div id="page-bgtop">
		<div id="page-bgbtm">
            <div id="admintable">
                <form name="admin" action='submit.php' method='post'>
                    <div><a href="register.php" class="links">Register People (Admin only)</a></div>Having problems? Questions or concerns? email ryanrapini@gmail.com
                    <table id="userTable" class="tablesorter"> 
                        <thead> 
                        <tr> 
                            <th>ID</th> 
                            <th>First Name</th> 
                            <th>Last Name</th> 
                            <th>Alive?</th> 
                            <th>Killcode</th>
                            <th>Net ID</th> 
                            <th>Phone</th> 
                            <th>Gender</th> 
                            <th>Class</th> 
                            <th>Date Registered</th>
                            <th>Tools</th> 
                        </tr> 
                        </thead>
                        <tbody>
                        
                        <?php 
                        function loadusers(){
                            $con = include('../includes/credentials.include')
                            if (!$con)
                            {
                                die('Could not connect: ' . mysql_error());
                            }
                            mysql_select_db("hvz", $con);

                            $sql = "SELECT * FROM users order by lastname desc";
                            $result = mysql_query($sql);

                            while($row = mysql_fetch_array($result)){
                            echo "
                            <tr>
                                <td>$row[id]</td>
                                <td>$row[firstname]</td>
                                <td>$row[lastname]</td>
                                <td>";
                                if ( $row['zombie'] ) {
                                echo "Zombie";
                                }
                                else {
                                echo "Human";
                                }
                                echo "
                                <td class='killcode'>$row[killcode]</td>
                                <td>$row[netid]</td>
                                <td>$row[phone]</td>
                                <td>$row[gender]</td>
                                <td>$row[year]</td>
                                <td>$row[timeregistered]</td>
                                <td><button name='delete' value='$row[id]'>Delete</button>
                                <button ";
                                if ( $row['zombie'] ) {
                                echo "name='revive' value='$row[id]'>Revive";
                                }
                                else {
                                echo "name='kill' value='$row[id]'>Kill";
                                }
                                echo " </button></td>
                            ";
                            }
                            mysql_close();
                        }
                        loadusers();
                        ?>
                        </tbody> 
                    </table>
                </form>
            </div>
        </div>
		<!-- end #page -->
	</div>
</div>
<script>
$(document).ready(function() 
    { 
        $("#userTable").tablesorter({sortList: [[0,0]]}); 
    } 
); 
</script>
<?php include '../includes/footer.include' ?>