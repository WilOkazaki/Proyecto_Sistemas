<?php

$db_name = 'mysql:host=localhost;dbname=contact';
$user_name = 'root';
$user_password = '';

$conn = new PDO($db_name, $user_name, $user_password);

if(isset($_POST['send'])){

   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $number = $_POST['number'];
   $number = filter_var($number, FILTER_SANITIZE_STRING);
   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $courses = $_POST['courses'];
   $courses = filter_var($courses, FILTER_SANITIZE_STRING);
   $gender = $_POST['gender'];
   $gender = filter_var($gender, FILTER_SANITIZE_STRING);

   $select_contact = $conn->prepare("SELECT * FROM `contact_form` WHERE name = ? AND number = ? AND email = ? AND courses = ? AND gender = ?");
   $select_contact->execute([$name, $number, $email, $courses, $gender]);

   if($select_contact->rowCount() > 0){
      $message[] = 'already sent message!';
   }else{
      $insert_message = $conn->prepare("INSERT INTO `contact_form`(name, number, email, courses, gender) VALUES(?,?,?,?,?)");
      $insert_message->execute([$name, $number, $email, $courses, $gender]);
      $message[] = 'message sent successfully!';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Educacion Online</title>

  
   <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<!-- header seccion inicio  -->

<header class="header">

   <section class="flex">

      <a href="#home" class="logo">EducaOnline</a>

      <nav class="navbar">
         <a href="#home">inicio</a>
         <a href="#about">acerca de nosotros</a>
         <a href="#courses">cursos</a>
         <a href="#teachers">profesores</a>
         <a href="#reviews">comentarios</a>
         <a href="#contact">contacto</a>
      </nav>

      <div id="menu-btn" class="fas fa-bars"></div>

   </section>

</header>

<!-- header seccion fin -->

<!-- inicio seccion inicio  -->

<section class="home" id="home">

   <div class="row">

      <div class="content">
         <h3>Educación <span>en Linea</span></h3>
         <a href="#contact" class="btn">contactanos</a>
      </div>

      <div class="image">
         <img src="images/meeting.png" alt="">
      </div>

   </div>

</section>

<!-- inicio seccion fin -->

<!-- info seccion inicio  -->

<section class="count">

   <div class="box-container">

      <div class="box">
         <i class="fas fa-graduation-cap"></i>
         <div class="content">
            <h3>100+</h3>
            <p>cursos</p>
         </div>
      </div>

      <div class="box">
         <i class="fas fa-chalkboard-user"></i>
         <div class="content">
            <h3>10+</h3>
            <p>profesores</p>
         </div>
      </div>

      <div class="box">
         <i class="fas fa-user-graduate"></i>
         <div class="content">
            <h3>200+</h3>
            <p>estudiantes</p>
         </div>
      </div>

      <div class="box">
         <i class="fas fa-face-smile"></i>
         <div class="content">
            <h3>100%</h3>
            <p>servicio de calidad</p>
         </div>
      </div>

   </div>

</section>

<!-- info seccion fin -->

<!-- acerca de nosotros seccion inicio  -->

<section class="about" id="about">

   <div class="row">

      <div class="image">
         <img src="images/group.png" alt="">
      </div>

      <div class="content">
         <h3>¿por qué elegirnos?</h3>
         <p>Puedes acceder al contenido 24 horas y 7 días a la semana, en cualquier lugar y momento, te ofrecemos contenido de calidad y resolucion de dudas.</p>
         <a href="#contact" class="btn">contactanos</a>
      </div>

   </div>

</section>

<!-- acerca de nosotros seccion fin -->

<!-- cursos seccion inicio  -->

<section class="courses" id="courses">

   <h1 class="heading">nuestros  <span>cursos</span></h1>

   <div class="swiper course-slider">

      <div class="swiper-wrapper">

         <div class="swiper-slide slide">
            <img src="images/coding (1).png" alt="">
            <h3>desarrollador web</h3>
            <p>Todo sobre base de datos, back end y front end</p>
         </div>

         <div class="swiper-slide slide">
            <img src="images/social-media.png" alt="">
            <h3>marketing digital</h3>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Similique, repellat!</p>
         </div>

         <div class="swiper-slide slide">
            <img src="images/bacteria.png" alt="">
            <h3>biología</h3>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Similique, repellat!</p>
         </div>

         <div class="swiper-slide slide">
            <img src="images/chalkboard.png" alt="">
            <h3>matemáticas</h3>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Similique, repellat!</p>
         </div>

         <div class="swiper-slide slide">
            <img src="images/relatividad.png" alt="">
            <h3>fisica</h3>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Similique, repellat!</p>
         </div>

         <div class="swiper-slide slide">
            <img src="images/quimica.png" alt="">
            <h3>quimica</h3>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Similique, repellat!</p>
         </div>

      </div>

      <div class="swiper-pagination"></div>

   </div>

</section>

<!-- cursos seccion final -->

<!-- profesores seccion inicio  -->

<section class="teachers" id="teachers">

   <h1 class="heading">tutores <span>expertos</span></h1>

   <div class="swiper teachers-slider">

      <div class="swiper-wrapper">

         <div class="swiper-slide slide">
            <img src="images/jhs.jpg" alt="">
            <div class="share">
               <a href="#" class="fab fa-facebook-f"></a>
               <a href="#" class="fab fa-twitter"></a>
               <a href="#" class="fab fa-instagram"></a>
               <a href="#" class="fab fa-linkedin"></a>
            </div>
            <h3>Viviana Hernández</h3>
         </div>
         
         <div class="swiper-slide slide">
            <img src="images/photo_2021-10-16_07-47-07.jpg" alt="">
            <div class="share">
               <a href="#" class="fab fa-facebook-f"></a>
               <a href="#" class="fab fa-twitter"></a>
               <a href="#" class="fab fa-instagram"></a>
               <a href="#" class="fab fa-linkedin"></a>
            </div>
            <h3>Felipe Daza</h3>
         </div>

         <div class="swiper-slide slide">
            <img src="images/photo_2022-05-12_11-15-47.jpg" alt="">
            <div class="share">
               <a href="#" class="fab fa-facebook-f"></a>
               <a href="#" class="fab fa-twitter"></a>
               <a href="#" class="fab fa-instagram"></a>
               <a href="#" class="fab fa-linkedin"></a>
            </div>
            <h3>Carmen Castellanos</h3>
         </div>

         <div class="swiper-slide slide">
            <img src="images/photo_2021-04-09_02-54-57.jpg" alt="">
            <div class="share">
               <a href="#" class="fab fa-facebook-f"></a>
               <a href="#" class="fab fa-twitter"></a>
               <a href="#" class="fab fa-instagram"></a>
               <a href="#" class="fab fa-linkedin"></a>
            </div>
            <h3>Wilmer Villarreal</h3>
         </div>

         <div class="swiper-slide slide">
            <img src="images/27458881_10215532956061319_8155083391891781842_n.jpg" alt="">
            <div class="share">
               <a href="#" class="fab fa-facebook-f"></a>
               <a href="#" class="fab fa-twitter"></a>
               <a href="#" class="fab fa-instagram"></a>
               <a href="#" class="fab fa-linkedin"></a>
            </div>
            <h3>Jhan Castillo</h3>
         </div>

         <div class="swiper-slide slide">
            <img src="images/reqn.jpg" alt="">
            <div class="share">
               <a href="#" class="fab fa-facebook-f"></a>
               <a href="#" class="fab fa-twitter"></a>
               <a href="#" class="fab fa-instagram"></a>
               <a href="#" class="fab fa-linkedin"></a>
            </div>
            <h3>Alexis Bolatre</h3>
         </div>

      </div>

      <div class="swiper-pagination"></div>

   </div>

</section>

<!-- profesores seccion final -->

<!-- reseñas seccion inicio  -->

<section class="reviews" id="reviews">

   <h1 class="heading"> estudiantes <span>reseñas</span></h1>

   <div class="swiper reviews-slider">

      <div class="swiper-wrapper">

         <div class="swiper-slide slide">
            <p> Profesores son muy experimentados y la clase es muy activa. He mejorado mi estudios en todos los diversos aspectos. muchas gracias y recomendado</p>
            <div class="user">
               <img src="images/27458881_10215532956061319_8155083391891781842_n.jpg" alt="">
               <div class="user-info">
                  <h3>Alfredo Rivas</h3>
                  <div class="stars">
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star-half-alt"></i>
                  </div>
               </div>
            </div>
         </div>

         <div class="swiper-slide slide">
            <p>Profesores son muy experimentados y la clase es muy activa. He mejorado mi estudios en todos los diversos aspectos. muchas gracias y recomendado</p>
            <div class="user">
               <img src="images/photo_2021-04-09_02-54-57.jpg" alt="">
               <div class="user-info">
                  <h3>Wilmer A.</h3>
                  <div class="stars">
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star-half-alt"></i>
                  </div>
               </div>
            </div>
         </div>

         <div class="swiper-slide slide">
            <p>Profesores son muy experimentados y la clase es muy activa. He mejorado mi estudios en todos los diversos aspectos. muchas gracias y recomendado</p>
            <div class="user">
               <img src="images/photo_2022-05-12_11-15-47.jpg" alt="">
               <div class="user-info">
                  <h3>Villa W.</h3>
                  <div class="stars">
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star-half-alt"></i>
                  </div>
               </div>
            </div>
         </div>

         <div class="swiper-slide slide">
            <p>Profesores son muy experimentados y la clase es muy activa. He mejorado mi estudios en todos los diversos aspectos. muchas gracias y recomendado</p>
            <div class="user">
               <img src="images/reqn.jpg" alt="">
               <div class="user-info">
                  <h3>Rivas A.</h3>
                  <div class="stars">
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star-half-alt"></i>
                  </div>
               </div>
            </div>
         </div>

      </div>

      <div class="swiper-pagination"></div>

   </div>

</section>

<!-- reseñas seccion final -->

<!-- contacto seccion inicio  -->

<<section class="contact" id="contact">

<h1 class="heading"><span>formulario de </span> contacto</h1>

<div class="row">

   <div class="image">
      <img src="images/email.png" alt="">
   </div>

   <form action="" method="post">
      <span>tu nombre</span>
      <input type="text" required placeholder="ingresa tu nombre completo" maxlength="50" name="name" class="box">
      <span>tu numero</span>
      <input type="number" required placeholder="ingresa tu numero de teléfono" max="9999999999" min="0" name="number" class="box" onkeypress="if(this.value.length == 10) return false;">
      <span>tu email</span>
      <input type="email" required placeholder="ingresa tu email" maxlength="50" name="email" class="box">
      <span>seleccion curso</span>
      <select name="courses" class="box" required>
         <option value="" disabled selected>selecciona el curso --</option>
         <option value="web developement">desarrollador web</option>
         <option value="science and biology">ciencias biologicas</option>
         <option value="fisica">fisica</option>
         <option value="digital marketing">marketing digital</option>
         <option value="graphic design">diseñador gráfico</option>
         <option value="chemical">quimica</option>
         <option value="social studies">ciencias sociales</option>
         <option value="data analysis">estadistica</option>
         <option value="math">matemáticas</option>
      </select>
      <span>selecciona genero</span>
      <div class="radio">
         <input type="radio" name="gender" value="male" id="male">
         <label for="male">masculino</label>
         <input type="radio" name="gender" value="female" id="female">
         <label for="female">femenino</label>
      </div>
      <input type="submit" value="enviar mensaje" class="btn" name="send">
   </form>

</div>

</section>

<!-- contacto seccion final -->

<!-- footer seccion inicio  -->

<footer class="footer">

   <section>

      <div class="share">
         <a href="#" class="fab fa-facebook-f"></a>
         <a href="#" class="fab fa-twitter"></a>
         <a href="#" class="fab fa-instagram"></a>
         <a href="#" class="fab fa-youtube"></a>
      </div>

      <div class="credit">&copy; Proyecto de Sistemas <span>Wilmer A. Villarreal R.</span> | 18350430</div>

   </section>

</footer>

<!-- footer seccion final -->


<!-- swiper js link  -->
<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

<!-- archivo js link  -->
<script src="js/script.js"></script>

</body>
</html>