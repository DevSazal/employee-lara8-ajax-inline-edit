

      <table class="table table-dark table-hover">
        <thead>
          <tr>
            <th>#</th>
            <th>Name(editable)</th>
            <th>Designation</th>
            <th>salary</th>
          </tr>
        </thead>
        <tbody>

          @forelse($employees AS $employee)
            <tr>
              <td>{{ $employee->id }}</td>
              <!-- <td>{{ $employee->name }}</td> -->
              <td id="empNameTD<?php echo $employee->id ?>" onclick="$('#empName<?php echo $employee->id ?>').show(); $('#empNameTD<?php echo $employee->id ?>').hide()" style="cursor: pointer">{{ $employee->name }}</td>
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
