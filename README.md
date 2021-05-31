# productmanage
Import data using CSV, Display data and filters. 
Features:
1) Import: Upload a CSV with data and stores data in MySQL.
2) Display data:
    - Fetches data from database table
    - Each column is sortable (asc, desc)
    - Filters: Name (Autosuggest)- exact match, Brand(searches for any matching brand which contains the input chars), price(exact match) and sleep number(exact match)
3) Validation:
    - file field should not be empty on import page(client side JS validation)
    - file must have some data - server side checking for file size
    - on display result page, any one field must have value to search. (client side JS validation)
    - server side checking for input values before using into sql query to compare
4) Technologies: PHP, MySQL, JS, jQuery, HTML, CSS
