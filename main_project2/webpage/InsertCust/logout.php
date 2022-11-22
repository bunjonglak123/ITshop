<?php
	session_start();

    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );

	session_destroy(); // ทำลาย session

    echo "<script type='text/javascript'>alert('ออกสู่ระบบ');
    window.location.href='../index.html'</script>";

?>

