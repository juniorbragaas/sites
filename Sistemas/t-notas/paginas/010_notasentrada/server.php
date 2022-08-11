<?
if (@$_REQUEST["mode"] == "html5" || @$_REQUEST["mode"] == "flash") {
    if (@$_REQUEST["zero_size"] == "1") {
        // IE10, IE11 zero file fix
        // get file name
        $filename = @$_REQUEST["file_name"];
        // just create empty file
        file_put_contents("arquivos/".$filename, "");
    } else {
        // get file name
        $filename = $_FILES["file"]["name"];
        // save file
        move_uploaded_file($_FILES["file"]["tmp_name"], "path_to_save/".$filename);
    }
    // response
    header("Content-Type: text/json");
    print_r(json_encode(array(
        "state" => true,    // saved or not saved
        "name"  => $filename,   // server-name
        "extra" => array(   // extra info, optional
                "info"  => "just a way to send some extra data",
                "param" => "some value here"
        )
    )));
}
?>