<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Administrators - Administrator Portal</title>
    <link rel="stylesheet" href="{{ asset("template-gui/css/bootstrap.css") }}">
    <link rel="stylesheet" href="{{ asset("template-gui/css/style.css") }}">
  </head>
  <body>
   
    @include('components.navbar')

    <main>

      <div class="list-form py-5">
         <div class="container">
            <h6 class="mb-3">List Admin Users</h6>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Username</th>
                        <th>Created at</th>
                        <th>Last login</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach ($admins as $item)
                  <tr>
                        <td>{{ $item->username }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td>{{ $item->last_login_at ?? '-' }}</td>
                      </tr>
                      @endforeach
                  {{-- <tr>
                      <td>admin1</td>
                      <td>2024-04-05 20:55:40</td>
                      <td>2024-04-05 20:55:40</td>
                  </tr>
                  <tr>
                      <td>admin2</td>
                      <td>2024-04-13 20:55:40</td>
                      <td>2024-04-28 20:55:40</td>
                  </tr> --}}
                </tbody>
            </table>

         </div>
      </div>
      
    </main>
   

    <script src="{{ asset("template-gui/js/bootstrap.js") }}"></script>
    <script src="{{ asset("template-gui/js/popper.js") }}"></script>
  </body>
</html>