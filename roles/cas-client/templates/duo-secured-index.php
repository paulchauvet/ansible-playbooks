<!DOCTYPE html>
<html lang="en">
  <head>
    <title>CAS Duo MFA test page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  </head>
  <body>
    <div class="container">
      <h1>CAS Duo MFA test page</h1>
      <h2>Attributes Returned by CAS</h2>
      <?php
        echo "<pre>";

        if (array_key_exists('REMOTE_USER', $_SERVER)) {
            echo "REMOTE_USER = " . $_SERVER['REMOTE_USER'] . "<br>";
        }

        $headers = getallheaders();
        foreach ($headers as $key => $value) {
            if (strpos($key, 'Cas-') === 0) {
                echo substr($key, 4) . " = " . $value . "<br>";
            }
        }

        echo "</pre>";
      ?>
    </div>
  </body>
</html>