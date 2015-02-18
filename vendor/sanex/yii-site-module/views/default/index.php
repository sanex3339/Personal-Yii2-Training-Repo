<?php
    /**
     * @var yii\web\View $this
     */

    use yii\helpers\Html;
    use sanex\layout\site\assets\LayoutAsset;

    $layoutAsset = LayoutAsset::register($this); 
    $this->title = 'Main Page';
?>
<?=$this->render('slider')?>

<div class="layout-1">
    <div class="content clearfix">
        <?=Html::img($layoutAsset->baseUrl.'/img/layout-1-img.png', [
            'class' => 'image', 
            'alt' => 'Image',
            'title' => 'Image'
        ])?>
        <div class="content-data">
            <h2>Kachalov Timofey</h2>
            <h3>Junior PHP programmer</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris porttitor, nibh at sagittis tristique, enim magna pretium augue, eget consectetur sem dui non urna. Integer gravida, diam congue molestie fringilla, elit odio rhoncus turpis, ac dictum libero elit vel metus. Morbi egestas sit amet velit eget venenatis. Mauris porttitor, nibh at sagittis tristique, enim magna pretium augue, eget consectetur sem dui non urna</p>
            <div class="social-wrapper">
                <ul>
                    <li class="social-button social-button-facebook"><?=Html::a(NULL, '#')?></li>
                    <li class="social-button social-button-twitter"><?=Html::a(NULL, '#')?></li>
                    <li class="social-button social-button-google"><?=Html::a(NULL, '#')?></li>
                    <li class="social-button social-button-pinterest"><?=Html::a(NULL, '#')?></li>
                    <li class="social-button social-button-linkedin"><?=Html::a(NULL, '#')?></li>
                    <li class="social-button social-button-dribble"><?=Html::a(NULL, '#')?></li>
                </ul>    
            </div>
        </div>
    </div>
</div>
<div class="layout-2">
    <div class="content clearfix">
        <div class="content-data">
            <h2>Get In Touch</h2>
            <h3>In order to get in touch use the contact form below:</h3>
            <form class="contact-form" action="#">
                <input class="contact-input name" name="name" type="text" placeholder="Name (Required)">
                <input class="contact-input email" name="email" type="text" placeholder="Email (Required)">
                <input class="contact-input subject" name="subject" type="text" placeholder="Subject">
                <textarea class="contact-input message" name="message" placeholder="Write your message here..." rows="10" cols="45"></textarea>
                <input type="submit" value="SEND" class="contact-input submit">
            </form>
            <div class="contact-info">
                <p><b>Quisque Hendrerit:</b> purus dapibus, ornare nibh vitae, viverra nibh. Fusce vitae aliquam tellus. Proin sit amet volutpat libero. Nulla sed nunc et tortor luctus faucibus morbi vitae.</p>
                <div class="contacts">
                    <div class="contact address">Elm St. 14/05 Lost City</div>
                    <div class="contact phone">+ 3528 331 86 35</div>
                    <div class="contact email"><?=Html::a('info@hexalcorp.com', 'mailto:info@hexalcorp.com')?></div>
                </div>
            </div>
        </div>
    </div>
</div>