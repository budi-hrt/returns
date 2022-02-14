$(document).ready(function(){
$('#Mytable').DataTable();

});






$('#table-menu').on('click','.item-edit',function(){
const id = $(this).attr('data');
$.ajax({
type:'get',
url:base_url + 'menu/getmenu',
data:{id:id},
dataType:'json',
success:function(data){
    $("#menu-edit").modal('show');
    $('input[name=idedit]').val(data.id);
    $('input[name=menuedit]').val(data.menu);
    $('input[name=iconedit]').val(data.icon);

}
});
});







// submenu

$('#Mytable').on('click','.item-edit',function(){
    const id = $(this).attr('data');
    $.ajax({
    type:'get',
    url:base_url + 'menu/getsubmenu',
    data:{id:id},
    dataType:'json',
    success:function(data){
        $("#submenu-edit").modal('show');
        $('input[name=idsubmenu]').val(data.id);
        $('[name="menu_edit"]').val(data.menu_id).trigger('change');
        $('input[name=titleedit]').val(data.title);
        $('input[name=urledit]').val(data.url);
        $('input[name=icon_subedit]').val(data.icon_sub);
    }
    });
    });



    $('#Mytable').on('click','.item-delete',function(){
alert('tes');
    });