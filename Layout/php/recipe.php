<html>
    <head>
        <title>Information Gathered</title>
    </head>

    <body>
      <?php
      require_once "vendor/autoload.php";
      $recipeId = $_POST['ID'];

      $recipeSteps = getRecipeSteps($recipeId);
//	var_dump($recipeSteps);
//      echo gettype($recipeSteps);

      foreach($recipeSteps as $recipe){
        $steps = $recipe->steps;
	foreach ($steps as $step){
		echo "Step Number: " . $step->number . "<br>";
		echo "Step: " .$step->step . "<br><br>";
      	}
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
