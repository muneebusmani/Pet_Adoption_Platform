<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <form action="" method="post">
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" class="form-control px-8">
        </div>
        
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" class="form-control px-8">
        </div>
        <input type="submit" value="submit" name="submit">
    </form>    
    <script>
        if (document.querySelector('body form')) {
          document.body.classList.add('contains-form');
        }
      </script>
</body>
</html>