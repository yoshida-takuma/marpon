<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>曜日を調べよう</title>
</head>
<body>
  <form action="Fairfieldform.php" method="post">
  <p>西暦１年１月１日から数えて何日目で何曜日？※最初の日を１日目とします。
  <br>半角英数字で日にちを入力してください。</br>
  <input type="text" name="nen">年
  <input type="text" name="tsuki">月
  <input type="text" name="hi">日
  <input type="submit" value="調べる">
</p>
  <p>
    <?php
//フェアフィールドの公式の定義
function dnum($a,$b,$c)
{
  if($b<=2)
  {$d=365*($a-1)+floor(($a-1)/4)-floor(($a-1)/100)+floor(($a-1)/400)+floor(306*($b+13)/10)+$c-428;
  return $d;}
  else
  {$d=365*($a)+floor($a/4)-floor($a/100)+floor($a/400)+floor(306*($b+1)/10)+$c-428;
  return $d;}}
  //曜日の計算
  function day($a)
  {
    $b=$a%7;
    return $b;
  }
  
  $week=array('日','月','火','水','木','金','土');
  //データの受け取り
  $year=isset($_POST['nen']) ? $_POST['nen']:'';
  $month=isset($_POST['tsuki']) ? $_POST['tsuki']:'';
  $date=isset($_POST['hi']) ? $_POST['hi']:'';
//データを受け取った場合の実行
if($year&&$month&&$date)
{ $datenum=dnum($year,$month,$date);
  $day=day($datenum);
  echo "西暦".$year."年".$month."月".$date."日は".$datenum."日目で".$week[$day]."曜日です。";}
else {echo "ここに結果が表示されます。";}
 ?>
</form>
</body>
