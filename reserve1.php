<?php
session_start();
include 'db.php';

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $date = $_POST['date'] ?? '';
    $time = $_POST['time'] ?? '';
    $guests = $_POST['guests'] ?? '';
    $table_no = $_POST['table'] ?? '';
    $message = trim($_POST['message'] ?? '');

    // Input Validation
    if (!$name || !$email || !$phone || !$date || !$time || !$guests || !$table_no) {
        $error = "Please fill in all required fields.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Invalid email address.";
    } else {
        $today = date('Y-m-d');
        if ($date < $today) {
            $error = "Reservation date cannot be in the past.";
        }
    }

    if ($error) {
        echo "<script>alert('$error'); window.history.back();</script>";
    } else {
        // Check if table already booked
        $check = $conn->prepare("SELECT * FROM reservations WHERE reservation_date = ? AND reservation_time = ? AND table_no = ?");
        $check->bind_param("sss", $date, $time, $table_no);
        $check->execute();
        $result = $check->get_result();

        if ($result->num_rows > 0) {
            echo "<script>alert('This table is already booked for the selected date and time. Please choose another.'); window.history.back();</script>";
        } else {
            // Proceed to insert
            $sql = "INSERT INTO reservations (name, email, phone, reservation_date, reservation_time, guests, message, table_no)
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssssssss", $name, $email, $phone, $date, $time, $guests, $message, $table_no);

            if ($stmt->execute()) {
                echo "<script>alert('Reservation successful!'); window.location.href='index.php';</script>";
            } else {
                echo "<script>alert('Error saving reservation.'); window.history.back();</script>";
            }
            $stmt->close();
        }
        $check->close();
    }

    $conn->close();
}
?>
