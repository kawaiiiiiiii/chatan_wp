<!-- ヘッターの読み込み -->
<?php get_header(); ?>


<body>
    <main>
        <h2>Latest Articles</h2>
        
        <div class="articles-wrap">
     <!-- WP投稿ページ -->
     <?php
        if (have_posts()) :
        while (have_posts()) :
        the_post();
      ?>

            <div class="articles">
                <img src="<?php echo get_the_post_thumbnail_url( get_the_ID(), 'medium' ); ?>" alt="北谷画像">
                <span class="date"><?php echo get_the_date(); ?></span>
                <h3><?php the_title(); ?></h3>
                <span class="read"><a href="">READ MORE</a></span><!--リードの棒びゆーんさせる- -->
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
<?php 
    $count_posts = wp_count_posts();//投稿数の取得
    $posts = $count_posts->publish;//publish→公開済み
    //記事数が6より多かったら以下の要素を表示する
    if (7 <= $posts):
?>
    <!-- 表示する要素 -->
    <a href="">もっとみるー</a>
    
    

<?php endif; ?>

<!-- 6投稿との闘い -->
<?php if (have_posts()): ?>
        <ul>
            <?php while (have_posts()): the_post(); ?>
            <li><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></li>
            <?php endwhile; ?>
        </ul>

        <!-- カスタム投稿全件数取得 -->
        <?php global $wp_query; $count = $wp_query->found_posts;?>

        <!-- この部分がajaxで追加読み込みする箇所 -->
        <!-- javascript側に渡したい値は、data属性を使って指定 -->
        <ul class="load" data-count="<?php echo $count; ?>"
        data-post-type="news" ></ul>

        <!-- 初期表示件数が全件数より少ない場合、もっと読み込むボタンを表示 -->
        <?php if($count > 6): ?>
        <button class="more_btn">もっと読み込む</button>
        <?php endif; ?>

        <?php endif; ?> <!-- END if (have_posts()) -->

<!--　ここまで  -->
    </div>
    </main>
<!-- フッターの読み込み -->
<?php get_footer(); ?>
