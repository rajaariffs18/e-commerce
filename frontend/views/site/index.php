<?php

/* @var $this yii\web\View */

use yii\helpers\Url;

$this->title = 'Uni Rancak';

?>
<!-- Slide1 -->

<!-- Banner -->

<style type="text/css">
.hov-img-zoom img:hover{
    width: 100% !important;
}
</style>

<div class="banner bgwhite p-t-40 p-b-40">
    <div class="container">
        <div class="row">

        <?php

            foreach($TbKategori as $data){ 
            $dataGambarKategori = $data->kategoriMedia;    
            ?>
                <div class="col-sm-10 col-md-8 col-lg-4 m-l-r-auto">
                    <!-- block1 -->
                    <div class="block1 hov-img-zoom pos-relative m-b-30">
                        <img src="<?='../../backend/web/uploads/'.$dataGambarKategori->name.$dataGambarKategori->type?>" alt="IMG-BENNER">

                        <div class="block1-wrapbtn w-size2">
                            <!-- Button -->
                            <a href="<?= Url::to(['site/kategori', 'k' => $data->id])  ?>" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
                                <?= $data->kategori ?>
                            </a>
                        </div>
                    </div>
                </div>
        <?php }
        
        ?>
            
        </div>
    </div>
</div>

