
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.19.1/dist/bootstrap-table.min.css">


  </head>

          <table id="table" class="table table-striped" >
          </table>

  <!-- Links to Bootstrap, Bootstrap table and jquery Core Packages-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://unpkg.com/bootstrap-table@1.19.1/dist/bootstrap-table.min.js"></script>

  <!-- Jquery script which pulls JSON echoed in gradeGrab.php and puts it in the bootstrap table -->
  <script type="text/javascript">
        var $table = $('#table');
            $table.bootstrapTable({
            url: 'insGrab.php',
            columns: [{
              field: 'courseName',
              title: 'Course Name',
            },{
              field: 'assignName',
              itle: 'Assignment Name',
            },{
              field: 'userName',
              title: 'Username',
            },{
              field: 'assignType',
              title: 'AssignmentType',
            },{
              field: 'grade',
              title: 'Grade',
            }, ],
          });
  </script>
</html>
