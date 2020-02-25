<?phpclass basket{    public static function add($product_id,$count = 1)    {        self::init_product_id($product_id);        if(self::exists($product_id)){           return $_SESSION ['basket'] ['items'] [$product_id]['count']++;        }else        $product = product::get_product_to_basket($product_id);            $_SESSION ['basket'] ['items'] [$product_id] = [                'title' => $product->post_title ,                'price' => product::get_price_product_final($product_id),                'count' => $count,            ];        }    public static function remove($product_id)    {        if(self::exists($product_id)){            unset($_SESSION['basket']['items'][$product_id]);        }    }    public static function update($product_id,$count)    {        if(self::exists($product_id)) {            if(intval($count) == 0){                return self::remove($product_id);            }            $_SESSION['basket']['items'][$product_id]['count'] = $count;        }    }    public function init_product_id($product_id)    {        if(!$product_id){            $_SESSION['basket'] = [];        }    }    public static function exists($product_id)    {        return ($_SESSION['basket']['items'][$product_id]);    }    public static function items()    {        if(isset($_SESSION['basket']['items']) && count($_SESSION['basket']['items']) > 0 ){            return $_SESSION ['basket']['items'];        }    }    public static function total_price()    {        return array_reduce($_SESSION['basket']['items'],function ($total,$item){            $total += $item['price'] * $item['count'];            return $total;        },0);    }    public static function total_items()    {        if(isset($_SESSION['basket']['items'])){            return count($_SESSION['basket']['items']);        }    }}