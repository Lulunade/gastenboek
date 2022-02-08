<?php
function get_connection() 
{
    $servername = "localhost";
    $username = "student4a9_544355";
    $password = "25mvhL";
    $dbName = "student4a9_544355";
    static $connection;

    // als de connectie nog niet gemaakt is maak dan een nieuwe aan
    if (!isset($connection)) {
        $connection = new mysqli($servername, $username, $password, $dbName);
    }

    // als de connectie niet slaagt dan geeft het een error
    if ($connection->connect_error) {
        die("Error tijdens het maken van een connectie naar de database!");
    }

    // het connectie object wordt terugverzonden aan het einde van de functie
    return $connection;
}

function get_messages($connection)
{
    $data = null;
    $query = "SELECT `naam`, `tekst`, `datum` from `bericht` ORDER BY ID";
    $statement = $connection->prepare($query);
    if ($statement->execute()) {
        $data = [];
        $result = $statement->get_result();
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }
    return $data;
}

function show_messages($messages)
{
    $html = null;

    foreach ($messages as $message) {
        $name = htmlspecialchars($message['naam']);
        $text = htmlspecialchars($message['tekst']);
        $date = htmlspecialchars($message['datum']);
        $formatted_date = date ("d-m-Y H:i", strtotime($date));

        $html .= <<< DATA
            <div class="datarow">
                <div class="dataitem">$name</div>
                <div class="dataitem">$text</div>
                <div class="dataitem">$formatted_date</div>
            </div>
DATA;
    }
    return $html;
}

function add_messages($naam, $tekst) 
{
    $connection = get_connection();
    mysqli_query($connection,"INSERT INTO bericht (naam, tekst) VALUES ('$naam', '$tekst')");
}