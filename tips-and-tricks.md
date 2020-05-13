
###React
From class components to functional components  
https://www.digitalocean.com/community/tutorials/five-ways-to-convert-react-class-components-to-functional-components-with-react-hooks  
https://medium.com/@olinations/10-steps-to-convert-a-react-class-component-to-a-functional-component-with-hooks-ab198e0fa139

React share data between components useEffect & useState    
https://dev.to/basal/react-hooks-making-it-easier-to-compose-reuse-and-share-react-code-5he9    
https://egghead.io/lessons/react-share-logic-across-multiple-react-components-with-custom-hooks

userReducer with createContext to create a global state object  
https://blog.logrocket.com/use-hooks-and-context-not-react-and-redux/

userHistory to redirect     
https://reacttraining.com/react-router/web/api/Hooks/usehistory

conditional rendering   
https://www.robinwieruch.de/conditional-rendering-react

React cheatsheet               
https://dev.to/codeartistryio/the-react-cheatsheet-for-2020-real-world-examples-4hgg

JS concept for react    
https://codeartistry.io/10-javascript-concepts-you-need-to-master-react/

React how to loop   
https://flaviocopes.com/react-how-to-loop/

React links     
http://www.hackingwithreact.com/read/1/23/creating-a-link-between-pages-in-react-router

###GIT
 Update submodule :```git submodule update --recursive```   
 Delete local branch :```git branch -d <branch name>```
 
###CLI
```
//execute specific migration file   
doctrine:migrations:execute <version number>  
  
//check migration status    
doctrine:migrations:status  

//downgrade or upgrade
doctrine:migrations:migrate <version number>    
```
###TDD
Run tests ``` php bin/unit```

###BDD 
Note: BDD run only under php-fpm in this project  - got to your php-fpm server

Run behat tests: ```vendor/bin/behat```        
Check behat version: ```vendor/bin/behat -V```  
Run specific suite:  ```vendor/bin/behat --suite=<suite-name>```

###PhpUnit
Note: phpunit doesn't run under php-fmp server run only local

Run phpunit test: ```php bin/phpunit```

###Composer
Uninstall package ```composer remove <package name>```

###Friends of Behat
Rememeber:      
 To create a new suite is required to : 
- add the features folder in composer, because the folder is out of src folder, as eg.:   
 "Api\\": "features/bootstrap/Api/"     
- add the new namespace in services_test.yaml:  
   eg. : Api\: resource: '../features/bootstrap/Api/*'

