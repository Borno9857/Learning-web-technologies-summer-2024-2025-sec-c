<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body { font-family: Arial, sans-serif; margin: 2rem; }
        form { max-width: 360px; margin: 0 auto; display: grid; gap: 12px; }
        input, select, button { padding: 8px 10px; font-size: 14px; }
        .actions { display: flex; justify-content: space-between; align-items: center; }
        a { font-size: 14px; }
    </style>
    </head>
<body>
    <h1>Login</h1>
    <form method="post" action="index.php?action=login">
        <label>
            ID
            <input type="text" name="id" required>
        </label>
        <label>
            Password
            <input type="password" name="password" required>
        </label>
        <div class="actions">
            <button type="submit">Login</button>
            <a href="index.php?action=register">Create an account</a>
        </div>
    </form>
</body>
</html>




