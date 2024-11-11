<?php include $_SERVER['DOCUMENT_ROOT'] . '/auth_admin.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="keywords">
    <title>View Contact Submissions</title>
    <style>
        body {
            background-color: black;
            color: white;
            font-family: Arial, sans-serif;
            margin: 0;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            box-sizing: border-box;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
        }
        .message {
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 4px;
            padding: 15px;
            margin-bottom: 20px;
        }
        .message-header {
            border-bottom: 1px solid #eee;
            padding-bottom: 10px;
            margin-bottom: 10px;
        }
        .message-meta {
            color: #666;
            font-size: 0.9em;
        }
        .message-content {
            white-space: pre-wrap;
            word-wrap: break-word;
        }
        .empty-state {
            text-align: center;
            color: #666;
            padding: 40px;
        }
    </style>
</head>
<body>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/inc/nav.php'; ?>
    <div class="container">
        <h2>Contact Submissions</h2>
        
        <?php
        $contactsFile = '../contacts.json';
        
        if (file_exists($contactsFile)) {
            $contacts = json_decode(file_get_contents($contactsFile), true);
            
            if (!empty($contacts)) {
                // Sort contacts by date, newest first
                usort($contacts, function($a, $b) {
                    return strtotime($b['date']) - strtotime($a['date']);
                });
                
                foreach ($contacts as $contact) {
                    ?>
                    <div class="message">
                        <div class="message-header">
                            <div class="message-meta">
                                <strong>Date:</strong> <?php echo htmlspecialchars($contact['date']); ?><br>
                                <strong>Name:</strong> <?php echo htmlspecialchars($contact['name']); ?><br>
                                <strong>Email:</strong> <?php echo htmlspecialchars($contact['email']); ?>
                            </div>
                        </div>
                        <div class="message-content">
                            <?php echo nl2br(htmlspecialchars($contact['message'])); ?>
                        </div>
                    </div>
                    <?php
                }
            } else {
                echo '<div class="empty-state">No contact submissions yet.</div>';
            }
        } else {
            echo '<div class="empty-state">No contact submissions yet.</div>';
        }
        ?>
    </div>
</body>
</html>