<?phpclass cart{    public static function remove_item_cart ()    {        if (isset($_GET['remove_cart_item']) && intval($_GET['remove_cart_item']) > 0) {            basket::remove(intval($_GET['remove_cart_item']));        }    }}