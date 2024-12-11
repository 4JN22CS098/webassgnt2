<?php
// Database connection details
$host = "localhost";
$username = "root";
$password = "";
$db_name = "BusinessLoanForm";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db_name;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

// Initialize variables
$BusinessName = $contactNumber = $email = $Loanamount = $TaxID = $EstablishedDate = $LoanType = "";

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $BusinessName  = htmlspecialchars($_POST["BusinessName"]);
    $contactNumber = htmlspecialchars($_POST["contactNumber"]);
    $email = htmlspecialchars($_POST["email"]);
    $Loanamount = htmlspecialchars($_POST["Loanamount"]);
    $TaxID = htmlspecialchars($_POST["TaxID"]);
    $EstablishedDate = htmlspecialchars($_POST["EstablishedDate"]);
    $LoanType = htmlspecialchars($_POST["LoanType"]);
    try {
        $stmt = $pdo->prepare("INSERT INTO reg (BusinessName,contactNumber,email,Loanamount,TaxID,EstablishedDate,LoanType )
                               VALUES (?, ?, ?, ?,?,?, ?)");
        $stmt->execute([$BusinessName,$contactNumber,$email,$Loanamount,$TaxID,$EstablishedDate,$LoanType ]);
    } catch (PDOException $e) {
        if ($e->getCode() == 23000) {
            echo "Error: Duplicate entry. <a href='index.html'>Try again</a>";
            exit();
        } else {
            echo "Error: " . $e->getMessage();
            exit();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Business Loan Form Details</title>
    <link rel="stylesheet" href="style1.css">
</head>
<body>
    <div class="container">
        <h1>Business Loan Form Details</h1>
        <p><strong>Business Name:</strong> <?= htmlspecialchars($BusinessName) ?></p>
        <p><strong>Contact Number:</strong> <?= htmlspecialchars($contactNumber) ?></p>
        <p><strong>Email:</strong> <?= htmlspecialchars($email) ?></p>
        <p><strong>Loanamount:</strong> <?= htmlspecialchars($Loanamount) ?></p>
        <p><strong>TaxID:</strong> <?= htmlspecialchars($TaxID) ?></p>
        <p><strong>Established Date:</strong> <?= htmlspecialchars($EstablishedDate) ?></p>
        <p><strong>Loan Type:</strong> <?= htmlspecialchars($LoanType) ?></p>
        <a href="index.html" style="display: block; margin-top: 20px; text-align: center; color: #5cb85c;">Back to Form</a>
    </div>
</body>
</html>
