<?php
$orders = Eshop::getOrders($db);

function displayOrder(Order $order, int $index)
{
    $template = file_get_contents(ADMIN_DIR . "order.tpl");
    $template = str_replace("{{NUM}}", $index, $template);
    $template = str_replace("{{CUSTOMER}}", htmlspecialchars($order->customer), $template);
    $template = str_replace("{{EMAIL}}", htmlspecialchars($order->email), $template);
    $template = str_replace("{{PHONE}}", htmlspecialchars($order->phone), $template);
    $template = str_replace("{{ADDRESS}}", htmlspecialchars($order->address), $template);
    $template = str_replace("{{CREATED}}", htmlspecialchars($order->created), $template);
    
    $totalAmount = 0;
    $itemIndex = 0;

    echo $template;
    echo "<h3>Купленные товары:</h3>
        <table>
            <thead>
                <tr>
                    <th>N п/п</th>
                    <th>Название</th>
                    <th>Автор</th>
                    <th>Год издания</th>
                    <th>Цена, руб.</th>
                    <th>Количество</th>
                </tr>
            </thead>
            <tbody>";

    foreach ($order->items as $item) {
        $itemTemplate = file_get_contents(ADMIN_DIR . "order_item.tpl");
        $itemTemplate = str_replace("{{NUM}}", ++$itemIndex, $itemTemplate);
        $itemTemplate = str_replace("{{TITLE}}", htmlspecialchars($item->title), $itemTemplate);
        $itemTemplate = str_replace("{{AUTHOR}}", htmlspecialchars($item->author), $itemTemplate);
        $itemTemplate = str_replace("{{PUBYEAR}}", htmlspecialchars($item->pubyear), $itemTemplate);
        $itemTemplate = str_replace("{{PRICE}}", htmlspecialchars($item->price), $itemTemplate);
        $itemTemplate = str_replace("{{QUANTITY}}", 1, $itemTemplate);
        
        $totalAmount += $item->price;
        echo $itemTemplate;
    }

    echo "</tbody></table>\n<p>Всего товаров в заказе на сумму: {$totalAmount} руб.</p>";
}
?>

<h1>Поступившие заказы:</h1>
<a href="/admin">Назад</a>
<hr>
<?php
$orderIndex = 0;
foreach ($orders as $order) {
    displayOrder($order, ++$orderIndex);
}
?>
