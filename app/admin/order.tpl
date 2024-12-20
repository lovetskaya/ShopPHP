<hr>
<h2>Заказ номер: {{NUM}}</h2>
<p><b>Заказчик</b>: {{CUSTOMER}}</p>
<p><b>Email</b>: {{EMAIL}}</p>
<p><b>Телефон</b>: {{PHONE}}</p>
<p><b>Адрес доставки</b>: {{ADDRESS}}</p>
<p><b>Дата размещения заказа</b>: {{CREATED}}</p>

<h3>Купленные товары:</h3>
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
    <tbody>
        {{ITEMS}}
    </tbody>
</table>
<p>Всего товаров в заказе на сумму: {{TOTAL}} руб.</p>