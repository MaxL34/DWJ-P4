<!DOCTYPE html>
<html>
    <head>
        <title>Blog de Jean Forteroche : Articles</title>
        <meta charset="utf-8" />
    </head>

    <body>
        <?php
            foreach ($articles as $value) {
        ?>
                <div>
                    <p>
                        <?php echo $value->art_title(); ?></br>
                        <?php echo $value->art_content(); ?></br>
                        <?php echo $value->art_author(); ?></br>
                    </p>
                </div>
        <?php
            }
        ?>

    </body>

</html>