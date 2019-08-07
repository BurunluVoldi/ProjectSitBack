<nav class="navbar navbar-expand-lg bg-warning navbar-light">
    <div class="container-fluid">
        <a href="homepage.php" class="navbar-brand" title="Home Page">
        <button id="homepagebutton" class="btn btn-warning" type="button">
            <img src="homepage.png" alt="logo" style="width:75px; height:75px;">
            </button>
        </a>
        <style>
            strong {
                font-size: 18px;
            }
        </style>
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="mydata.php" title="edit or display your data"><button class="btn btn-warning"><strong>My Data</strong></button></a>             
            </li>
            <li class="nav-item">
                <a class="nav-link" title="Edit or Display your notebook" href="mynotebook.php"><button class="btn btn-warning"><strong>My Notebook</strong></button></a>             
            </li>
            <li class="nav-item">
                <a class="nav-link" title="download your file up to this time" href="download.php"><button class="btn btn-warning"><strong>Download</strong></button></a> 
            </li>
        </ul>
        
        <ul class="navbar-nav navbar-right nav">
            <li>
            <a href="logout.php" title="Log Out"><button type="button" id="logoutbtn" class="btn btn-warning"><img src="logout.png" style="width:75px; height:75px;"></button></a>
            </li>
        </ul>
    </div>
</nav>