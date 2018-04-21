Pourquoi pas une classe statique ?

    # On ne dispose d'aucun constructeur pour y placer la logique d'initialisation
    # Le code sera plus difficilement testable par la suite
    # Lhéritage est un véritable enfer
    
Pour créer un singleton nous allons devoir utiliser plusieurs choses
    
    # Un attribut statique qui conservera l'instance unique de notre classe
    # Une méthode statique qui permet d'instancier l'objet ou de récupérer l'instance unique déjà créée
    # Un constructeur privé si on souhaite empêcher l'instanciation en dehors de la classe
