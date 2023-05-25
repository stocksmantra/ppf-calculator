<!DOCTYPE html>
<html>
<head>
    <title>PPF Calculator</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
</head>
<style>
    body {
        background-image: url('https://www.pnbmetlife.com/content/dam/pnb-metlife/images/articles/article-banner-placeholder.jpg');	
}
  .text{
    margin-left:14em;
    margin-top:3em;
    color:white;
  }
  .form-signin {
  max-width: 420px;
  padding: 15px 35px 45px;
  margin: 0 auto;
  background-color: #B0C4DE ;
  border: 1px solid rgba(0,0,0,0.1);}
  .form-control {
	  position: relative;
	  font-size: 16px;
	  height: auto;
	  padding: 8px;
		@include box-sizing(border-box);}
     .font{
        font-size:20px;
     }
     .button{
        background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 8px 26px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  border-radius:3px ;
     }   
</style>
<body>
    <h1 class="text">PPF Calculator</h1>
    <form method="post" class="form-signin" action="<?php echo $_SERVER['PHP_SELF']; ?>">
       <b class="font"> Principal Amount:</b> <input type="number" class="form-control" name="principal" min="1" required><br>
        <b class="font">Annual Interest Rate:</b> <input type="number" class="form-control" name="rate" min="1" step="0.01" required><br>
        <b class="font">Number of Years:</b> <input type="number" class="form-control" name="years" min="1" required><br>
        <input type="submit" name="submit" class="button" value="Calculate">
        <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $principal = $_POST['principal'];
        $rate = $_POST['rate'] / 100;
        $years = $_POST['years'];

        function calculate_ppf($principal, $rate, $years) {
            return $principal * pow((1 + $rate), $years);
        }

        $maturity_amount = calculate_ppf($principal, $rate, $years);
        echo "<h5>Maturity Amount: " . round($maturity_amount, 2) . "</h5>";
    }
    ?>
    </form>
 
</body>
</html>
