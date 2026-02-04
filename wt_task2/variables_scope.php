<?php

$platformName = "FreeLanceHub";

function showPlatformName() {
    global $platformName;
    echo "Welcome to $platformName <br>";
}
showPlatformName();


function showServiceMessage() {
    $serviceMessage = "Welcome to FreelanceHub - Your Gateway to Freelance Opportunities! FreeLanceHub helps businesses hire verified freelancers quickly.<br>";
    echo $serviceMessage;
}
showServiceMessage();




function platformInfo() {
    $platformName = "FreelanceHub";
    $totalUsers = 120;
    $platformRating = 4.7;
    $isWebsiteLive = true;
    $services = array("Clients", "Freelancers", "Management Tools");

    echo "Platform Name: $platformName <br>";
    echo "Total Users: $totalUsers <br>";
    echo "Rating: $platformRating <br>";
    echo "Is Website Live: " . ($isWebsiteLive ? "true" : "false") . "<br>";
    echo "Services Offered: ";
    print_r($services);
    echo "<br><hr>";
}
platformInfo();


function trackDailyVisitors() {
    static $dailyVisitors = 0;
    $dailyVisitors++;
    echo "Static Scope Output: Visitors on FreeLanceHub today = $dailyVisitors <br>";
}

trackDailyVisitors();
trackDailyVisitors();
trackDailyVisitors();

?>