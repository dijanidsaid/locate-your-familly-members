<?php
require 'vendor/autoload.php';



use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;

class LocationUpdater implements MessageComponentInterface {
    protected $clients;
    
    public function __construct() {
        $this->clients = new \SplObjectStorage;
    }

    public function onOpen(ConnectionInterface $conn) {
        $this->clients->attach($conn);
    }

    public function onMessage(ConnectionInterface $from, $msg) {
        // Receive the updated location data
        $data = json_decode($msg);
        $latitude = $data->latitude;
        $longitude = $data->longitude;
        
        // Store the updated location data in the database
        $con = mysqli_connect('localhost', 'root', '', 'userform');
        $latitude = mysqli_real_escape_string($con, $data['latitude']);
        $longitude = mysqli_real_escape_string($con, $data['longitude']);
        $sql = "INSERT INTO usertable ( latitude, longitude) VALUES ( '$latitude', '$longitude')";
        if ($con->query($sql) === TRUE) {
            echo "Location data added successfully";
        } else {
            echo "Error adding location data: " . $con->error;
        }
        // ...
        
        // Broadcast the updated location data to all connected clients
        foreach ($this->clients as $client) {
            $client->send($msg);
        }
    }

    public function onClose(ConnectionInterface $conn) {
        $this->clients->detach($conn);
    }

    public function onError(ConnectionInterface $conn, \Exception $e) {
        $conn->close();
    }
}
