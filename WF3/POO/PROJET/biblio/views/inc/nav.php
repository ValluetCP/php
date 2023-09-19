<nav>
    <a href="http://localhost/php/WF3/POO/PROJET/biblio/homepage">Home</a>

    <?php if(isset($_COOKIE['user_role']) && $_COOKIE['user_role'] == "admin"){ ?>

        <!-- Pour les roles admin -->

        <a href="http://localhost/php/WF3/POO/PROJET/biblio/add_book">Add Book</a>
        
        <!-- Liste d'emprunt -->
        <a href="http://localhost/php/WF3/POO/PROJET/biblio/logs">Log</a>

        <a href="http://localhost/php/WF3/POO/PROJET/biblio/register">Register</a>

        <a href="http://localhost/php/WF3/POO/PROJET/biblio/login">login</a>

    <?php }else { ?>

        <!-- Pour les roles member -->

        <!-- Liste d'emprunt -->
        <a href="http://localhost/php/WF3/POO/PROJET/biblio/logs">Log</a>
        
        <a href="http://localhost/php/WF3/POO/PROJET/biblio/list_book">List Book</a>
        
        <a href="http://localhost/php/WF3/POO/PROJET/biblio/register">Register</a>

        <a href="http://localhost/php/WF3/POO/PROJET/biblio/login">login</a>
        
        <!-- <a href="http://localhost/php/WF3/POO/PROJET/biblio/logs">List Borrow</a> -->

    <?php } ?>
</nav>