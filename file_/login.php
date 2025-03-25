<?php 
session_start();
require "database/connect.php"; 

$error_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST["email"]);
    $password = $_POST["password"];

    if (empty($email) || empty($password)) {
        $error_message = "All fields are required!";
    } else {
        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if (password_verify($password, $row['password'])) {
                $_SESSION['email'] = $row['email'];
                $_SESSION['user_id'] = $row['id'];
                header("location:index.php?page=home");
                exit();
            } else {
                $error_message = "Invalid email or password!";
            }
        } else {
            $error_message = "Account does not exist!";
        }
        $stmt->close();
    }
    $conn->close();
}
?>

<?php include "_partial/_template/nav.php"; ?>

<div class="container row mt-5" style="display: flex; align-items: center; align-content: center;">
    <form class="form" method="POST">
        <p class="form-title">Login</p>
        <?php if (!empty($error_message)): ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $error_message; ?>
            </div>
        <?php endif; ?>
        <div class="input-container">
            <input type="email" name="email" placeholder="Enter email" required>
        </div>
        <div class="input-container">
            <input type="password" name="password" placeholder="Enter password" required>
        </div>
        <button type="submit" name="login" class="submit">
            Login
        </button>
        <p class="signup-link">
            No account?
            <a href="index.php?page=register">Sign up</a>
        </p>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
crossorigin="anonymous"></script>