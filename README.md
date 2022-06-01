
# Car racing Tournament

Hello and welcome to our tournament especially for car racing , here are some instructions to Join Us :

=> create an account : /utilisateurs/create .
ex: [{ "username" : String, "mail" : String, "password" : String} ]

=> udpate an account : /utilisateurs/update/(\d+) .
ex : replace (\d+) with the id of the user

=> delete an account : /utilisateurs/delete/(\d+) .

=> See the list users : /utilisateurs/page .



=> create an tournament : /tournoi/create .
ex: [{ "name" : String , "circuit" : String , "Participants" : Int}]

=> update an tournament : /tournoi/update/(\d+).

=> delete an tournament : /tournoi/delete/(\d+).

=> join an tournament : /tournoi/participer/(\d+)/(\d+) .

=> See the list of Tournament : /tournoi/page .
