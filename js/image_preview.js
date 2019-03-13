
   function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
        $('#tampil_poto').attr('src', e.target.result);
       }
        reader.readAsDataURL(input.files[0]);
       }
    }
