<?php 
session_start();
if (isset($_SESSION["usuario"]) ) {

    header("location: /proj_appweb/front/login.html");
}