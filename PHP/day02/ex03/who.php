#!usr/bin/php
<?php
    $source = "/var/run/utmpx";
    date_default_timezone_set("Europe/Moscow");
    $fd = fopen($source, "r");
    fread($fd, 1256);

    while (!feof($fd)) {
        $name = fread($fd, 256);
        if ($name == "")
            break ;
        $info = [
            "name" => $name,
            "console_id" => fread($fd, 4),
            "console_name" => fread($fd, 32),
            "offset01" => fread($fd, 8),
            "time" => unpack("I", fread($fd, 4))[1],
            "offset02" => fread($fd, 324)
        ];
        echo $info["name"] . "  " .  $info["console_name"] . "  " . date("M j G:i", $info["time"]) . "\n";
    }
    fclose($fd);
?>

