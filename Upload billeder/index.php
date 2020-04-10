<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Upload billeder</title>
  </head>
  <body>
      <form action="upload.php" method="post" enctype="multipart/form-data">
        <input type="text" name="navn" placeholder="Navn">
        <input type="file" name="file" value="">
        <button type="submit" name="submit">Upload </button>
      </form>
  </body>
</html>
