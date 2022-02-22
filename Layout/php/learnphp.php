<html>
    <head>
        <title>Information Gathered</title>
    </head>

    <body>

        <?php
        require_once "vendor/autoload.php";
        //require "src/SpoonacularAPIClient.php";
        //$xMashapeKey = "XwoI3C2l7bmshg0FQlKrUB5tchLEp19b8lNjsnAQ0UtV4uFumg";
        //$client = new SpoonacularAPIClient($xMashapeKey);


        $usersName = $_POST['username'];
        $streetAddress = $_POST['streetAddress'];
        $cityAddress = $_POST['cityAddress'];

        echo $usersName ."<br>";
        echo $streetAddress ."<br>";
        echo $cityAddress ."<br>";

        $recipes = getRecipeByIngredients($usersName, $streetAddress, $cityAddress);
	//$recipes = $recipes[0];
	//echo "The id is " . $recipes->id;
	//var_dump($recipes);
	//echo gettype($recipes);
	//print_r($recipes);
        foreach ($recipes as $recipe ){
          echo "id: " . $recipe->id . "<br>";
          echo "name: " . $recipe->title . "<br>";
          echo "<img src=" . $recipe->image . ' style="width:110px;height:110px;"><br>';
          echo '<form action="recipe.php" method="post">';
	  echo '<input type="hidden" name="ID" value="'.$recipe->id.'" >';
	  echo '<input type="submit" value="Get Detailed Recipe Instructions"/>';
	  echo '</form><br>';
        }

        function getRecipeByIngredients($iOne, $iTwo, $iThree){
          $response = Unirest\Request::get("https://spoonacular-recipe-food-nutrition-v1.p.mashape.com/recipes/findByIngredients?fillIngredients=false&ingredients='.$iOne.'%2C'.$iTwo.'%2C'.$iThree.'&limitLicense=false&number=5&ranking=1",
          array(
            "user-agent"    => "APIMATIC 2.0",
            "X-Mashape-Key" => "XwoI3C2l7bmshg0FQlKrUB5tchLEp19b8lNjsnAQ0UtV4uFumg",
            "Accept" => "application/json"
          )
        );
        //print_r($response->raw_body);
	$return = $response->body;
//	print_r($return);
    /*
	  $results = unserialize($return);
	  print_r($results);
    */
        return $return;
      }
      function getRecipeSteps($id){
        $response = Unirest\Request::get("https://spoonacular-recipe-food-nutrition-v1.p.mashape.com/recipes/".$id."/analyzedInstructions?stepBreakdown=true",
        array(
          "X-Mashape-Key" => "XwoI3C2l7bmshg0FQlKrUB5tchLEp19b8lNjsnAQ0UtV4uFumg",
          "Accept" => "application/json"
        )
      );

  return $response->body;
    }
        ?>


    </body>


</html>
