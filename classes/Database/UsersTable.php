<?php

namespace Database;

use PDOException;
use Helpers\Auth;

class UsersTable {
    private $db;

    public function __construct(MySQL $db)
    {
        $this->db =$db->connect();
    }

    public function roomRel($id)
    {
        $id = $_GET['id'];
        $statement = $this->db->query(
            "SELECT rooms.* FROM rooms 
            LEFT JOIN bookings ON bookings.room_id = rooms.id WHERE rooms.id = $id"
        );
        // $statement->execute(['id' => $id]);
        return $statement->fetch();
    }

    public function userRel()
    {

    $guest = Auth::check();

        $statement = $this->db->query(
            "SELECT bookings.*,rooms.name AS room,rooms.room_number AS roomNumber FROM bookings 
            --  LEFT JOIN guests ON bookings.guest_id = guests.id
            LEFT JOIN rooms ON bookings.room_id = rooms.id WHERE guest_id = $guest->id "
        );
        
        return $statement->fetchAll();    
    }



    public function registerUser($data)
    {   
        try {

            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

            $statement = $this->db->prepare(
            "INSERT INTO guests(name, email, password, phone)
            VALUES (:name, :email, :password, :phone)");

            $statement->execute($data);
            return $this->db->lastInsertId();

        } catch(PDOException $e) {
            echo $e->getMessage();
            exit();
        }
    }

    public function loginUser($name, $email, $password)
    {
        $statement = $this->db->prepare(
            "SELECT * FROM guests WHERE name=:name AND email=:email"
        );

        $statement->execute([ 'name' => $name, 'email' => $email]);
        $guests = $statement->fetch();

        if($guests) {
            if(password_verify($password, $guests->password)){
                return $guests;
            }
            return false;
        }
    }

    public function bookRoom($roomId, $guest_id,  $checkIn, $checkOut, $adult, $child)
    {   
        $statement = $this->db->prepare(
            "INSERT INTO bookings(room_id, guest_id, check_in, check_out, adult, child)
            VALUES (:room_id, :guest_id, :check_in, :check_out, :adult, :child)"
        );
        $statement->execute([ 'room_id' => $roomId, 'guest_id' => $guest_id,  'check_in' => $checkIn, 'check_out' => $checkOut, 'adult' => $adult, 'child' => $child]);

        $statement = $this->db->prepare("UPDATE rooms SET status = 'booked' WHERE id = :room_id");
        return $statement->execute(['room_id' => $roomId]);
    }

    public function addRoom($data)
    {
        $statement = $this->db->prepare(
            "INSERT INTO rooms(name, room_number, adult, child, price, photo)
            VALUES (:name, :room_number, :adult, :child, :price, :photo)"
        );

         return $statement->execute($data);
    }

    public function getRooms()
    {
        $statement = $this->db->query(
            "SELECT * FROM rooms WHERE status = 'available'"
        );
        return $statement->fetchAll();
    }

    public function superiorRoom()
    {
        $statement = $this->db->query(
            "SELECT * FROM rooms WHERE name = 'Superior'"
        );
        return $statement->fetchAll();
    }

    public function deluxeRoom()
    {
        
        $statement = $this->db->query(
            "SELECT * FROM rooms WHERE name = 'Deluxe' "
        );
        return $statement->fetchAll();
        
    }

    public function luxuryRoom()
    {
        
        $statement = $this->db->query(
            "SELECT * FROM rooms WHERE name = 'Luxury' "
        );
        return $statement->fetchAll();
        
    }

    public function update($data)
    {
        $statement = $this->db->prepare("UPDATE rooms SET room_number=:room_number, name=:name, adult=:adult, child=:child, price=:price, photo=:photo WHERE id=:id");
        return $statement->execute($data);
    }

    public function show($name, $adult, $child)
    {
        $statement = $this->db->prepare("SELECT * FROM rooms WHERE name=:name AND adult=:adult AND child=:child");
        $statement->execute(['name' => $name, 'adult' => $adult, 'child' => $child]);
        return $statement->fetchAll();
    }

    public function edit($id)
    {
        $statement = $this->db->prepare("SELECT * FROM rooms WHERE id=:id");
        $statement->execute(['id' => $id]);
        return $statement->fetch();
    }

    // public function roomInfo($id) 
    // {
    //     $statement = $this->db->prepare("SELECT * FROM rooms WHERE id=:id");
    //     $statement->execute(['id' => $id]);
    //     return $statement->fetch();
    // }
}