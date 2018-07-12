<!DOCTYPE html>
<html>
    <head>
        <title>Blog de Jean Forteroche</title>
        <meta charset="utf-8" />
    </head>

    <body>
        <?php
            while ($answer = $q->fetch(PDO::FETCH_ASSOC)) {

            ?>
            <div>
                <p>
                    <?php echo $answer(['com_title']); ?>
                    <?php echo $answer(['com_content']); ?>
                    <?php echo $answer(['com_author']); ?>
                </p>
            </div>
            
            <?php
            }
            $q->closeCursor();
            ?>




    </body>

</html>