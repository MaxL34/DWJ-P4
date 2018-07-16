<!DOCTYPE html>
<html>
    <head>
        <title>Blog de Jean Forteroche</title>
        <meta charset="utf-8" />
    </head>

    <body>
        <?php
            foreach ($comments as $value) {
        ?>
                <div>
                    <p>
                        <?php echo $value->com_title(); ?></br>
                        <?php echo $value->com_content(); ?></br>
                        <?php echo $value->com_author(); ?></br>
                    </p>
                </div>
        <?php
            }
        ?>

    </body>

</html>