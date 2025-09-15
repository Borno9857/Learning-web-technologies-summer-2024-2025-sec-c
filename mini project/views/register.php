<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body { font-family: Arial, sans-serif; margin: 2rem; }
        form { max-width: 480px; margin: 0 auto; display: grid; gap: 12px; }
        input, select, button { padding: 8px 10px; font-size: 14px; }
        .actions { display: flex; justify-content: space-between; align-items: center; }
        a { font-size: 14px; }
    </style>
    </head>
<body>
    <h1>Create Account</h1>
    <form method="post" action="index.php?action=register">
        <label>
            ID
            <input type="text" name="id" required>
        </label>
        <label>
            Name
            <input type="text" name="name" required>
        </label>
        <label>
            Password
            <input type="password" name="password" required>
        </label>
        <label>
            Confirm Password
            <input type="password" name="confirm_password" required>
        </label>
        <label>
            User Type
            <select name="user_type" required>
                <option value="user">User</option>
                <option value="admin">Admin</option>
            </select>
        </label>
        <div class="actions">
            <button type="submit">Register</button>
            <a href="index.php?action=login">Back to login</a>
        </div>
    </form>
</body>
</html>




