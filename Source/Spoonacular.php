<html>
<head>
  <?php
class Spoonacular
{
    var $mashable_key;
    function __construct($mashable_key)
    {
        $this->mashable_key = $mashable_key;
        require_once("vendor/autoload.php");
    }

    public function getRecipeByIngredients($ingredients)
    {
        $ingredientList = "";
        $delimeter      = '%2C';
        $counter        = 0;
        $len            = count($ingredients);
        foreach ($ingredients as $list) {
            if ($counter == $len - 1) {
                $ingredientList = $ingredientList . $list;
                break;
            }
            $ingredientList = $ingredientList . $list . $delimeter;
            $counter++;
        }

        $response = Unirest\Request::get("https://spoonacular-recipe-food-nutrition-v1.p.mashape.com/recipes/findByIngredients?fillIngredients=false&ingredients='.$ingredientList.'&limitLicense=false&number=5&ranking=1",
        array("X-Mashape-Key" => $this->mashable_key, "Accept" => "application/json"));
        return $response->body;
    }


    public function getRecipeSteps($id)
    {
        $response = Unirest\Request::get("https://spoonacular-recipe-food-nutrition-v1.p.mashape.com/recipes/" . $id . "/analyzedInstructions?stepBreakdown=true",
        array("X-Mashape-Key" => $this->mashable_key, "Accept" => "application/json"));
        return $response->body;
    }

    public function getRecipeInfo($id){
      $response = Unirest\Request::get("https://spoonacular-recipe-food-nutrition-v1.p.mashape.com/recipes/" . $id . "/information?includeNutrition=false",
      array("X-Mashape-Key" => $this->mashable_key, "Accept" => "application/json"));
      return $response->body;
    }

    public function visualizeIngredients(){
     $response = Unirest\Request::post("https://spoonacular-recipe-food-nutrition-v1.p.mashape.com/recipes/visualizeIngredients",
      array("X-Mashape-Key" => $this->mashable_key, "Accept" => "text/html", "Content-Type" => "application/x-www-form-urlencoded"),
      array(
    "defaultCss" => true,
    "ingredientList" => "beef",
    "measure" => "metric",
    "servings" => 2,
    "showBacklink" => true,
    "view" => "grid"
  )
);
      return $response->body;
    }
}

?>
</head>
</html>
