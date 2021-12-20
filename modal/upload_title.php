<h3>更新增標題圖片</h3>
<hr>
   <!-- from api/update_title.php to api/upload_title.php -->
<form action="api/upload_title.php" method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <td>標題區圖片：</td>
            <td><input type="file" name="img" ></td>
        </tr>
        <!-- for--完成在後台顯示網站標題區圖片列表 -->
        <!-- 這裡決定替代文字不用了? -->
        <!-- <tr>
            <td>標題區替代文字：</td>
            <td><input type="text" name="text" ></td>
        </tr> -->
    </table>
    <!-- 更改 -->
    <!-- <div><input type="submit" value="更新"><input type="reset" value="重置"></div> -->
    <input type="hidden" name="id" value="<?=$_GET['id'];?>">
    <div><input type="submit" value="更新"><input type="reset" value="重置"></div>
</form>