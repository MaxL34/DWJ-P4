<?php $title = 'Blog de Jean Forteroche : Articles'; ?>

<?php ob_start(); ?>

<!-- Header -->
<header class="masthead" style="background-image: url('img/home-bg.jpg')">
            <div class="overlay"></div>
            <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                <div class="site-heading">
                    <h1>Billet Simple pour l'Alaska</h1>
                    <span class="subheading">Tous mes chapitres sont sur cette page<span>
                </div>
                </div>
            </div>
            </div>
</header>

<!-- Main Content -->
<div class="post-container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <div class="post-preview">
          
          <?php
            foreach ($articles as $value) {
          ?>
        <div class="post">
          <a href="index.php?action=getArticle&amp;article_id=<?php echo $value->art_id(); ?>">
            <h2 class="post-title">
              <?php echo $value->art_title(); ?>
            </h2>
            <p class="post-content">
              <?php echo $value->art_content(); ?>
            </p>
          </a>
            <p class="post-meta">
              Publié le : <?php echo $value->date_fr(); ?>  
            </p>
            </div>
          <?php
            }
          ?>
        </div>

<?php $content = ob_get_clean(); ?>
<?php require('views/layout.php'); ?>