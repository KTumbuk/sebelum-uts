<?php include "_partial/_template/nav.php"?>
<?php include "database/connect.php";?>
<?phpsession_start();
require "database/connect.php"; 
?>

<?php
include "database/connect.php"; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);
    $email = trim($_POST["email"]);
    $password = $_POST["password"];

    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    $check_query = "SELECT * FROM users WHERE email = ? OR username = ?";
    $stmt = $conn->prepare($check_query);
    $stmt->bind_param("ss", $email, $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "Username or Email already exists!";
    } else {
        $insert_query = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($insert_query);
        $stmt->bind_param("sss", $username, $email, $hashed_password);

        if ($stmt->execute()) {
            echo "Registration successful!";
            header("Location: index.php?page=login"); 
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }
    }

    $stmt->close();
    }
$conn->close();
?>



    <div class="container row mt-5" style="display: flex; align-items: center; align-content: center;">
        <form class="form" method="POST" >
            <p class="form-title">Register</p>
        <div class="input-container">
            <input type="text" name="username" placeholder="Enter username" required>
            <input type="email" name="email" placeholder="Enter email" required>
        </div>
        <div class="input-container">
            <input type="password" name="password" placeholder="Enter password" required>
        </div>
        <button type="submit" class="submit">
            Register
        </button>
        </form>

    </div>

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"></script>
</body>