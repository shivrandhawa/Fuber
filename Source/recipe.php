<html>
    <head>
        <title>Information Gathered</title>
        <link rel="stylesheet" href="css/desktop.css">
        <link rel="stylesheet" href="css/mobile.css">
        <link rel="stylesheet" href="css/media.css">
    </head>

    <body>
      <?php
  include("Spoonacular.php");
  require_once "vendor/autoload.php";
  $mash_key    = "XwoI3C2l7bmshg0FQlKrUB5tchLEp19b8lNjsnAQ0UtV4uFumg";
  $spoonacular = new Spoonacular($mash_key);
  $recipeId    = $_POST['ID'];

  $recipeSteps = $spoonacular->getRecipeSteps($recipeId);
  $recipe_info = $spoonacular->getRecipeInfo($recipeId);

  echo '<img src="' . $recipe_info->image . '"><br>';
  echo "Prep time: " . $recipe_info->preparationMinutes . " minutes<br>";
  echo "Cook time: " . $recipe_info->cookingMinutes . " minutes<br>";
  echo "<br>Ingredient List:<br>";

  $ingredients = $recipe_info->extendedIngredients;
  foreach($ingredients as $ingredient){
    echo $ingredient->amount . " " . $ingredient->unit . " " . $ingredient->name . "<br>";
  }

  echo "<br>";

  foreach ($recipeSteps as $recipe) {
      $steps = $recipe->steps;
      foreach ($steps as $step) {
          echo "Step Number: " . $step->number . "<br>";
          echo "Step: " . $step->step . "<br><br>";
      }
  }
  ?>
</body>
</html>
