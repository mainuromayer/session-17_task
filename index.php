<?php


function countWorkingDays($date_one, $date_two) {
    $start = new DateTime($date_one);
    $end = new DateTime($date_two);
    
    $weekend_days = [0, 6];
    $govt_holidays = [
        "2024-04-05", // Friday
        "2024-04-06", // Saturday
        "2024-04-07", // Shab-e-Qadr
        "2024-04-10", // Eid-ul-Fitr
        "2024-04-11", // Eid-ul-Fitr-Holiday
        "2024-04-12", // Eid-ul-Fitr-Holiday
        "2024-04-19", // Friday
        "2024-04-20", // Saturday
        "2024-04-26", // Friday
        "2024-04-27", // Saturday
    ];

    $working_days = 0;
    $interval = new DateInterval('P1D');
    $period = new DatePeriod($start, $interval, $end);

    foreach ($period as $day) {
        $day_of_week = (int)$day->format('w'); // 0 (Sunday) - 6 (Saturday)
        $date_str = $day->format('Y-m-d');

        if (!in_array($day_of_week, $weekend_days) && !in_array($date_str, $govt_holidays)) {
            $working_days++;
        }
    }

    return $working_days;
}


$date_one = "2024-04-01";
$date_two = "2024-04-30";

$result = countWorkingDays($date_one, $date_two);

echo "Total working days between $date_one and $date_two: $result\n";





?>
