<?php

// class Router{
//    private array $routes;
// //Un tableau associatif contenant les routes définies
//    public function __construct(){
//     $this->routes=require_once __DIR__ .'/../config/routes.php';
//    }


//    // function pour responsable de l'analyse de la requete, execution  e la methode  correspondant  dans le controleure 
//    public function dispatch(){
//     // recupere la methode http 
//     $method =$_SERVER['REQUEST_METHOD']; //identifier si la requete est un post ,get au autre
//     $uri= parse_url($_SERVER['REQUEST_URL'], PHP_URL_PATH );
//     //parse_url: Cette fonction analyse une URL et renvoie un tableau associatif contenant n’importe quelle des différents composants de l’URL qui sont présents
//     // analyse l'url

//     if (!isset($this->routes[$method])){
//         http_response_code(405);
//         echo "Methode non autorisee";
//         exit;
        
//     }
// // $path l'url de la route definie( EX /user/{id})
// //$callback le tableau contenant le controleur et la methode associee('UserController','show')
//  foreach($this->routes[$method] as $path => $callback){
//     // convertir une route dynamique comme /user/{id}

//     $pattern= preg_replace('/{([\w]+)}/' , '(?P<$1>[\w-]+)' , $path);
// //Utilise pour remplacer les paramètres de type par une expression régulière qui capte toute valeur ( pour alphanumérique et tiretpreg_replace{param}[\w-]+)
//     //  EX:/user/{id} devient ^/user/(?P<id>[\w-]+)$.
 


//     if(preg_match("#^$pattern$#" ,$uri,$matches)){
//        // preg_match si une correspondance est trouvee, il  retourne et  les  valeure capturees dans true ,$matches : Contiendra les paramètres extraits de l'URL 
//     $controllerName="App\\Controller\\".$callback[0];
//     //Construire le nom complet du contrôleur,vérifier s'il existe et, si oui, créer une instance de ce contrôleur.
//        if(!class_exists($controllerName)){
//         http_response_code(500);
//         echo "controleur introuvable";
//         exit;
//        }
//        $controller=new $controllerName();
//        $method= $callback[1];

//        return call_user_func_array([$controller,$method],array_filter($matches,'is_string', ARRAY_FILTER_USE_KEY));
//     }
// }

//      http_response_code(404);
//      echo "Page introuvable.";

//    }





}





class Router {
   private array $routes;

   public function __construct() {
       $this->routes = require_once __DIR__ . '/../config/routes.php';
       Session::start(); // Démarrage des sessions dès l'initialisation du routeur
   }

   public function dispatch() {
       $method = $_SERVER['REQUEST_METHOD'];
       $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

       if (!isset($this->routes[$method])) {
           http_response_code(405);
           echo "Methode non autorisee";
           exit;
       }

       foreach ($this->routes[$method] as $path => $callback) {
           $pattern = preg_replace('/{([\w]+)}/', '(?P<$1>[\w-]+)', $path);

           if (preg_match("#^$pattern$#", $uri, $matches)) {
               $controllerName = "App\\Controller\\" . $callback[0];
               if (!class_exists($controllerName)) {
                   http_response_code(500);
                   echo "controleur introuvable";
                   exit;
               }

               $controller = new $controllerName();
               $method = $callback[1];

               // Utilisation du Validator et du Security avant d'appeler la méthode du contrôleur
               $this->validateRequest($matches);
               $this->secureRequest();

               return call_user_func_array([$controller, $method], array_filter($matches, 'is_string', ARRAY_FILTER_USE_KEY));
           }
       }

       http_response_code(404);
       echo "Page introuvable.";
   }

   private function validateRequest($data) {
       foreach ($data as $key => $value) {
           if (!Validator::validateString($value)) {
               http_response_code(400);
               echo "Données invalides : $key";
               exit;
           }
       }
   }

   private function secureRequest() {
       if ($_SERVER['REQUEST_METHOD'] === 'POST') {
           $csrfToken = $_POST['csrf_token'] ?? '';
           if (!Security::verifyCsrfToken($csrfToken)) {
               http_response_code(403);
               echo "Jeton CSRF invalide";
               exit;
           }
       }
   }
}

?>


