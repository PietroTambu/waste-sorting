<?php

    function check_time_validity(?string $startHour, ?string $endHour) {
        if (substr($startHour, 0, 2) == '00') {
            $startHour = "12" . substr($startHour, 2, 3);
        } else if (substr($startHour, 0, 2) == '12') {
            $startHour = "00" . substr($startHour, 2, 3);
        }
        if (substr($endHour, 0, 2) == '00') {
            $endHour = "12" . substr($endHour, 2, 3);
        } else if (substr($endHour, 0, 2) == '12') {
            $endHour = "00" . substr($endHour, 2, 3);
        }
        $check_time_validity = false;
        if ((int)substr($startHour, 0, 2) < (int)substr($endHour, 0, 2)) {
            $check_time_validity = true;
        } else if ((int)substr($startHour, 0, 2) == (int)substr($endHour, 0, 2)) {
            if ((int)substr($startHour, 3, 2) < (int)substr($endHour, 3, 2)) {
                $check_time_validity = true;
            }
        }
        if ($check_time_validity == false) {
            echo "<script type='text/javascript'>alert(' Entered impossible time parameters \\n Check that the start time occurs before the end time');</script>";
            return false;
        } else {
            return
                array(
                    "startHour" => $startHour,
                    "endHour" => $endHour
                );
        }
    }

?>
