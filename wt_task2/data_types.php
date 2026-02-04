<?php
echo "<h3>WELCOME TO FREELANCEHUB</h3>";


$company_name="FreelanceHub";
echo "Company_Name: $company_name <br>";

$total_users=120;
echo "Total_Users: $total_users <br>";

$platformrating=4.7;
echo "Rating: $platformrating <br>";

$iswebsitelive=true;
echo "Is_website_live";
echo $iswebsitelive ? ": true <br>" : ": false <br>"; 
echo "<br>";

$services=array("Clients","Freelancers","management tools");
echo "Services offered: ";
print_r($services);
echo "<br><hr>";
?>