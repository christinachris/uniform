<?= $this->Flash->render() ?>
<?php echo $this->Html->css('../css/showimage.css');?>

<div class="site-section section-padding-80">
    <div class="container">
        <?= $this->Flash->render() ?>
        <div class="row">

            <!--image one the left half of page-->
            <div class="col-md-6">
                <!--Hero Image-->

                <div id="gallery_img">
                        <div id="image" class="galleryimagecontainer"> </div>
                </div>

                <!-- Thumbnail pictures -->
                <div id="thumbs">

                    <?php   $this->Form->link($uniform->heroimagepath) ;?>

                    <div class="thumbs_style"> <?php echo $this->Html->image($uniform->heroimagepath, ['alt' => 'CakePHP','class'=>'img2']);?> </div>
                        <?php foreach($picture as $pictures){ ?>
                    <div class="thumbs_style"><?php echo $this->Html->image($pictures->extraphotopath, ['alt' => 'CakePHP','class'=>'img2']);?></div>
                    <?php } ?>
                </div>
            </div>

            <!--uniform item details on right hand side of page -->
            <div class="col-md-6">
                <!-- Uniform Name-->
                <h2 class="text-black"><?= h($uniform->uniformname) ?></h2>
                <br>

                <?php
                $min=100000;
                $max=0;
                foreach($variant as $variants){

                    if($uniform['_id']==$variants['uniform_id']){
                        if($variants['price']<$min){
                            $min=$variants['price'];
                        }
                        if($variants['price']>$max){
                            $max=$variants['price'];
                        }
                    } ?>
                <?php } ?>

                <?php if($min==$max){ ?>
                    <p class="h4 font-weight-bold" style="color: #262261"><?= $this->Number->currency($max, '', ['places' => 2]) ?></p>
                <?php }
                else if($min==1000000000&& $max==0){ ?>
                    <p>price unavailable</p>
                <?php }

                else{ ?>
                    <p class="h4 font-weight-bold" style="color: #262261"><?= $this->Number->currency($min, '', ['places' => 2]) ?> - <?= $this->Number->currency($max, '', ['places' => 2]) ?></p>
                <?php } ?>

               <br>
                <!-- Uniform Description-->
                <p class="mb-4">
                    <?= nl2br($uniform->uniformdescription) ?>
                </p>

                <br>

                <!--Start of form for Cart -->
                <?= $this->Form->create(null, ['url' => ['controller' => 'carts', 'action' => 'addCartItem']]); ?>

                <!--size and colour options-->
                <b>
                    <label class="dropdownspace">Size:</label><?php echo $this->Form->select('size',$vDistinctSize,['empty'=>'(-)','onchange'=>'calc1(this.value)', 'class'=>'btn btn-light', 'required'=>true]); ?>
                    <br>
                    <label class="dropdownspace">Colour:</label><?php echo $this->Form->select('colour', $vDistinctColour,['empty'=>'(-)','onchange'=>'calc2(this.value)', 'class'=>'btn btn-light', 'required'=>true]); ?>
                </b>
                <br>
                <br>
                <!-- only show price if it is uniform item with a price range-->
                <?php if($min==$max){ ?>
                <?php }
                else { ?>
                    <p class="font-weight-bold" style="color:#262261">Price: &#36;<span id="price"> - </span></p>
                    <?php   $this->Form->Link->$variants->price ;?>
                <?php } ?>

                <br>

                <!--quantity button-->
                <div class="mb-5">
                    <div class="input-group mb-3" style="max-width: 120px;">
                        <div class="input-group-prepend input-group-append">
                            <?= $this->Form->button(' - ', ['class'=>'btn btn-secondary js-btn-minus']) ?>
                            <?= $this->Form->control('quantity', ['value'=>'1', 'class'=>'text-center form-control btn btn-light', 'label'=>false]) ?>
                            <?= $this->Form->button(' + ', ['class'=>'btn btn-secondary js-btn-plus']) ?>
                        </div>
                    </div>
                    <?php echo $this->Form->hidden('uniform_id', ['value'=>$uniform->_id]); ?>
                    <br>

                    <!-- Add to cart button-->
                    <p><?= $this->Form->submit('Add To Cart', ['class' => 'btn akame-btn active']) ?></p>

                    <!--Form end -->
                    <?= $this->Form->end() ?>

                </div>
            </div>
        </div>


        </div>
    </div>

<div class="container section-padding-80">
    <div class="row">
        <div class="col-12"  style="alignment: right">

            <!-- only show size chart image if there is one-->
            <?php if(empty($uniform->sizechartpath)){ ?>
            <?php }
            else { ?>
                <?php echo $this->Html->image($uniform->sizechartpath, ['alt' => 'CakePHP']);?>
            <?php } ?>

        </div>
    </div>
</div>


<!-- Javascript for size and colour dropdowns updating price -->
<script type="text/javascript" >

    function calc1(e) {
        window.size=e;
        changePrice();
    }
    function calc2(e) {
        window.colour=e;
        changePrice();
    }
    function changePrice() {
        "<?php foreach($variant as $variants){ ?>"
        if (size == "<?php echo $variants->size ?>" &&colour== "<?php echo $variants->colour ?>") {
            price.innerHTML ="<?php echo $this->Number->precision($variants->price,2) ?>"


        }
        "<?php } ?>"
    }
</script>

<!--script for displaying image and thumbnails -->
<?php echo $this->Html->script('jquery.nicescroll.min.js');?>
<script type="text/javascript">

    $(document).ready(function() {

        var name='<?php echo $this->Html->image($uniform->heroimagepath);?>';
        var index = 0;
        var image_address, list, loop, last_index;
        var scroll_position = 0;
        var temp = 0;
        var status = 'on';

        $('.thumbs_style img').first().css('border', '2px solid #262261');
        $('#image').html('<?php echo $this->Html->image($uniform->heroimagepath);?> ');

        loop = setInterval(slider, 10000);

            function slider() {
                if("<?php echo sizeof($picture->toArray()); ?>">0) {

                last_index = $('.thumbs_style').last().index();

                if (index == last_index) {
                    index = $('.thumbs_style').first().index();

                } else {
                    index = index + 1;

                }

                image_address = $('.thumbs_style').eq(index).find('img').attr('src');

                list = image_address.split('/', 3);

                name = image_address;

                $('#image img').fadeOut(300, function () {
                    $('#image').html(" <img class='gallery_img_style' src='" + name + "' > ");
                    $('#image img').fadeOut(0);
                    $('#image img').fadeIn(300);

                });

                $('#large_img').fadeOut(300, function () {

                    $(this).attr('src', 'images/' + name);
                    $(this).fadeIn(300);

                });

                $('.thumbs_style img').css('border', '1px solid rgba(38,34,97,0.4)');
                $('.thumbs_style').eq(index).find('img').css('border', '2px solid #262261');

                if (index >= 4) {

                    scroll_position = $('#thumbs').scrollLeft() + 115;

                    $('#thumbs').animate({

                        scrollLeft: scroll_position

                    }, 500);

                }

                if (temp == 1) {

                    $('#thumbs').animate({

                        scrollLeft: 0

                    }, 500);

                    temp = 0;
                }

                if (index == last_index) {

                    temp = 1;
                }

            }
        }

        $('.thumbs_style img').click(function() {

            clearInterval(loop);

            index = $(this).parent().index();

            $('.thumbs_style img').css('border', '1px solid rgba(38,34,97,0.4)');
            $(this).css('border', '2px solid #262261');

            image_address = $(this).attr('src');
            list = image_address.split('/', 3);
            name = image_address;

            $('#image img').fadeOut(300, function() {
                $('#image').html((" <img class='gallery_img_style' src='" + name + "' > "));
                $('#image img').fadeOut(0);
                $('#image img').fadeIn(300);

            });

            if (status == 'on') {
                loop = setInterval(slider, 10000);
            }

        });

        name = $('.gallery_img_style').attr('src');

        // $('body').append("<div id='enlarge'><div> <img id='large_img' src='" + name + "'> <img id='large_close' src='images/icons/close.png'> <img id='large_left' src='images/icons/left.png'> <img id='large_right' src='images/icons/right.png'> <img id='large_pause' src='images/icons/pause.png'> <img id='large_play' src='images/icons/play.png'>  </div></div> ");

        $('#enlarge').hide();

        $('#expand').click(function() {

            $('#enlarge').fadeIn(250);

        });

        $('#enlarge').css({

            'background': 'rgb(0,0,0)',
            'width': '100%',
            'height': '100%',
            'position': 'fixed',
            'top': '0',
            'left': '0'
        });

        $('#enlarge div').css({

            'width': '1000px',
            'height': '700px',
            'margin': '0px auto',
            'margin-top': '35px',
            'position': 'relative'

        });

        $('#large_img').css({

            'width': '1000px',
            'height': '700px'
        });

        $('#large_close').css({

            'width': '13px',
            'position': 'absolute',
            'top': '8px',
            'right': '8px'

        });

        $('#large_left').css({

            'width': '23px',
            'position': 'absolute',
            'top': '314px',
            'left': '10px'

        });

        $('#large_right').css({

            'width': '23px',
            'position': 'absolute',
            'top': '314px',
            'right': '10px'

        });

        $('#large_pause,#large_play').css({

            'width': '12px',
            'position': 'absolute',
            'top': '318px',
            'right': '40px'
        });

        $('#large_play').css({

            'display': 'none'
        });

        $('#large_close').click(function() {

            $('#enlarge').fadeOut(250, function() {

                $(this).hide();

            });
        });

        $('#pause,#large_pause').click(function() {

            status = 'off';
            $('#pause,#large_pause').fadeOut();
            $('#play,#large_play').fadeIn();
            clearInterval(loop);
        });

        $('#play,#large_play').click(function() {

            status = 'on';
            $('#play,#large_play').fadeOut();
            $('#pause,#large_pause').fadeIn();
            loop = setInterval(slider, 10000);
        });

        $('#righty,#large_right').click(function() {

            clearInterval(loop);

            last_index = $('.thumbs_style').last().index();

            if (index == last_index) {
                index = $('.thumbs_style').first().index();

            } else {
                index = index + 1;

            }

            image_address = $('.thumbs_style').eq(index).find('img').attr('src');
            list = image_address.split('/', 3);
            name = list[2];

            $('#image img').fadeOut(250, function() {
                $('#image').html(" <img class='gallery_img_style' src='images/" + name + "' > ");
                $('#image img').fadeOut(0);
                $('#image img').fadeIn(250);

            });

            $('#large_img').fadeOut(250, function() {

                $(this).attr('src', 'images/' + name);
                $(this).fadeIn(250);

            });

            $('.thumbs_style img').css('border', '1px solid rgba(38,34,97,0.4)');
            $('.thumbs_style').eq(index).find('img').css('border', '2px solid #262261');

            if (status == 'on') {
                loop = setInterval(slider, 3000);
            }

        });

        $('#lefty,#large_left').click(function() {

            clearInterval(loop);

            if (index == $('.thumbs_style').first().index()) {
                index = $('.thumbs_style').last().index();

            } else {
                index = index - 1;

            }

            image_address = $('.thumbs_style').eq(index).find('img').attr('src');
            list = image_address.split('/', 3);
            name = list[2];

            $('#image img').fadeOut(300, function() {
                $('#image').html(" <img class='gallery_img_style' src='images/" + name + "' > ");
                $('#image img').fadeOut(0);
                $('#image img').fadeIn(300);

            });

            $('#large_img').fadeOut(250, function() {

                $(this).attr('src', 'images/' + name);
                $(this).fadeIn(250);

            });

            $('.thumbs_style img').css('border', '1px solid rgba(38,34,97,0.4)');
            $('.thumbs_style').eq(index).find('img').css('border', '2px solid #262261');

            if (status == 'on') {
                loop = setInterval(slider, 10000);
            }

        });


    })
</script>



















