<!DOCTYPE html>
<html>
    <head>
        <title>Blog de Jean Forteroche</title>
        <meta charset="utf-8" />
    </head>

    <body>
        <?php
            while ($comment = $q->fetch(PDO::FETCH_ASSOC)) {

            ?>
            <div>
                <p>
                    <?php echo $comment(['com_title']); ?>
                    <?php echo $comment(['com_content']); ?>
                    <?php echo $comment(['com_author']); ?>
                </p>
            </div>
            
            <?php
            }
            $q->closeCursor();
            ?>




    </body>

</html>