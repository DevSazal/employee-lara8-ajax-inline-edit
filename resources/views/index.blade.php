<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <title>Bootstrap 4 Example</title>

    <style>
            .w-5{
              display: none!important;
            }
            p.text-sm.text-gray-700.leading-5 {
                margin-top: 1rem;
            }
    </style>

  </head>
  <body>

    <div class="container">
      <h1>Employees</h1>
      <p>You may change data from here.</p>

      <table class="table table-dark table-hover">
        <thead>
          <tr>
            <th>#</th>
            <th>Name</th>
            <th>Designation</th>
            <th>salary</th>
          </tr>
        </thead>
        <tbody>

          @forelse($employees AS $employee)
            <tr>
              <td>{{ $employee->id }}</td>
              <!-- <td>{{ $employee->name }}</td> -->
              <td id="empNameTD<?php echo $employee->id ?>" onclick="$('#empName<?php echo $employee->id ?>').show(); $('#empNameTD<?php echo $employee->id ?>').hide()">{{ $employee->name }}</td>
              <td id="empName<?php echo $employee->id ?>" style="display:none">
                <input type="text" name="name" id="name{{ $employee->id }}" value="{{ $employee->name }}" onchange="nameAction({{ $employee->id }})" >
              </td>
              <td>{{ $employee->designation->title }}</td>
              <td><input type="number" name="salary" id="salary{{ $employee->id }}" value="{{ $employee->salary }}" onchange="salaryAction({{ $employee->id }})"></td>
            </tr>
          @empty
            <p>No Data Found!</p>
          @endforelse

        </tbody>
      </table>

      {{ $employees->links() }}

      <script type="text/javascript">
      var x =
        [
          @forEach($employees AS $employeeX)
          '{{ $employeeX->id }}',
          @endforeach
        ];
      </script>

      <br><button type="button" class="btn btn-warning" onclick="updateAction(x)">Update All</button>

    </div>

    <script type="text/javascript">
    function salaryAction(eid) {
        //alert("test");
        // console.log(eid);
        var pick = document.getElementById('salary'+eid).value;
        console.log(pick);
        $.ajax({
                 type: 'POST',
                 url: "{{ route('update.salary') }}",
                 data:{
                  salary:pick,
                  id: eid,
                  _token: '<?php echo csrf_token() ?>'
                 },
                 success:function(data) {
                    // $("#salary").html(data.msg);
                    // alert("salary updated");
                 }
        });
    }

    function nameAction(eid) {
        //alert("test");
        // console.log(eid);
        var pick = document.getElementById('name'+eid).value;
        console.log(pick);
        $.ajax({
                 type: 'POST',
                 url: "{{ route('update.name') }}",
                 data:{
                  name:pick,
                  id: eid,
                  _token: '<?php echo csrf_token() ?>'
                 },
                 success:function(data) {
                    // $("#salary").html(data.msg);
                    // alert("name updated");
                    document.getElementById('empNameTD'+eid).value = pick;
                    $('#empName'+eid).hide();
                    $('#empNameTD'+eid).show();

                 }
        });
    }

    function updateAction(params) {
        //alert("test");
        console.log(params);
        // var pick = document.getElementById('salary'+eid).value;
        var salary = [];
        var name = [];
        for (i=0; i<params.length; i++) {
          salary[i] = document.getElementById('salary'+params[i]).value;
          name[i] = document.getElementById('name'+params[i]).value;
          // alert(params[i]);
        }
        console.log(salary);
        // console.log(pick);
        $.ajax({
                 type: 'POST',
                 url: "{{ route('update.all') }}",
                 data:{
                  employees:params,
                  salaries: salary,
                  names: name,
                  _token: '<?php echo csrf_token() ?>'
                 },
                 success:function(data) {
                    // $("#salary").html(data.msg);
                    alert("all salaries updated");
                 }
        });
    }

    </script>

  </body>
</html>
