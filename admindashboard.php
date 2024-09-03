


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="docc.css">

    


    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
</head>
<style>
  @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');

*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Poppins", sans-serif
}
#navbar{
    position: sticky;
    top: 0;
    left: 0;
    z-index: 100;
    padding: .5rem 5rem;
    box-shadow: 5px 5px 20px black;
    background-color:black;
    
    
}





#navbarSupportedContent a{
    color: royalblue;
    border-bottom: 2px solid transparent;
    font-size: 25px;
    font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
    margin-right: 100px;
    
}
#navbarSupportedContent a:hover{
    border-bottom: 2px solid pink;
    color: white;

}


section{
    width: 100%;
    min-height: 100vh;
   
}
#home{
    background: url(student.jpg);
    background-size: cover;
    background-position: center;
    flex-direction: column;
    
}






.logo{
    width: 80px;
    height: 80px;
    
    animation-name: log;
    animation-delay: 2s;
    animation-iteration-count: infinite;
    animation-duration: 5s;
}
@keyframes log{
    0%{
        transform: rotate(360deg);
    }
}

</style>
<body>
  
<nav class="navbar navbar-expand-lg navbar-dark"id="navbar">
  <div class="container-fluid">
   
    <a class="navbar-brand" href="#"><img  class="logo"src="logo.webp"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"  aria-expanded="false" >
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mx-auto">
       <li class="nav-item">
          <a class="nav-link" href="#">HOME</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="admin.php">STUDENT FORM</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="adminshow.php">VIEW</a>
        </li>
       
      






      </ul>
     
     
</div>
  
</nav>
<body>
<section id="home">
    
   




</section> 
    
</body>
</html>