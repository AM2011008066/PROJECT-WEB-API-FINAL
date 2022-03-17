<?php
//-----------------------------------------------ADMIN SIDE-------------------------------------------------------------


//get all admin
function getAllAdmin($db)
{
    $sql = 'Select a.id, a.email, a.password from admin a ';
    $stmt = $db->prepare ($sql);
    $stmt ->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

//get admin by id
function getAdmin($db, $adminId)
{
    $sql = 'Select a.id, a.email, a.password from admin a ';
    $sql .= 'Where a.id = :id';
    $stmt = $db->prepare ($sql);
    $id = (int) $adminId;
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

//add new admin
function createAdmin($db, $form_data) {
    $sql = 'Insert into admin (email, password)';
    $sql .= 'values (:email, :password)';
    $stmt = $db->prepare ($sql);
    $stmt->bindParam(':email', $form_data['email']);
    $stmt->bindParam(':password', $form_data['password']);
    $stmt->execute();
    return $db->lastInsertID();//insert last number.. continue
    }

//delete admin by id
function deleteMin($db,$adminId) {
    $sql = ' Delete from admin where id = :id';
    $stmt = $db->prepare($sql);
    $id = (int)$adminId;
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    }
    
    //update admin by id
    function updateMin($db,$form_dat,$adminId) {
    $sql = 'UPDATE admin SET email = :email , password = :password';
    $sql = 'WHERE id = :id';
    $stmt = $db->prepare ($sql);
    $id = (int)$adminId;
    //$mod = $date;
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->bindParam(':email', $form_dat['email']);
    $stmt->bindParam(':password', $form_dat['password']);
    $stmt->execute();
    }


//-----------------------------------------------STUDENT SIDE-------------------------------------------------------------


//get all student
function getAllStudent($db)
{
    $sql = 'Select s.email, s.password from student s ';
    $stmt = $db->prepare ($sql);
    $stmt ->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

//get student by id
function getStudent($db, $studentId)
{
    $sql = 'Select s.email, s.password from student s ';
    $sql .= 'Where s.id = :id';
    $stmt = $db->prepare ($sql);
    $id = (int) $studentId;
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

//add new student
function createStudent($db, $form_data) {
    $sql = 'Insert into student (email, password)';
    $sql .= 'values (:email, :password)';
    $stmt = $db->prepare ($sql);
    $stmt->bindParam(':email', $form_data['email']);
    $stmt->bindParam(':password', $form_data['password']);
    $stmt->execute();
    return $db->lastInsertID();//insert last number.. continue
    }

//delete student by id
function deleteAdmin($db,$studentId) {
    $sql = ' Delete from admin where id = :id';
    $stmt = $db->prepare($sql);
    $id = (int)$studentId;
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    }
    
    //update student by id
    function updateAdmin($db,$form_dat,$studentId,$date) {
    $sql = 'UPDATE student SET email = :email , password = :password';
    $sql .=' WHERE id = :id';
    $stmt = $db->prepare ($sql);
    $id = (int)$studentId;
    $mod = $date;
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->bindParam(':email', $form_dat['email']);
    $stmt->bindParam(':email', $form_dat['email']);
    $stmt->execute();
    }


//-----------------------------------------------BOOKING SIDE-------------------------------------------------------------


//get all booking
function getAllBooking($db)
{
$sql = 'Select b.id, b.name, b.date, b.time, b.reason from booking b ';
$stmt = $db->prepare ($sql);
$stmt ->execute();
return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

//get booking by id
function getBooking($db, $bookingId)
{
$sql = 'Select b.id, b.name, b.date, b.time, b.reason from booking b ';
$sql .= 'Where b.id = :id';
$stmt = $db->prepare ($sql);
$id = (int) $bookingId;
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();
return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

//add new booking
function createBooking($db, $form_data) {
    $sql = 'Insert into booking (name, date, time, reason)';
    $sql .= 'values (:name, :date, :time, :reason)';
    $stmt = $db->prepare ($sql);
    $stmt->bindParam(':name', $form_data['name']);
    $stmt->bindParam(':date', $form_data['date']);
    $stmt->bindParam(':time', ($form_data['time']));
    $stmt->bindParam(':reason', ($form_data['reason']));
    $stmt->execute();
    return $db->lastInsertID();//insert last number.. continue
    }

//delete booking by id
function deleteBooking($db,$bookingId) {
    $sql = ' Delete from booking where id = :id';
    $stmt = $db->prepare($sql);
    $id = (int)$bookingId;
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    }
    
    //update booking by id
    function updatebooking($db,$form_dat,$bookingId,$date,$time) {
    $sql = 'UPDATE booking SET name = :name , date = :date , time = :time , reason = :reason';
    $sql .=' WHERE id = :id';
    $stmt = $db->prepare ($sql);
    $id = (int)$bookingId;
    $mod = $date;
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->bindParam(':name', $form_dat['name']);
    $stmt->bindParam(':date', $form_dat['date']);
    $stmt->bindParam(':time', ($form_dat['time']));
    $stmt->bindParam(':reason', ($form_dat['reason']));
    $stmt->execute();
    }

