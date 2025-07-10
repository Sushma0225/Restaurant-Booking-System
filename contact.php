<?php session_start();
include 'birthday_check.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Diyalo Restaurant | Contact</title>
  <link rel="stylesheet" href="header-footer.css" />
  <style>
   .main-section {
      background-image: url('https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/13fee3a3-25c3-443e-b1d6-dcec2ed3bf26.png');
      background-size: cover;
      background-position: center;
      padding: 100px 20px;
      color: white;
      text-align: left;
      padding-left: 120px;
    }
      
    .main-section h1 {
      font-family: 'Arial Black', sans-serif;
      font-size: 3rem;
      font-weight: 800;
      text-shadow: 3px 3px 8px rgba(0, 0, 0, 0.7);
    }

    /* Combined container for contact info + form */
    .contact-wrapper {
      max-width: 900px;      /* Reduced width */
      margin: 40px auto 0;   /* Top margin to add space from background */
      padding: 40px 30px;
      display: flex;
      gap: 40px;
      background-color: #fdf9e6;
      border-radius: 20px;
      box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
      flex-wrap: wrap;
      justify-content: center;
    }

    .contact-info {
      flex: 1 1 300px;
      /* Removed background and box-shadow because container has it */
      padding: 0;
      border-radius: 0;
      box-shadow: none;
    }

    .contact-info h2 {
      font-size: 2rem;
      margin-bottom: 15px;
      color: #333;
    }

    .contact-info p {
      color: #555;
      font-size: 1rem;
      line-height: 1.6;
    }

    .contact-form {
      flex: 1 1 300px;
      padding: 0;
      border-radius: 0;
      box-shadow: none;
      display: flex;
      flex-direction: column;
      gap: 15px;
      background: none;
    }

    .contact-form input,
    .contact-form textarea {
      padding: 12px;
      border: none;
      background-color: #efedce;
      border-radius: 6px;
      font-size: 15px;
    }

    .contact-form textarea {
      resize: vertical;
      height: 100px;
    }

    .contact-form button {
      padding: 12px;
      border: none;
      background-color: #b6a75f;
      color: white;
      font-size: 16px;
      border-radius: 6px;
      cursor: pointer;
      transition: background 0.3s ease;
    }

    .contact-form button:hover {
      background-color: #a2934e;
    }

    @media (max-width: 768px) {
      .main-section h1 {
        font-size: 2.3rem;
      }

      .contact-wrapper {
        flex-direction: column;
        padding: 30px 15px;
        max-width: 95%;
        margin-top: 30px;
      }
    }
  </style>
</head>
<body>
<?php if ($isBirthday): ?>
  <div class="birthday-banner">
    🎉 Happy Birthday! Enjoy a special treat at Diyalo Restaurant with 10% discount! 🎂
  </div>
<?php endif; ?>

  <header>
    <div class="logo">
      <img src="image/logo.png" alt="Diyalo Logo">
    </div>
    <nav>
      <a href="index.php">🏠 Home</a>
      <a href="menu.php">📋 Menu</a>
      <a href="contact.php" class="active">📞 Contact</a>
      <a href="gallery.php">🖼️ Gallery</a>
    </nav>
  </header>

  <div class="main-section">
    <h1>Diyalo Restaurant</h1>
  </div>

  <div class="contact-wrapper">
    <div class="contact-info">
      <h2>Get in Touch</h2>
      <p>
        We'd love to hear from you! Whether you have a question about our dishes, reservations, or anything else — our team is ready to answer all your questions.
      </p>
    </div>
    <form class="contact-form" action="contact1.php" method="POST">
  <input type="text" name="name" placeholder="Your Name" required />
  <input type="tel" name="phone" placeholder="Phone Number" required />
  <input type="email" name="email" placeholder="Email Address" required />
  <textarea name="message" placeholder="Your Message" required></textarea>
  <button type="submit">Send Message</button>
</form>

  </div>

  <footer>
    <p>📍 Kohalpur, Banke, Lumbini Province, Nepal</p>
    <p>&copy; 2025 Diyalo Restaurant. All rights reserved.</p>
  </footer>

</body>
</html>
