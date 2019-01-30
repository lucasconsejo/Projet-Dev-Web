var file;

function upload_file(event){
    event.preventDefault();
    file = event.dataTransfer.files[0];
    $("#titre-upload").text(file.name);
}
function file_explorer(){
    $("#btn-upload-file").click();
    $("#btn-upload-file").change(function() {
        filename = this.files[0].name;
        $("#titre-upload").text(""+filename); 
    });
}
    
function ajax_file_upload(file){
    let form_data = new FormData();
    form_data.append('upload', file);
    $.ajax({
        type:"POST",
        url:"./home.php?page=add",
        contentType: false,
        processData: false,
        data: form_data,
        success: function(response){
        }
    });
}
function send_submit(){
    if(file != undefined){
        ajax_file_upload(file);
    }
}