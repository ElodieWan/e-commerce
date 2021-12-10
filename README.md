# ecommerce

Router : 

    - Tous ce qui concerne les articles sont sur la route article.
        Action (Possible à l'heure actuel) :
            - read($id)  (envoie vers le controller pour lire l'article avec $id)
            - readAll (afficher la pages avec tous les articles)
            - newArt (affiche le formulaire de création d'un nouvel article)
            - create (envoie vers le controller pour ajouter les valeurs du formulaire dans la base de données)
            - modifArt($id) (renvoie vers la page avec le formulaire de modification)
            - modif($id) (envoie au controller les valeurs modifié à la base de données)

    - Tous ce qui concerne les utilisateurs sont dans la route users.
        Action (possible à l'heure actuel) :
            - connexion (affiche la page contenant le formulaire de connexion)
            - inscription (affiche la page contenant le formulaire d'inscription)
            - login (envoie vers le controller pour verifier les valeurs du formulaire de connexion et ainsi se connecter)
            - deconnexion (envoie vers le controller pour deconnecter)
            - create (envoie vers le controller pour verifier les valeurs du formulaire d'inscription et ainsi rajouter l'utilisateur dans la base de donnée)
    
    - Tous ce qui concerne les paniers sont dans la route shopping.
        Action (possible à l'heure actuel) :
            - read (affiche la page du panier contenant les articles ajoutés dans le panier)
            - ajout (permettant d'ajouter un article dans un panier)
            - delete (permettant de supprimer un article existant dans le panier)
            