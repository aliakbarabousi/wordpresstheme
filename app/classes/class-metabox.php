<?phpclass metabox{    public static function register_product_price_meta_box()    {        add_meta_box(            'product_price_metabox  ',            'محصول',            'metabox::product_price_content_handler',            'product'        );    }    public static function product_price_content_handler($post)    {        $post_price = (intval( get_post_meta($post->ID,'product_price',true)));        $post_price_final = (intval( get_post_meta($post->ID,'product_price_delete',true)));        view::renderFile('admin.metabox.product.product_price',array('post_price' => $post_price,'post_price_final' => $post_price_final));    }    public static function save_product_price_handler($post_id)    {        if(isset($_POST['product_price'] ) && intval($_POST['product_price']) >0 ) {            update_post_meta($post_id, 'product_price', intval($_POST['product_price']));        }        if(isset($_POST['product_price_delete'] ) && intval($_POST['product_price_delete']) >0 && intval($_POST['product_price_delete']) < intval($_POST['product_price'])) {            update_post_meta($post_id, 'product_price_delete', intval($_POST['product_price_delete']));        }        if (intval($_POST['product_price_delete'])==0){            update_post_meta($post_id, 'product_price_delete', intval($_POST['product_price_delete']));            $price_delete = true;        }        if (intval($_POST['product_price'])==0){            update_post_meta($post_id, 'product_price', intval($_POST['product_price']));            $price = true;        }    }    public static function add_post_price_columns($column)    {        $column['product_price'] = ' قیمت اولیه';        return $column;    }    public static function add_post_price_final_columns($column)    {        $column['product_price_delete'] = ' قیمت نهایی';        return $column;    }    public static function show_post_price_in_columns($column,$post)    {        if( $column == 'product_price'    ) {            $post = get_post_meta($post, 'product_price', true);            echo number_format($post);        }    }    public static function show_post_price_final_in_columns($column,$post)    {        if( $column == 'product_price_delete'  ) {            $post = get_post_meta($post, 'product_price_delete', true);            echo number_format($post);        }    }}