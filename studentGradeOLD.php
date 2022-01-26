<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Gradebook</title>
    <!-- Bootsrap and Bootsrap-Table CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.19.1/dist/bootstrap-table.min.css">


  </head>
  <body>
    <div class="container">
      <div class="col-md-12">
          <!-- Main Grade Table -->
          <table id="table" class="table table-striped" >
          </table>
      </div>
    </div>
  </body>
  <!-- Links to Bootstrap, Bootstrap table and jquery Core Packages-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://unpkg.com/bootstrap-table@1.19.1/dist/bootstrap-table.min.js"></script>

  <!-- Jquery script which pulls JSON echoed in gradeGrab.php and puts it in the bootstrap table -->
  <script type="text/javascript">
        var $table = $('#table');
            $table.bootstrapTable({
            url: 'courseTrow.php',
            columns: [{
              field: 'courseID',
              title: 'Course ID',
            },{
              field: 'courseName',
              title: 'Course Name',
            },{
              field: 'department',
              title: 'Department',
            },{
              field: 'roomNumber',
              title: 'Room Number',
            },{
              field: 'instructor',
              title: 'Instructor',
            },{
              field: 'meetingTimes',
              title: 'Meeting Times',
            },{
              field: 'description',
              title: 'Description',
            },{
              field: 'books',
              title: 'Books',
            }, ],
          });
  </script>
</html>
