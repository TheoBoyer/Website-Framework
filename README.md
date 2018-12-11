# Website-Framework
Little php framework for websites

1. Routing :

  Edit file "core/routes.php" or "core/special_routes.php" and use follwing syntax:

  $app->route("foo", "ControllerToCall", "methodtocall");

  special routes are :
    "default" : when no route is precised
    "error" : when the route wasn't found
    
2. Controllers :
  Just add your controller class into folder "controller". Make sure it extends class "Controller"
  it should call in any case the "render" method of controller class taking arguments:
    1 : name of view to call
    2 : variables containing params for the view
  
3. Models :
  Add a class extending "Model" in the "model" folder.
  each model should have properties:
    $tableName (String) : name of the table in your database
    $primaryKey (String) : primary key of the table associated to the model. It should be like "idNameofthemodel". Composed keys are not supported yet
    $fields (Array) : array of strings containing fields to load from database
    
4. Views :
  Custom templating is not yet implemented. Instead, the rendering is made by calling "view/partials/header.php" then the view in argument of the render method of the controller, and finally the "view/partials/footer.php" file. Just edit them.
  You can use the "Form" class to easily display custom basic forms.
    
5. Web ressources :
  Web ressources like css sheets, js scripts, or images are located in the "public" folder in the associated folder
  
6. Error handling :
  Not yet implemented
