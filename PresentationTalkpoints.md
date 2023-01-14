## 5 min presentation so we gotta have a day to decide what we gonna talk about and who , this is just how i thought
## and we need to practice a little atleast onec coz if we fail to explain everything we did it wil be a wast of time we spent implementing them

# Describe tatabase - Dilshan

- How we planed the ER diagrams first
- how we reduced them in to the normal form
- what are the schemas and atributes in them
    - how we implement the <mark>PIM module</mark>
    - how we implement the <mark>Abcense module</mark>
- how we implement
    - adding custom attributes
    - user accounts and roles
- ect.

# Describe UI structure - Nadun?
    - show how  the items in the menue difer from user type to type
    - when you log in to each user make sure to show what user level he is in by hovering ower the right upper prof pic
    - go through each menue items available to user levels

# Describe the UI - Ginushmal 

- log in as employee
- describe what is visible to employee user level
- Describe each and every tabs in the manue 
    - show profile and employee and personal details
    - show leave application and leave detail tabs and that a leave entry is created 
      in mysql when submitted
- log in as the supervisor of that employee and 
    - show that his leave submission apears in the leave aproval tab of the supervisor 
    - and submit or reject it and 
    - show it recorded in both th previous employee and the Data base
- login as a asmin 
    - show employee details and describe how we used a viwe to get nessosry data in to the website hiding unnessesory stuff
    - show all other functionalaties of the rest of the menue
    - and show how the update and represented in the database

- and the use of them
- show all the functionalities of those UI models
- explain what information ech page showing or getting
- ect

# Describing the Implimentation of the UI with code snipts - Chamaru

- show how data binding has done ( not all pick a one simple example like user profile)
    - explain how we stop XXS attacks (attempts to run JS scripts from the database data when they were echod in to html)
        - using the <mark> htmlspecialcharacter() </mark> function in PHP
        - or whaterver the f used chamaru
- show how we insert data in to the database (pick a simple forum implementation code and explain and )
    - explain how we stoped SQL injections 
        - using <mark>mysqli_real_escape()<mark> function in PHP prosidual way
        - or the <mark>prepare statement</mark> u have used in the PHP OOP way idk
- show how the security is done by implementing role functions and sign in option