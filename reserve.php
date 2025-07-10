<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Diyalo Restaurant | Table Reservation</title>
   <link rel="stylesheet" href="header-footer.css" />
  <style>
    .reservation-section {
      max-width: 600px;
      background: #fff;
      margin: 50px auto;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
    }

    .reservation-section h2 {
      text-align: center;
      color: #ff6600;
      margin-bottom: 25px;
    }

    form label {
      display: block;
      margin-bottom: 6px;
      font-weight: bold;
    }

    form input,
    form select,
    form textarea {
      width: 100%;
      padding: 10px;
      margin-bottom: 20px;
      border: 1px solid #ddd;
      border-radius: 8px;
      font-size: 16px;
    }

    form button {
      background-color:#ff6600;
      color: white;
      border: none;
      padding: 12px 20px;
      border-radius: 8px;
      font-size: 16px;
      cursor: pointer;
      width: 100%;
      transition: background 0.3s ease;
    }

    form button:hover {
      background-color: #e74c3c;
    }
  </style>
</head>
<body>

  <header>
    <div class="logo">
      <img src="image/logo.png" alt="Diyalo Logo">
    </div>
    <nav>
      <a href="index.php">🏠 Home</a>
      <a href="menu.php">📋 Menu</a>
      <a href="contact.php">📞 Contact</a>
      <a href="gallery.php">🖼️ Gallery</a>
    </nav>
  </header>

  <div class="reservation-section">
    <h2>Reserve Your Table</h2>
    <form action="reserve1.php" method="post">
      <label for="name">Full Name</label>
      <input type="text" id="name" name="name" placeholder="Your full name" required>

      <label for="email">Email Address</label>
      <input type="email" id="email" name="email" placeholder="example@email.com" required>

      <label for="phone">Phone Number</label>
      <input type="tel" id="phone" name="phone" placeholder="98XXXXXXXX" required>

      <label for="date">Reservation Date</label>
      <input type="date" id="date" name="date" required>

      <label for="time">Time</label>
      <input type="time" id="time" name="time" required>

      <label for="table">Table Number</label>
      <select id="table" name="table" required>
       <option value="">Select a table</option>
       <option value="1">Table 1</option>
       <option value="2">Table 2</option>
       <option value="3">Table 3</option>
       <option value="4">Table 4</option>
       <option value="5">Table 5</option>
       <option value="6">Table 6</option>
       <option value="7">Table 7</option>
       <option value="8">Table 8</option>
       <option value="9">Table 9</option>
       <option value="10">Table 10</option>
      </select>

      <label for="guests">Number of Guests</label>
      <select id="guests" name="guests" required>
        <option value="">Select</option>
        <option value="1">1 Guest</option>
        <option value="2">2 Guests</option>
        <option value="3">3 Guests</option>
        <option value="4">4 Guests</option>
        <option value="5+">5 or more</option>
      </select>

      <label for="message">Special Requests (Optional)</label>
      <textarea id="message" name="message" rows="4" placeholder="Any message..."></textarea>

      <button type="submit">Book Table</button>
    </form>
  </div>

  <footer>
    <p>📍 Kohalpur, Banke, Lumbini Province, Nepal</p>
    <p>&copy; 2025 Diyalo Restaurant. All rights reserved.</p>
  </footer>
<script>
  const form = document.querySelector('form');

  form.addEventListener('submit', function(event) {
    const name = form.name.value.trim();
    const email = form.email.value.trim();
    const phone = form.phone.value.trim();
    const date = form.date.value;
    const time = form.time.value;
    const guests = form.guests.value;

    if (!name || !email || !phone || !date || !time || !guests) {
      alert("Please fill in all required fields.");
      event.preventDefault();
      return;
    }

    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailPattern.test(email)) {
      alert("Invalid email address.");
      event.preventDefault();
      return;
    }

    const today = new Date();
    today.setHours(0,0,0,0);
    const selectedDate = new Date(date);

    if (selectedDate < today) {
      alert("Reservation date cannot be in the past. Please select today or a future date.");
      event.preventDefault();
      return;
    }
  });
</script>

</body>
</html>
