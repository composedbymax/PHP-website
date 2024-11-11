<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="this is just my contact page. please dont spam it">
    <title>Max | Contact Me</title>
    <link rel="stylesheet" href="/css/contact.css">
</head>
<body>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/inc/nav.php'; ?>
    <div class="form-container">
        <h2>Contact Me</h2>
        
        <?php
        // Display message from session if it exists
        session_start();
        if (isset($_SESSION['message'])) {
            echo $_SESSION['message'];
            unset($_SESSION['message']);
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = trim($_POST['name'] ?? '');
            $email = trim($_POST['email'] ?? '');
            $message = trim($_POST['message'] ?? '');
            
            if (empty($name) || empty($email) || empty($message)) {
                $_SESSION['message'] = '<div class="message error">Please fill in all fields.</div>';
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $_SESSION['message'] = '<div class="message error">Please enter a valid email address.</div>';
            } else {
                $submission = [
                    'date' => date('Y-m-d H:i:s'),
                    'name' => $name,
                    'email' => $email,
                    'message' => $message
                ];
                
                $contactsFile = 'contacts.json';
                $contacts = file_exists($contactsFile) ? json_decode(file_get_contents($contactsFile), true) : [];
                $contacts[] = $submission;
                
                if (file_put_contents($contactsFile, json_encode($contacts, JSON_PRETTY_PRINT))) {
                    $_SESSION['message'] = '<div class="message success">Thank you for your message! We will get back to you soon.</div>';
                } else {
                    $_SESSION['message'] = '<div class="message error">Sorry, there was an error saving your message. Please try again.</div>';
                }
            }
            
            // Redirect after POST to prevent form resubmission
            header('Location: ' . $_SERVER['PHP_SELF']);
            exit;
        }
        ?>
        
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" 
                       id="name" 
                       name="name" 
                       autocomplete="name" 
                       required>
            </div>
            
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" 
                       id="email" 
                       name="email" 
                       autocomplete="email" 
                       required>
            </div>
            
            <div class="form-group">
                <label for="message">Message:</label>
                <textarea id="message" 
                          name="message" 
                          autocomplete="off" 
                          required></textarea>
            </div>
            
            <button type="submit" class="submit-btn">Send Message</button>
        </form>
    </div>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/inc/foot.php'; ?>
</body>
</html>