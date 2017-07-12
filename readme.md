# About Delicious
[Latest Version](http://p4.cs15class.online)
Delicious is an application to plan you meal by searching recipes online via fat secret API and save them in a calendar for later use by simply drag and drop and the application will save the recipe title, url and the date to the database. the application allows users to register for an account. 
### Plugins
* [FullCalendar](https://fullcalendar.io) 
### packages
* [laravel-fullcalendar](https://github.com/maddhatter/laravel-fullcalendar) 
I extended the full calendar class from the plugin.
### API
* [fatsecret API](https://platform.fatsecret.com/api/) 
### screencast demo
* [P4 Screencas](https://youtu.be/7AQC3nZXMV8) 
### Details
I started this project with the food2fork API and two day before the dealine, they went dark. so I had to look for a new API and made chage to my scripts. i have features such as the shopping list wich i did not have enough time to complete.I decided to leave the seeders classes off because i received an error after a migrate refresh so i did not want to corrupt the production version.
### Planning Doc
[Planning Doc](https://docs.google.com/document/d/1i-CzmnNtNoKk_04xyNt_PyRBHr-q9ofFcEVIX8ItPrI/edit#heading=h.9jqtzjpjb2cj) 

### CRUD operations
* Create: After performing a search, the result recipe boxes can be dragged on the calendar and the recipe will be saved in the database.at the moment a still have a bug that won't let the calendar refetch the date. if you reload the page , you will see the new recipe.
* Read: After successfully loged in into the application, all your recipes in the database will be fetched and displayed on the calendar.
* Update: you can update yor recipe date by simply draging a recipe on the calendar to a different date.
* Delete: by clicking on a recipe on the calendar, you will receive a confirmation message to delete the recipe. the recipe will be removed from the calendar.
