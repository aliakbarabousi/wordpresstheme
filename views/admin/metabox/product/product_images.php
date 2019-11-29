<script type="text/javascript">

    jQuery(document).ready(function ($) {
        $('.add_product_item').on('click',function (event) {
        var wrapper = $('.images_items');
        var item = '  <p>\n' +
            '        <input style="width: 80%;height: 25px;direction:ltr" type="text" name="slider[]" >\n' +
            '        <a class="remove_product_item" href="#"><span class="dashicons dashicons-dismiss"></span></a>\n' +
            '    </p>';
        event.preventDefault();
        wrapper.append(item);
        });
        $(document).on('click','.remove_product_item',function (event) {
            event.preventDefault();
            var $this = $(this);
            $this.parent().remove();
        });
    });

</script>

<p>
    <a href="#" class="add_product_item">اضافه کردن آیتم</a>
</p>
<div class="images_items">
    <?php  if(isset($slider_images)&& intval($slider_images)): ?>
        <?php foreach ($slider_images as $post ):  ?>

            <p>
                <input style="width: 80%;height: 25px;direction: ltr" type="text" name="slider[]" value="<?php echo $post; ?>">
                <a class="remove_product_item" href="#"><span class="dashicons dashicons-dismiss"></span></a>
            </p>
        <?php endforeach; ?>

    <?php endif; ?>


</div>