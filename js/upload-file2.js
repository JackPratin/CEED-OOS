$('#chooseFile2').bind('change', function() {
    var filename = $("#chooseFile2").val();
    if (/^\s*$/.test(filename)) {
        $(".file-upload2").removeClass('active');
        $("#noFile2").text("No file chosen...");
    } else {
        $(".file-upload2").addClass('active');
        $("#noFile2").text(filename.replace("C:\\fakepath\\", ""));
    }
});