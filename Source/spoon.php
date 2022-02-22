<html>
    <head>
        <title>Recipes</title>
        <link rel="stylesheet" href="css/desktop.css">
        <link rel="stylesheet" href="css/mobile.css">
        <link rel="stylesheet" href="css/media.css">

    </head>

    <body>

        <?php

					include("Spoonacular.php");
        	require_once "vendor/autoload.php";
					/*Instantiates variable $recipe as an array.
						Array $recipes contain 7 variables
						1) id
						2) title
						3) image
						4) imageType
						5) usedIngredientCount
						6) missedIngredientCount
						7) likes
					*/

					$mash_key = "XwoI3C2l7bmshg0FQlKrUB5tchLEp19b8lNjsnAQ0UtV4uFumg";
					$spoonacular = new Spoonacular($mash_key);
					$recipes = $spoonacular->getRecipeByIngredients($_POST);

        	foreach ($recipes as $recipe){
          	echo "id: " . $recipe->id . "<br>";
          	echo 'Recipe Name: ' . $recipe->title . '<br>';
          	echo '<img id="picture" src=' . $recipe->image . ' style="width:110px;height:110px;"><br>';
          	echo '<form action="recipe.php" method="post">';
	  				echo '<input type="hidden" name="ID" value="'.$recipe->id.'" >';
	  				echo '<input type="submit" value="Get Detailed Recipe Instructions"/>';
	  				echo '</form><br>';
        	}
        ?>
    </body>
</html>
