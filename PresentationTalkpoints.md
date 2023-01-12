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

# Describe the UI - Ginushmal 

- Describe each and every tabs in the manue 
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