<?
$_GET = clear_array($_GET);

$_GET = fill_empty_array($_GET, Array("cost_min","cost_max"));
$_GET['cost_min']=intval($_GET['cost_min']);
$_GET['cost_max']=intval($_GET['cost_max']);

$filter = "folder=0";

if ($_GET['cost_max']>0)
    $filter.=" AND cost<=".$_GET['cost_max'];
if ($_GET['cost_min']>0)
    $filter.=" AND cost>=".$_GET['cost_min'];
?>

<form method="get">
    ����, ��
    <input name="cost_min" value="<?echo $_GET['cost_min']?>">
    ����, ��
    <input name="cost_max" value="<?echo $_GET['cost_max']?>">

    <input type="submit" value="������">
    
</form>

<br>

<?
IncludeComponent("list_items", "catalog", Array(
    "table" => "catalog",
    "url" => "/catalog/#id#",
    "cart_url" => "/cart/?add=#id#",
    "filter" => $filter,
));
?>