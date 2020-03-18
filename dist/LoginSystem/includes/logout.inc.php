<?php

session_start();
session_unset(); //delete all the session values that we had created before
session_destroy();
header("Location: ../../index.php");
