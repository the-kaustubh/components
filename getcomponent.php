<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php include 'sqlcon.php'; ?>
    <title>Search Components</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php include 'linksAndScripts.php'; ?>
  </head>
  <body style="background: linear-gradient(to left, grey, silver);">
    <div class="jumbotron">
      <big>Get Component</big>
      <small>&nbsp; |Add a new component to the database|</small><br> Click here to
      <a href="<?php echo ROOT_DIR; ?>/addcomponent.php">Add new Components</a>
    </div>
    <div class="container">
      <form class="def" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="form-group">
          Search By:
          <select class="selcomp" name="selcomp" class="form-control" onchange="cl();">
            <option value="Component" class="form-control">Name</option>
            <option value="Specification" class="form-control">Specification</option>
            <option value="Description" class="form-control">Description</option>
            <option value="Qty" class="form-control">Quantity</option>
            <option value="Code" class="form-control">Code</option>
          </select>
        </div>
        <div class="form-group">
          <label for="Search">Search</label>
          <input type="text" class="form-control" name="key" placeholder="Search here...">
        </div>
        <div class="form-group">
          <input type="submit" class="btn btn-primary" name="submit" placeholder="Search">
        </div>
      </form>
    </div>
    <div class="panel">
      <?php
      if (isset($_REQUEST['submit'])) {
        $crit_name  = mysqli_real_escape_string($conn, $_REQUEST['selcomp']);
        $crit_value = mysqli_real_escape_string($conn, $_REQUEST['key']);
        // echo $crit_name.", ".$crit_value;
        $query = "SELECT * FROM components WHERE ".$crit_name."='".$crit_value."';";
        // echo $query;

        if($result = $conn->query($query)) {

          ?>
      <table class="table table-hover">
        <tr>
          <th>Sr.No</th>
          <th>Code</th>
          <th>Component</th>
          <th>Specification</th>
          <th>Description</th>
          <th>Qty</th>
          <th>Rate</th>
          <!-- <th>Datasheet</th>
          <th>Class</th>
          <th>Subclass</th>
          <th>Division</th>
          <th>Subdivision</th> -->
        </tr>
          <?php
          $i=0;
          while($row = $result->fetch_row()) {
            ?>
          <tr>
              <?php
            foreach ($row as $key => $value) {
              $i++;
              if($i==8) break;
              ?>
            <td><?php echo $value; ?></td>
              <?php
            }
            ?>
          </tr>
          <?php
          }
          ?>
      </table>
          <?php
        }
      }
       ?>
    </div>
  </body>
</html>
