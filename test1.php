
<SCRIPT LANGUAGE="JavaScript">
<!--
// 다중 업로드
var total_image = 1;
function add_upload(){
if(total_image < 20){
var objTbl = document.all["upload_file_table"];
var objRow = objTbl.insertRow();
var objCell = objRow.insertCell();
objCell.innerHTML += "<input type='file' name='upload_file["+total_image+"]' size='25' onMouseover=\"image_preview(this);\"><br>";
}
total_image++;
}

// 추가한 file폼 하나씩 삭제
function del_upload(){

var objTbl = document.all["upload_file_table"];


objTbl.deleteRow(objTbl.rows.length - 1);

total_image--;

}



// 이미지 미리 보기
var preview = new Image();
function image_preview(obj){
var now_image = false;
var temp;
preview.src = obj.value;
// 지정된 폭, 높이
var imageWidth = 200;
var imageHeight = 150;
// 이미지 일 경우 미리 보기
if(obj.value.match(/(.jpg|.jpeg|.gif|.png)/)){
preview_image.src = obj.value;
// 이미지 비율
var Yrate = preview.width/preview.height;
var Xrate = preview.height/preview.width;
if(preview.width > imageWidth||preview.height > imageHeight){
// 폭이 지정된 폭보다 클 경우
if(preview.width > imageWidth){
preview_image.width = imageWidth;
preview_image.height = imageWidth * Xrate;
}
// 높이가 지정된 높이보다 클 경우
if(preview.height > imageHeight){
preview_image.height = imageHeight;
preview_image.width = imageHeight * Yrate;
}
}
}
// 전체 이미지가 없을 경우 이미지 없음으로
for(var i=0; total_image>i; i++){
temp = document.all.upload_test["upload_file["+i+"]"].value;
if(temp.match(/(.jpg|.jpeg|.gif|.png)/)){
now_image = true;
}
}
if(!now_image){
preview_image.src = "image_preview.gif";
preview_image.width = 120;
preview_image.height = 90;
}
}
//-->
</script>
<form name="upload_test" action="test_ok.php" method="post" enctype="multipart/form-data">
<a href="#none" onClick="add_upload();">add upload</a>
<!-- 첨부파일 테이블 //-->
<table id="upload_file_table">
<tr>
<td>
<input type='file' name='upload_file[0]' size='25' onMouseover="image_preview(this);" value="test"><br>
</td>
</tr>
</table>

<input type="submit" value="전송">
</form>
이미지 미리 보기
<img src="image_preview.gif" name="preview_image" width="120" height="90">
