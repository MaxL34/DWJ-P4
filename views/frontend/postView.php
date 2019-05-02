<?php
    if (!isset($_SESSION)) {
        session_start();
    }
?>

<?php $title = 'Blog de Jean Forteroche : Article et commentaires associés'; ?>

<?php ob_start(); ?>

  <!-- Page Header -->
  <header class="masthead" style="background-image: url('img/post-bg.png')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="post-heading">
            <h1><?php echo $article->art_title(); ?></h1>
            <span class="meta">Publié le : <?php echo $article->date_fr(); ?></span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Post Content -->
  <article>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
        <p><?php echo $article->art_content(); ?></p>

          <a href="#">
            <img class="img-fluid" src="img/post-sample-image.jpg" alt="">
          </a>
        </div>
      </div>
    </div>
  </article>

  <div id="add_com">
    <button>Ajouter un commentaire</button>
  </div>

    <form id="com_form" action="index.php?action=addComment" method="post">
      <div>
        <label for="com_author">Pseudo : </label>
        <input class="com_author" type="text" id="author" name="com_author" placeholder="Votre pseudo" required/>
        <span id="missPseudo"></span>
      </div>

      <div>
        <label for="com_content">Votre commentaire : </label>
        <textarea class="com_content" id="content" name="com_content" placeholder="Votre commentaire" required></textarea>
        <span id="missCom"></span>
      </div>

      <input type="hidden" id="art_id" name="art_id" value="<?php echo $article->art_id(); ?>" />

      <div>
        <input id="com_submit_btn" type="submit" />
      </div>
    </form>

    <div id="comments">
      <p class="com_heading">Commentaires du billet :</p>
      <?php foreach ($comments as $comment) {
        $censoredCommentClass = $comment->com_report_number() > 0 ? "comment_censored" : "";
        $censoredSpanClass = $comment->com_report_number() > 0 ? "span_censored" : "";
      ?>
        <div class="comment_content <?= $censoredCommentClass ?>">
          <p class="com_text"><?php echo $comment->com_content(); ?></br></br>
           Posté par : <?php echo $comment->com_author(); ?></br>
           le : <?php echo $comment->com_date_fr(); ?></br>
           <input type="button" class="report_com_btn" value="Signaler" id="<?php echo $comment->com_id(); ?>"/>
          </p>
          <span class="<?= $censoredSpanClass ?>"></span>
        </div></br>
          <?php } ?>
    </div>

<div id="modal_com" class="modal">
    <div class="modal_content">
        <p id="modal_text"></p>
    </div>
</div>

<?php $content = ob_get_clean(); ?>
<?php require('views/layout.php'); ?>


