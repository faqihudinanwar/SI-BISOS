<?php
  $file = 'uploads/file/santunan.pdf';
  $filename = 'tmp_bedahrumah.pdf';
  header('Content-type: application/pdf');
  header('Content-Disposition: inline; filename="' . $filename . '"');
  header('Content-Transfer-Encoding: binary');
  header('Accept-Ranges: bytes');
  @readfile($file);
?>