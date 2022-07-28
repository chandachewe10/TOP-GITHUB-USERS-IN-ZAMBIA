<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="GITHUB, Zambia, contributions,commits,github developers,zambia">
    <meta name="author" content="CHANDA CHEWE">

    <title>TOP GITHUB CONTRIBUTORS::ZAMBIA</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('dashboard_client/vendors/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

        <link rel="stylesheet" type="text/css" href="{{asset('assets/perfect-scrollbar/dist/css/perfect-scrollbar.min.css')}}">
<!--Fontawesome--> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<!--datatables-->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" >
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css" >

</head>

<body> 


    <center>
        <br>
        <img src="{{asset('assets/top_github_contributors.png')}}" width="200" height="100" style="margin-top:25px">
        <br><br>
        <h5 style="font-weight:bold">TOP 1000 GITHUB CONTRIBUTORS IN ZAMBIA</h5>

    
        
        
                <center>
                
               
<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%" >
    <thead>
        <tr>
        <th>No</th>
            <th>Avatar</th>
              
              <th>Contributions</th>
              <th>Name</th>
              <th>Type</th>
              <th>Country</th>
              <th>Updated about</th>
        </tr>
    </thead>
    <tbody>

        @foreach($retrive_all as $user_data)
        <tr>
        <td></td>
          <td><img src="{{$user_data->avatar}}" width="100" height="100"></td>
          <td>{{$user_data->contributions}}</td>
          <td>{{$user_data->name}}</td>
          
          <td>{{$user_data->type}}</td>
          <td>{{$user_data->country}}</td>
          <td>{{$user_data->updated_at}}</td>
          
          
          
          
        </tr>
        @endforeach
    
    </tbody>
</table>

<br><br>

<!--Bootstrap and Jquery--> 
<script src="{{asset('assets/js/jquery-3.1.0.min.js')}}"></script>
  <script src="{{asset('assets/js/popper.min.js')}}"></script>
  <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
   <script src="{{asset('assets/js/perfect-scrollbar.jquery.min.js')}}"></script>
    <script src="{{asset('assets/js/hoverable-collapse.js')}}"></script>
  


<!-- DataTables JavaScript -->
<script src="{{asset('assets/js/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('assets/js/dataTables.bootstrap4.min.js')}}"></script>
  <script src="{{asset('assets/js/dataTables.responsive.js')}}"></script>
  <script>
      $(document).ready(function() {
        var t = $('#example').DataTable({
            responsive: true,
            
            
           
        });
        t.on('order.dt search.dt', function () {
        let i = 1;
 
        t.cells(null, 0, { search: 'applied', order: 'applied' }).every(function (cell) {
            this.data(i++);
        });
    }).draw();

      });


  </script>
</body>
</html>


