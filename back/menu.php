<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli"><?=$DB->title;?></p>
    <!-- <form method="post"  action="api/edit_ad.php"> -->
    <form method="post" action="api/edit.php?do=<?=$DB->table;?>">    
    <table width="100%">
            <tbody>
                <tr class="yel">

                    <td width="30%"><?=$DB->header;?></td>
                    <td width="30%"><?=$DB->append;?></td>
                    <td width="10%">次選單數</td>
                    <td width="10%">顯示</td>
                    <td width="10%">刪除</td>
                    <td width="10%"></td>

                </tr>
                <?php
                $rows=$DB->all();
                foreach($rows as $row){
                    $checked=($row['sh']==1)?'checked':'';
                ?>
                <tr>

                    <td>
                        <input type="text" name="name[]" value="<?=$row['name'];?>">
                    </td>
                    <td>
                        <input type="text" name="href[]" value="<?=$row['href'];?>">
                    </td>
<td>
    <?=$DB->math('count','*',['parent'=>$row['id']]);?>
                    </td>
                    <td>
                        <input type="checkbox" name="sh[]" value="<?=$row['id'];?>" <?=$checked;?>>
                    </td>
                    <td>
                        <input type="checkbox" name="del[]" value="<?=$row['id'];?>">

                        <input type="hidden" name="id[]" value="<?=$row['id'];?>">
                    </td>
                    <td>
                        <!-- 編輯次menu 在back插入modal下的submenu -->
                    
                        <input type="button"
                    onclick="op(&#39;#cover&#39;,&#39;#cvr&#39;,&#39;modal/submenu.php?id=<?=$row['id'];?>&#39;)"
                              value="編輯次選單">
                    </td>

                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        <table style="margin-top:40px; width:70%;">
            <tbody>
                <tr>
                    <td width="200px">
                        <input type="button"
                            onclick="op(&#39;#cover&#39;,&#39;#cvr&#39;,&#39;modal/<?=$DB->table;?>.php?table=<?=$DB->table;?>&#39;)" 
                              value="<?=$DB->button;?>">
                    </td>
                    <td class="cent">
                        
                        <input type="submit" value="修改確定">
                        <input type="reset" value="重置">
                    </td>
                </tr>
            </tbody>
        </table>

    </form>
</div>