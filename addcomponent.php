<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php include 'sqlcon.php'; ?>
    <title>Add New Component</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script> -->
    <link rel="stylesheet" href="http://localhost/include/bootstrap/bootstrap.css">
    <script src="http://localhost/include/js/bootstrap.min.js" charset="utf-8"></script>
    <script src="http://localhost/include/js/jquery-3.2.1.min.js" charset="utf-8"></script>
  </head>
  <body style="background: linear-gradient(to left, grey, silver);">
    <div class="jumbotron">
      <big>Add new Component</big>
      <small>&nbsp; |Add a new component to the database|</small><br> Click here to
      <a href="http://localhost/components/getcomponent.php">Search for Components</a>
    </div>
    <div class="container">
      <h2>Add Component</h2>
      <form class="def" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="form-group">
          <label for="Component">Component Name:</label>
          <input type="text" class="form-control" name="component" placeholder="Resistors / IC / Capacitors">
        </div>
        <div class="form-group">
          <label for="specification">Specification/Number:</label>
          <input type="text" class="form-control" name="specification" placeholder="LM358 / NE555">
        </div>
        <div class="form-group">
          <label for="desc">Description:</label>
          <textarea name="desc" class="form-control" rows="8" cols="80" placeholder="An 8 pin DIP IC. TTL logic family."></textarea>
        </div>
        <div class="form-group">
          <label for="qty">Quantity:</label>
          <input type="number" class="form-control" name="qty" value="0" min="1">
        </div>
        <div class="form-group">
          <label for="Rate">Rate:</label>
          <input type="number" class="form-control" name="rate" value="0" min="1">
        </div>
        <div class="form-group">
          <label for="ds">Datasheet:</label><br>
          <input type="file" class="btn" name="ds" value="">
        </div>
        <div class="form-group">
          <label for="submit">Submit / Reset:</label><br>
          <input type="submit" name="s" value="Go" class="btn btn-primary">
          <input type="reset" name="r" value="Reset" class="btn btn-default">
        </div>
      </form>
    </div>
    <div class="container">
      <?php
      if(isset($_REQUEST['s'])) {
        $comp = $_REQUEST['component'];
        $spec = $_REQUEST['specification'];
        $desc = $_REQUEST['desc'];
        $qty = $_REQUEST['qty'];
        $rate = $_REQUEST['rate'];

        $query  = "INSERT INTO components(`Component`, `Specification`, `Description`, `Qty`, `Rate`) VALUES('$comp', '$spec',";
        $query .= "'$desc', '$qty', '$rate') ";

        if($conn->query($query) === TRUE) {
          echo "ye";
        } else {
          echo $conn->error;
        }
      }
      ?>

    </div>
    <div class="jumbotron">
      <h2>Footer</h2>
    </div>
  </body>
</html>
