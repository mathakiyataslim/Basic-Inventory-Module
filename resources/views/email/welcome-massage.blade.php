<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container-fluid">

    <!-- Welcome Section -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="p-4 bg-primary text-white rounded-4 shadow-sm">
                <h2 class="fw-bold mb-1">
                    Welcome, {{ $user->name }} 👋🎉
                </h2>
                <p>Your Email is {{$user->email}}</p>
                <p class="mb-0">
                  <p>Thank you for registering with us.</p>
                </p>
            </div>
        </div>
    </div>

   
</div>
</body>
</html>

