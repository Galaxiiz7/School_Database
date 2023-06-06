<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="/School/css/LoginStyle.css">
  <title>Login Page</title>
</head>
<body>
    <section>
        <div class="form-box">
            <div class="form-value">
                <h2>Student Login</h2>
                <form method="POST" action="StudentLogin.php">
                    <div class="inputbox">
                        <ion-icon name="person-outline"></ion-icon>
                        <input type="text" name="student_id" id="student_id" required>
                        <label for="">Username</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="password" name="password" id="password" required>
                        <label for="">Password</label>
                    </div>
                    <button>Log in</button>
                </form>
            </div>
        </div>
    </section>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script> 
</body>
</html>
