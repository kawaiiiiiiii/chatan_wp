<!-- ヘッターの読み込み -->
<?php get_header(); ?>


<body>
    <main>
        <h2>Latest Articles</h2>

     <!-- WP投稿ページ -->
     <?php
        if (have_posts()) :
        while (have_posts()) :
        the_post();
      ?>

        <div class="articles-wrap">
            <div class="articles">
                <img src="<?php echo get_template_directory_uri();?>/folder/post_img_1.png" alt="北谷画像">
                <span><?php echo get_the_date(); ?></span>
                <p><?php the_title(); ?></p>
                <a href="">READ MORE</a><!--リードの棒びゆーんさせる- -->
            </div>
        </div>
     <?php //メインループの記載ワイル分のおわり
         endwhile;
         else : //メインループの記載 if文のつづき
      ?>
      <div class="articles-wrap" >
      <h2 class="subtitle">表示する記事がありません</h2>
      </div>
     <?php endif;//メインループの記載 if文の終わり ?>
    <!-- メインループここまで -->

    </main>
<!-- フッターの読み込み -->
<?php get_footer(); ?>
