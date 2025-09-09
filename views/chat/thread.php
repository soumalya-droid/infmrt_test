<?php
session_start();
include __DIR__ . '/../config/config.php'; // DB connection

// Assuming user is logged in
$loggedInUserId = $_SESSION['user_id'] ?? 1; // Replace with session logic
$chat_id = isset($_GET['chat_id']) ? (int)$_GET['chat_id'] : 0;

// Send message endpoint
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['chat_id'], $_POST['message'])) {
    $chatId = (int)$_POST['chat_id'];
    $message = trim($_POST['message']);
    if ($message !== '') {
        $stmt = $conn->prepare("INSERT INTO messages (chat_id, sender_id, body) VALUES (?, ?, ?)");
        $stmt->bind_param('iis', $chatId, $loggedInUserId, $message);
        $stmt->execute();
        $stmt->close();
    }
    echo json_encode(['success'=>true]);
    exit;
}

// Poll endpoint
if (isset($_GET['chat_id'], $_GET['after'])) {
    $chatId = (int)$_GET['chat_id'];
    $after = (int)$_GET['after'];
    $stmt = $conn->prepare("
        SELECT m.id, m.body, m.sender_id, u.name AS sender_name
        FROM messages m
        JOIN users u ON m.sender_id = u.id
        WHERE m.chat_id=? AND m.id>?
        ORDER BY m.created_at ASC
    ");
    $stmt->bind_param('ii', $chatId, $after);
    $stmt->execute();
    $result = $stmt->get_result();
    $messages = [];
    while ($row = $result->fetch_assoc()) {
        $messages[] = $row;
    }
    echo json_encode($messages);
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        body { font-family: 'Inter', sans-serif; background-color: #f7fafc; color: #2d3748; }
        .btn { padding: 0.75rem 1.5rem; border-radius: 9999px; font-weight: 600; transition: transform 0.2s, background-color 0.2s; background-color: #6b46c1; color: white; }
        .btn:hover { transform: translateY(-2px); background-color: #553c9a; }
        .form-input { width: 100%; padding: 0.75rem 1.25rem; border-radius: 8px; border: 2px solid #e2e8f0; outline: none; transition: border-color 0.2s; }
        .form-input:focus { border-color: #6b46c1; }
        .card { background: #fff; border-radius: 12px; padding: 2rem; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1),0 2px 4px -1px rgba(0,0,0,0.06); }
        #chat { max-height: 400px; overflow-y: auto; margin-bottom: 1rem; }
        .msg { padding: 0.5rem 1rem; margin-bottom: 0.5rem; border-radius: 8px; background-color: #edf2f7; }
    </style>
</head>
<body class="bg-gray-50 min-h-screen flex flex-col">
    <!-- Header -->
    <div class="header-container">
        <?php include __DIR__ . '/../partials/header.php'; ?>
    </div>

    <!-- Main Content -->
    <main class="flex-grow">
        <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <h1 class="text-4xl font-extrabold text-purple-700 mb-8 text-center">Chat</h1>
            <div class="card">
                <div id="chat" class="chat-box"></div>
                <form id="chatForm" class="flex gap-2">
                    <input type="hidden" name="csrf" value="<?= htmlspecialchars(csrf_token()) ?>">
                    <input type="hidden" id="chat_id" value="<?= $chat_id ?>">
                    <input id="msg" class="form-input flex-grow" placeholder="Type a message..." autocomplete="off">
                    <button class="btn" type="submit">Send</button>
                </form>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="mt-auto">
        <?php include __DIR__ . '/../partials/footer.php'; ?>
    </footer>

    <script>
        const chatId = document.getElementById('chat_id').value;
        let lastId = 0;

        async function poll(){
            const res = await fetch('?chat_id='+chatId+'&after='+lastId);
            const data = await res.json();
            const box = document.getElementById('chat');
            data.forEach(m => {
                lastId = Math.max(lastId, parseInt(m.id));
                const div = document.createElement('div');
                div.className='msg';
                div.textContent = m.sender_name + ': ' + m.body;
                box.appendChild(div);
                box.scrollTop = box.scrollHeight;
            });
        }
        setInterval(poll, 1500);
        poll();

        document.getElementById('chatForm').addEventListener('submit', async (e)=>{
            e.preventDefault();
            const body = new URLSearchParams();
            body.append('csrf', document.querySelector('input[name=csrf]').value);
            body.append('chat_id', chatId);
            body.append('message', document.getElementById('msg').value);
            await fetch('', {
                method:'POST', 
                headers:{'Content-Type':'application/x-www-form-urlencoded'}, 
                body
            });
            document.getElementById('msg').value = '';
        });
    </script>
</body>
</html>
