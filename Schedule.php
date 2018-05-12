 <?php

session_start();
if(isset($_SESSION["logged"]) && isset($_SESSION["type"]) && $_SESSION["type"]=="admin"){
 header("location: cms_menu.php");
}

else 
    header("location: LoginIndex.php");

?>



 </!DOCTYPE html>
<html>
<head>
  <title>Schedule</title>
<style>
  <?php include 'style.css'; ?>
  </style>
<style type="text/css">

* {box-sizing: border-box;}
  ul {list-style-type: none;}
body {font-family: Verdana, sans-serif;}

</style>
</head> 
<body>

<a id="logout" href="logout.php">
    Log out
  </a>

  <div>
    <a href="WelcomePage.php">
      <img id="log" src="images/Logo.png" alt="logo" >
    </a>  
    <h1 id="lo">HPIMS</h1>
  </div>

  <div id="body">
  </div>

  <ul id="navbar"><b>
      <li id="topmenu"><a id="topmenu"  href="Doctors.php">Doctors</a></li>
      <li id="topmenu"><a id="topmenu" href="Patients.php">Patients</a></li>
    <li id="topmenu"><a id="topmenu" href="Operations.php">Operations</a></li>
      <li id="topmenu"><a id="topmenu" class="active" href="Schedule.php">Schedule</a></li></b>
  </ul>

<div class="whole2">
 <div class="month">      
  <ul>
    <li class="prev">&#10094;</li>
    <li class="next">&#10095;</li>
    <li>
      April<br>
      <span style="font-size:18px">2018</span>
    </li>
  </ul>
  </div>
<ul class="weekdays">
  <li>Su</li>
  <li>Mo</li>
  <li>Tu</li>
  <li>We</li>
  <li>Th</li>
  <li>Fr</li>
  <li>Sa</li>
</ul>

<ul class="days">  
  <li>1</li>
  <li>2</li>
  <li>3</li>
  <li>4</li>
  <li>5</li>
  <li>6</li>
  <li>7</li>
  <li>8</li>
  <li>9</li>
  <li>10</span></li>
  <li>11</li>
  <li>12</li>
  <li>13</li>
  <li>14</li>
  <li>15</li>
  <li>16</li>
  <li>17</li>
  <li>18</li>
  <li>19</li>
  <li>20</li>
  <li>21</li>
  <li>22</li>
  <li>23</li>
  <li>24</li>
  <li>25</li>
  <li>26</li>
  <li>27</li>
  <li>28</li>
  <li><span class="active">29</span></li>
  <li>30</li>
</ul>
</div>
</body>
</html>