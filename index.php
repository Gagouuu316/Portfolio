<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $nom = htmlspecialchars(trim($_POST["nom"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $message = htmlspecialchars(trim($_POST["message"]));

    // Validation
    if (empty($nom) || empty($email) || empty($message)) {
        echo "Veuillez remplir tous les champs.";
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Adresse email invalide.";
        exit;
    }

    // Contenu de l'email
    $to = "gaellepoisson.95@gmail.com"; 
    $subject = "Nouveau message de $nom via le formulaire";
    $body = "Nom: $nom\nEmail: $email\n\nMessage:\n$message";
    $headers = "From: $email\r\nReply-To: $email";

    // Envoi de l'email
    if (mail($to, $subject, $body, $headers)) {
        echo "Message envoyé avec succès.";
    } else {
        echo "Erreur lors de l'envoi. Veuillez réessayer plus tard.";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>POISSON Gaëlle</title>
  
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          fontFamily: {
            'sans': ['Roboto', 'sans-serif'],
            'montserrat': ['Montserrat', 'sans-serif'],
          },
          letterSpacing: {
            'widest-05': '0.05em',
          },
          colors: {
            'primary-green': '#22c55e',
            'bg-light': '#f9fafb',
            'text-dark': '#1f2937',
          }
        }
      }
    }
  </script>
  
  <script>
    function toggleMenu() {
      document.getElementById("nav-menu").classList.toggle("hidden");
    }
  </script>
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>

<body class="bg-bg-light text-text-dark font-sans">
  <header class="bg-white shadow sticky top-0 z-50">
    <div class="container mx-auto flex justify-between md:flex-row items-center px-4 sm:px-6 md:px-8 py-5">
      
      <h1 class="text-4xl text-primary-green select-none"><a href="./index.php">GP</a></h1>
      
      <div>
        <button onclick="toggleMenu()" class="text-primary-green text-3xl md:hidden">☰</button>
      </div>
      <nav id="nav-menu" class="hidden md:flex flex-col md:flex-row gap-4 text-lg font-medium">
        <ul class="flex flex-col md:flex-row gap-4">
          <li><a href="#cv" class="bg-primary-green text-white px-4 py-2 rounded-full font-semibold no-underline transition duration-300 hover:bg-yellow-400">CV</a></li>
          <li><a href="#projets" class="bg-primary-green text-white px-4 py-2 rounded-full font-semibold no-underline transition duration-300 hover:bg-yellow-400">Projets</a></li>
          <li><a href="#contact" class="bg-primary-green text-white px-4 py-2 rounded-full font-semibold no-underline transition duration-300 hover:bg-yellow-400">Contact</a></li>
        </ul>
      </nav>
    </div>
  </header>

  <main class="container mx-auto px-4 sm:px-6 md:px-12 py-12 space-y-24 max-w-5xl">
    <section class="grid grid-cols-1 md:grid-cols-2 gap-16 items-center">
      <div>
        <h2 class="text-3xl sm:text-4xl md:text-5xl mb-6 select-none  hover:text-green-800 dark:hover:text-green-800"><--Bonjour, je suis Gaëlle Poisson /></h2>
        <p class="text-lg leading-relaxed max-w-xl">
          Actuellement en deuxième année de BUT MMI. Je suis à la recherche d'un stage de 10 semaines dans le développement web. A partir du 13 avril 2026.
          En parallèle, je travaille en tant qu’animatrice dans la commune de Louvres.
        </p>
      </div>
      <div>
        <img src="media/portrait.jpg" alt="Mon portrait" class="transition duration-300 rounded-xl shadow-xl hover:scale-105 border-primary-green max-w-xs sm:max-w-sm md:max-w-md mx-auto object-cover hover:shadow-xl hover:shadow-yellow-500/50" />
      </div>
    </section>
<section id="cv">
  <h2 class="text-2xl sm:text-3xl mb-10 select-none border-b-4 border-pink-500 inline-block pb-2">Mon CV</h2>

  <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
    
    <div class="bg-white rounded-xl shadow-md p-6 transition duration-300 hover:transform hover:-translate-y-2 hover:shadow-xl hover:shadow-yellow-500/50">
      <h3 class="text-xl font-semibold mb-4 text-primary-green">Formations</h3>
      <ul class="list-disc list-inside space-y-3 text-gray-700 text-sm sm:text-base">
        <li><strong>Depuis 2024</strong> IUT CYU Cergy, Site Sarcelles (95) – Deuxième année BUT MMI</li>
        <li><strong>2024</strong> Diplôme du Baccalauréat</li>
        <li><strong>2024</strong> BAFA (Brevet d’Aptitude aux Fonctions d’Animateur)</li>
        <li><strong>2021</strong> Certification PSC1 à l’institut Paul Ricoeur</li>
      </ul>
    </div>

    <div class="bg-white rounded-xl shadow-md p-6 transition duration-300 hover:transform hover:-translate-y-2 hover:shadow-xl hover:shadow-yellow-500/50">
      <h3 class="text-xl font-semibold mb-4 text-primary-green">Expériences</h3>
      <ul class="list-disc list-inside space-y-3 text-gray-700 text-sm sm:text-base">
         <li><strong>Depuis septembre 2024</strong> Animatrice vacataire, ville de Louvres (95)</li>
          <li><strong>2022</strong> Stage d'observation développement durable, mairie de Nîmes (30)</li>
      </ul>
    </div>

    <div class="bg-white rounded-xl shadow-md p-6 transition duration-300 hover:transform hover:-translate-y-2 hover:shadow-xl hover:shadow-yellow-500/50 md:col-span-2">
        <h3 class="text-xl font-semibold mb-4 text-primary-green">Skills</h3>
        <ul class="grid grid-cols-2 sm:grid-cols-5 gap-5 text-center">
            <li>
                <img src="./media/html.png" class="w-12 h-12 mx-auto object-contain" alt="HTML">
            </li>
            <li>
                <img src="./media/css.png" class="w-12 h-12 mx-auto object-contain" alt="CSS">
            </li>
            <li>
                <img src="./media/python.png" class="w-12 h-12 mx-auto object-contain" alt="Python">
            </li>
            <li>
                <img src="./media/php.png" class="w-12 h-12 mx-auto object-contain" alt="PHP">
            </li>
            <li>
                <img src="./media/sql.png" class="w-12 h-12 mx-auto object-contain" alt="SQL">
            </li>
        </ul>
    </div>
  </div>

</section>
    <section id="projets">
      <h2 class="text-2xl sm:text-3xl mb-10 select-none border-b-4 border-pink-500 inline-block pb-2">Mes Projets</h2>
      
      <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
        <div class="bg-white rounded-xl shadow-md p-6 transition duration-300 hover:transform hover:-translate-y-2 hover:shadow-xl hover:shadow-yellow-500/50">
          <h3 class="text-xl font-semibold mb-3">Pastille vidéo Festival "les talents de l'iut"</h3>
          <p>Création de pastille vidéo pour la communication post-événement du festival sur les gagnants des prix du public.</p>
          <video class="projet-video w-full rounded-lg shadow-lg mt-4 max-h-[300px] sm:max-h-[400px]" controls>
            <source src="./media/POISSON_Pastille2.mp4" type="video/mp4" />
          </video>
        </div>
        <div class="bg-white rounded-xl shadow-md p-6 transition duration-300 hover:transform hover:-translate-y-2 hover:shadow-xl hover:shadow-yellow-500/50">
          <h3 class="text-xl font-semibold mb-3">Carte Visite</h3>
          <p>Création d'une carte de visite avec une palette de couleurs choisie et un métier que l'on pourrait faire plus tard.</p>
          <video class="projet-video w-full rounded-lg shadow-lg mt-4 max-h-[300px] sm:max-h-[400px]" controls>
            <source src="./media/CarteVisite_Bannière.mp4" type="video/mp4" />
          </video>
        </div>
        <div class="bg-white rounded-xl shadow-md p-6 transition duration-300 hover:transform hover:-translate-y-2 hover:shadow-xl hover:shadow-yellow-500/50">
          <h3 class="text-xl font-semibold mb-3">Visuels New Balance 9060</h3>
          <p>Création d'affiches pour une marque choisie en respectant sa charte.</p>
          <div class="flex flex-col sm:flex-row gap-4 mt-4">
            <img src="./media/PrintNB2.png" alt="affiche New Balance" class="w-full sm:w-1/2 object-cover rounded-lg transition duration-300 hover:scale-105 shadow-xl hover:shadow-xl hover:shadow-yellow-500/50" />
            <img src="./media/WebNB2.png" alt="affiche New Balance" class="w-full sm:w-1/2 object-cover rounded-lg transition duration-300 hover:scale-105 shadow-xl hover:shadow-xl hover:shadow-yellow-500/50" />
          </div>
        </div>
      </div>
    </section>
  </main>

<footer class="bg-primary-green border-t border-green-700 py-8 text-white">
    <div class="footer-container flex flex-col md:flex-row justify-between items-start gap-12 px-4 sm:px-6 md:px-8 max-w-5xl mx-auto">
      <div id="contact" class="footer-form flex-1 min-w-[280px] w-full">
        <h2 class="text-xl sm:text-2xl mb-4 text-white font-bold">Me contacter</h2>
        <form action="./index.php#contact" method="post" class="space-y-4">
          <input type="text" name="nom" placeholder="Nom" required class="w-full p-3 rounded-lg border border-gray-300 text-gray-800" />
          <input type="email" name="email" placeholder="Email" required class="w-full p-3 rounded-lg border border-gray-300 text-gray-800" />
          <textarea name="message" rows="4" placeholder="Votre message" required class="w-full p-3 rounded-lg border border-gray-300 text-gray-800 resize-y"></textarea>
          <button type="submit" class="bg-primary-green text-white py-3 px-6 rounded-lg inline-flex gap-2 font-semibold transition duration-300 hover:bg-yellow-400 w-full justify-center">Envoyer</button>
        </form>
      </div>
      
      <div class="footer-contact flex-1 min-w-[280px] w-full flex flex-col items-center text-center mt-8 md:mt-0">
        <h2 class="text-xl sm:text-2xl mb-4 text-white font-bold">Me suivre</h2>
        <div class="social-links flex gap-4 mb-3">
          <a href="https://github.com/Gagouuu316" target="_blank" rel="noopener"><img src="./media/github.png" alt="GitHub" class="w-8 h-8 rounded-full"></a>
          <a href="https://www.linkedin.com/in/gaëlle-poisson" target="_blank" rel="noopener"><img src="./media/linkedin.png" alt="LinkedIn" class="w-8 h-8 rounded-full"></a>
        </div>
        <div class="footer-rights text-sm sm:text-base text-white opacity-90">&copy; 2025 POISSON Gaëlle - All rights reserved</div>
      </div>
    </div>
  </footer>

</body>
</html>