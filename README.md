Le Singleton, permet d'avoir une classe qui sera instanciée qu'une seule fois tout au long de notre application. Par exemple, dans le cadre de notre application nous auront une seule et unique configuration. On va donc chercher à instancier cette objet une seule fois pour pouvoir ensuite récupérer l'instance à tout moment de notre application.

Pourquoi pas une classe statique ?

    # On ne dispose d'aucun constructeur pour y placer la logique d'initialisation
    # Le code sera plus difficilement testable par la suite
    # Lhéritage est un véritable enfer
    
Pour créer un singleton nous allons devoir utiliser plusieurs choses
    
    # Un attribut statique qui conservera l'instance unique de notre classe
    # Une méthode statique qui permet d'instancier l'objet ou de récupérer l'instance unique déjà créée
    # Un constructeur privé si on souhaite empêcher l'instanciation en dehors de la classe
